<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{

public function InventarioIndex(){
  return view('inventario/inventario');
}
//movimiento de inventario
public function ViewMove(){
  return view('inventario/move_inventario');
}

//Carga de Inventario
public function ViewCargaInventario(){
  $consulta_T=DB::table('tiendas')->select('Tiendas_ID','Tiendas_Nombre')->get();
  return view('inventario/carga_inventario',['consultaT'=>$consulta_T]);
}

public function AutoCompleteProduct(Request $request){

$search =$request->get('term');
$result=DB::table('producto')->select('Producto_ID','Producto_nombre')
->where('Producto_nombre','LIKE','%'.$search.'%')
->get();

  return  response()->json($result) ;

}


}
