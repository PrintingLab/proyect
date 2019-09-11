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
    $consulta_M=DB::table('movimientos_inventario')->select('MovimientosInventario_ID','MovimientosInventario_nombre','MovimientosInventario_tipo')->get();
    return view('inventario/carga_inventario',['consultaT'=>$consulta_T,'consultaM'=>$consulta_M]);
  }


  public function AutoCompleteProduct(Request $request){
    $search =$request->searchText;

    $result=DB::select('call AutoCompleteProducto("'.$search.'")');

    //$result= json_encode($result);

    return  response( $result );

    /*
    if ( count($result) >0) {
      $response ="<option value='' disabled selected>Producto</option>";
      foreach ($result as $row) {
        $response .="<option id='".$row->Producto_ID."' data-value='".$row->Producto_unidades."'>".$row->Producto_nombre."</option>";
      }
    }else{
      $response= "<option value='' disabled selected> No data found </option>";
      $response .= "<option value='0' > No data found </option>";
    }
    return  response($response) ;
    */

  }

  //Configuracion Movimientos
  public function ConfigMovimientos(){
    $consulta=DB::table('movimientos_inventario')->select('MovimientosInventario_ID','MovimientosInventario_nombre','MovimientosInventario_tipo')->get();
    return view('inventario/configuracion_movimientos',['consulta'=>$consulta]);
  }
  public function CrearConfigMovimientos(Request $request){
    DB::table('movimientos_inventario')->insert(['MovimientosInventario_nombre'=>$request->name_movimientos_inventario,'MovimientosInventario_tipo'=>$request->tipo_movimiento]);
    $consulta=Db::table('movimientos_inventario')->select('MovimientosInventario_ID','MovimientosInventario_nombre','MovimientosInventario_tipo')->get();
    return view('inventario/configuracion_movimientos',['consulta'=>$consulta]);
  }
  public function EliminarConfigMovimientos(Request $request){
    $id=$request->id;
    DB::table('movimientos_inventario')->where('MovimientosInventario_ID', '=', $id)->delete();
    return;
  }
  public function ConsultaConfigMovimientos($id){
    $consulta=DB::table('movimientos_inventario')->select('MovimientosInventario_nombre','MovimientosInventario_tipo')->where('MovimientosInventario_ID','=',$id)->get();
    return response()->json(array($consulta));
  }
  public function UpdateConfigMovimientos(Request $request){
    $id=$request->id_CMI;
    $name=$request->id_CMI_name;
    $tipo=$request->id_CMI_tipo;
    $update=DB::table('movimientos_inventario')->where('MovimientosInventario_ID','=',$id)->update(['MovimientosInventario_nombre'=>$name,'MovimientosInventario_tipo'=>$tipo]);
    $consulta=DB::table('movimientos_inventario')->select('MovimientosInventario_ID','MovimientosInventario_nombre','MovimientosInventario_tipo')->get();
    return view('inventario/configuracion_movimientos',['menssage'=>'Registro actualizado','consulta'=>$consulta]);
  }


}
