<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProyectosController extends Controller
{
  public function IndexCrear(){
    return view('proyectos/crear_proyectos');
  }

//Sings

public function Signs(Request $request){
  //dd($request->producto);
  return view('proyectos/signs');
}

}
