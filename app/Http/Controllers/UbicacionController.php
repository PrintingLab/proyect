<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UbicacionController extends Controller
{

public function UbicacionIndex(){
  $consulta=DB::table('ubicacion')->select('Ubicacion_ID','Ubicacion_nombre','Ubicacion_creacion')->get();
  return view('configuracion/ubicacion',['consulta'=>$consulta]);
}

public function CreateUbicacion(Request $request){
  $name=$request->name_ubicacion;
  DB::table('ubicacion')->insert(['Ubicacion_nombre'=>$name,'Ubicacion_creacion'=>NOW()]);
  $consulta=DB::table('ubicacion')->select('Ubicacion_ID','Ubicacion_nombre','Ubicacion_creacion')->get();
  return view('configuracion/ubicacion',['consulta'=>$consulta]);
}

public function EliminarUbicacion(Request $request){
  $id=$request->id;
  DB::table('ubicacion')->where('Ubicacion_ID', '=', $id)->delete();
  return;
}

public function ConsultaUbicacion($id){
  $consulta=DB::table('ubicacion')->SELECT('Ubicacion_nombre')->where('Ubicacion_ID','=',$id)->get();
  return response()->json(array($consulta));
}

public function UpdateUbicacion(Request $request){
  DB::table('ubicacion')->where('Ubicacion_ID','=',$request->idU)->update(['Ubicacion_nombre'=>$request->name_ubicacion_M]);
  $consulta=DB::table('ubicacion')->select('Ubicacion_ID','Ubicacion_nombre','Ubicacion_creacion')->get();
  return view('configuracion/ubicacion',['consulta'=>$consulta]);

}

}
