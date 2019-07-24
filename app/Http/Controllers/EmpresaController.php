<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{

  public function EmpresaIndex(){
    $consulta=DB::table('empresa')->select('Empresa_nombre','Empresa_telefono','Empresa_direccion','Empresa_correo','Empresa_logo')->get();
    if ($consulta->count() == 0){
      return view('configuracion/empresa',['E_name'=>'']);
    }else{
      return view('configuracion/empresa',['E_name'=>$consulta[0]->Empresa_nombre,'E_tel'=>$consulta[0]->Empresa_telefono,'E_dir'=>$consulta[0]->Empresa_direccion,'E_mail'=>$consulta[0]->Empresa_correo,'E_img'=>$consulta[0]->Empresa_logo]);
    }
  }

  public function CrearEmpresa(request $request ){
    $archivo= $request->logo;
    if (isset($archivo)) {
      $archivo=$request->file('logo');
      $name_archivo=$archivo->getClientOriginalExtension();
      $name_archivo=date('Ymd').'.'.$name_archivo;
      $archivo->move('img/empresa/',$name_archivo);
    }else{
      $name_archivo="";
    }
    DB::table('empresa')->insert(['Empresa_nombre'=>$request->name_empresa,'Empresa_telefono'=>$request->telefono,'Empresa_direccion'=>$request->direccion,
    'Empresa_correo'=>$request->email,'Empresa_logo'=>$name_archivo,'Empresa_creacion'=>NOW()]);
    //revisar el registro
    $consulta=DB::table('empresa')->select('Empresa_nombre','Empresa_telefono','Empresa_direccion','Empresa_correo','Empresa_correo','Empresa_logo')->get();
    return view('configuracion/empresa',['E_name'=>$consulta[0]->Empresa_nombre,'E_tel'=>$consulta[0]->Empresa_telefono,'E_dir'=>$consulta[0]->Empresa_direccion,'E_mail'=>$consulta[0]->Empresa_correo,'E_img'=>$consulta[0]->Empresa_logo]);
  }

  public function UpdateEmpresa(request $request){
    $consulta=DB::table('empresa')->select('Empresa_ID','Empresa_logo')->get();
    $id=$consulta[0]->Empresa_ID;
    $name=$request->name_empresa_u;
    $tel=$request->name_tel_u;
    $dire=$request->name_direccion_u;
    $email=$request->name_email_u;
    if($request->logo_u==null){
      $logo=$consulta[0]->Empresa_logo;
    }else{
      $archivo=$request->file('logo_u');
      $logo=$archivo->getClientOriginalExtension();
      $logo=date('Ymd').'.'.$logo;
      $archivo->move('img/empresa/',$logo);
    }
    $update=DB::table('empresa')->where('Empresa_ID',$id)->update(['Empresa_nombre'=>$name,'Empresa_telefono'=>$tel,'Empresa_direccion'=>$dire,'Empresa_correo'=>$email,'Empresa_logo'=>$logo]);
    $consulta=DB::table('empresa')->select('Empresa_nombre','Empresa_telefono','Empresa_direccion','Empresa_correo','Empresa_correo','Empresa_logo')->get();
    return view('configuracion/empresa',['E_name'=>$consulta[0]->Empresa_nombre,'E_tel'=>$consulta[0]->Empresa_telefono,'E_dir'=>$consulta[0]->Empresa_direccion,'E_mail'=>$consulta[0]->Empresa_correo,'E_img'=>$consulta[0]->Empresa_logo]);
  }
}
