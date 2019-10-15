<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{

  public function InventarioIndex(){
    $consulta=DB::table('inventario')
    ->join('producto','inventario.Inventario_id_producto','=','producto.Producto_ID')
    ->join('tiendas','tiendas.Tiendas_ID','=','inventario.Inventario_id_tiendas')
    ->select('Inventario_ID','Producto_nombre','Producto_referencia','Producto_unidades','Inventario_cantidad','Tiendas_nombre','Inventario_costo')->get();
    return view('inventario/inventario',['consulta'=>$consulta]);
  }

  //movimiento de ubicacion
  public function ViewMovimientoUbicacion(){
    $consulta_T=DB::table('tiendas')->select('Tiendas_ID','Tiendas_Nombre')->get();
    $consulta_M=DB::table('movimientos_inventario')->select('MovimientosInventario_ID','MovimientosInventario_nombre','MovimientosInventario_tipo')->get();
    $consulta_U=DB::table('ubicacion')->select('Ubicacion_ID','Ubicacion_nombre')->get();
    return view('inventario/movimientos_ubicacion',['consultaT'=>$consulta_T,'consultaM'=>$consulta_M,'consultaU'=>$consulta_U]);
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
    return  response( $result );
  }

  public function CargaInventario(Request $request){
    $array=$request->productos;
    $consulta=DB::table('movimientos_inventario')->select('MovimientosInventario_tipo')->where('MovimientosInventario_ID','=',$request->IdMovimiento)->get();
    $consult=$consulta[0]->MovimientosInventario_tipo;
    if ($consult=='Entrada') {
      foreach ($array as $key ) {
        DB::update('call SumaInventario("'.$key['id'].'","'.$request->IdTienda.'","'.$key['cantidad'].'")');
      }
    }elseif ($consult=='Salida') {
      foreach ($array as $key ) {
        DB::update('call RestaInventario("'.$key['id'].'","'.$request->IdTienda.'","'.$key['cantidad'].'")');
      }
    }
    return;
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
