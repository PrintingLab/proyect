<?php
namespace App\Http\Controllers;
// namespace App\Http\Controllers\AmazonPay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class EmpresaController extends Controller
{

  public function EmpresaIndex(){
    $consulta=DB::table('empresa')->select('Empresa_nombre','Empresa_telefono','Empresa_direccion','Empresa_correo','Empresa_correo','Empresa_logo')->get();
    //dd($consulta[0]->Empresa_nombre);
    /*if (condition) {

    }else{

    }*/
    return view('empresa',['E_name'=>$consulta[0]->Empresa_nombre,'E_tel'=>$consulta[0]->Empresa_telefono,'E_dir'=>$consulta[0]->Empresa_direccion,'E_mail'=>$consulta[0]->Empresa_correo,'E_img'=>$consulta[0]->Empresa_logo]);

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
  }


}
