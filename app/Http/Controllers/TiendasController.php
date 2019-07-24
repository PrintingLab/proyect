<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TiendasController extends Controller
{

  public function TiendasIndex(){
    $consulta=Db::table('tiendas')->select('Tiendas_ID','Tiendas_nombre','Tiendas_telefono','Tiendas_direccion','Tiendas_correo','Tiendas_contacto')->get();
    return view('configuracion/tiendas',['consulta'=>$consulta]);
  }

  public function CrearTienda(Request $request){
    DB::table('tiendas')->insert(['Tiendas_nombre'=>$request->name_tienda,'Tiendas_telefono'=>$request->tel_tienda,
    'Tiendas_direccion'=>$request->dire_tienda,'Tiendas_correo'=>$request->email_tienda,'Tiendas_contacto'=>$request->conta_tienda,'Tiendas_creacion'=>NOW()]);
    $consulta=Db::table('tiendas')->select('Tiendas_ID','Tiendas_nombre','Tiendas_telefono','Tiendas_direccion','Tiendas_correo','Tiendas_contacto')->get();
    return view('configuracion/tiendas',['consulta'=>$consulta]);
  }

  public function EliminarTienda(Request $request){
    $id=$request->id;
    DB::table('tiendas')->where('Tiendas_ID', '=', $id)->delete();
    return;
  }

  public function ConsultaTienda($id){
    $consulta=DB::table('tiendas')->select('Tiendas_nombre','Tiendas_telefono','Tiendas_direccion','Tiendas_correo','Tiendas_contacto')
    ->where('Tiendas_ID','=',$id)->get();
    return response()->json(array($consulta));
  }

  public function UpdateTienda(Request $request){
    $id=$request->idT;
    $name=$request->name_tienda_M;
    $tel=$request->tel_tienda_M;
    $dire=$request->dire_tienda_M;
    $email=$request->email_tienda_M;
    $conta=$request->conta_tienda_M;
    $update=DB::table('tiendas')->where('Tiendas_ID','=',$id)->update(['Tiendas_nombre'=>$name,'Tiendas_telefono'=>$tel,'Tiendas_direccion'=>$dire,'Tiendas_correo'=>$email,'Tiendas_contacto'=>$conta]);
    $consulta=Db::table('tiendas')->select('Tiendas_ID','Tiendas_nombre','Tiendas_telefono','Tiendas_direccion','Tiendas_correo','Tiendas_contacto')->get();
    return view('configuracion/tiendas',['menssage'=>'Registro actualizado','consulta'=>$consulta]);
  }

}
