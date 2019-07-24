<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
  //producto
  public function ProductoIndex(){
    $consulta=DB::table('producto')
    ->join('marca','producto.Producto_marca','=','marca.Marca_ID')
    ->join('categoria' ,'producto.Producto_categoria','=','categoria.Categoria_ID')
    ->select('Producto_ID','Producto_nombre','Producto_referencia','Producto_unidades','categoria.Categoria_nombre as categorias','marca.Marca_nombre as marcas','Producto_costo')
    ->get();
    return view('productos/producto',['consulta'=>$consulta]);
  }
  public function CrearProducto(){
    $consulta_C=Db::table('categoria')->select('Categoria_ID','Categoria_nombre')->get();
    $consulta_M=Db::table('marca')->select('Marca_ID','Marca_nombre')->get();
    return view('productos/create_producto',['marca'=>$consulta_M,'categoria'=>$consulta_C]);
  }
  public function AddProduct(Request $request){
    DB::table('producto')->insert(['Producto_nombre'=>$request->name_P,'Producto_referencia'=>$request->referencia_P,'Producto_unidades'=>$request->unidades_P,'Producto_categoria'=>$request->categoria_P,'Producto_marca'=>$request->marca_P,'Producto_costo'=>$request->costo_P]);
    $consulta=DB::table('producto')
    ->join('marca','producto.Producto_marca','=','marca.Marca_ID')
    ->join('categoria' ,'producto.Producto_categoria','=','categoria.Categoria_ID')
    ->select('Producto_ID','Producto_nombre','Producto_referencia','Producto_unidades','categoria.Categoria_nombre as categorias','marca.Marca_nombre as marcas','Producto_costo')
    ->get();
    return view('productos/producto',['consulta'=>$consulta]);
  }
  //categoria
  public function CategoriaIndex(){
    $consulta=Db::table('categoria')->select('Categoria_ID','Categoria_nombre')->get();
    return view('productos/categoria',['consulta'=>$consulta]);
  }
  public function CrearCategoria(Request $request){
    DB::table('categoria')->insert(['Categoria_nombre'=>$request->name_categoria]);
    $consulta=Db::table('categoria')->select('Categoria_ID','Categoria_nombre')->get();
    return view('productos/categoria',['consulta'=>$consulta]);
  }
  public function EliminarCategoria(Request $request){
    $id=$request->id;
    DB::table('categoria')->where('Categoria_ID', '=', $id)->delete();
    return;
  }
  public function ConsultaCategoria($id){
    $consulta=DB::table('categoria')->select('Categoria_nombre')->where('Categoria_ID','=',$id)->get();
    return response()->json(array($consulta));
  }
  public function UpdateCategoria(Request $request){
    $id=$request->idC;
    $name=$request->name_categorias_M;
    $update=DB::table('categoria')->where('Categoria_ID','=',$id)->update(['Categoria_nombre'=>$name]);
    $consulta=Db::table('categoria')->select('Categoria_ID','Categoria_nombre')->get();
    return view('productos/categoria',['menssage'=>'Registro actualizado','consulta'=>$consulta]);
  }
  //marca
  public function MarcaIndex(){
    $consulta=Db::table('marca')->select('Marca_ID','Marca_nombre')->get();
    return view('productos/marca',['consulta'=>$consulta]);
  }
  public function CrearMarca(Request $request){
    DB::table('marca')->insert(['Marca_nombre'=>$request->name_marca]);
    $consulta=Db::table('marca')->select('Marca_ID','Marca_nombre')->get();
    return view('productos/marca',['consulta'=>$consulta]);
  }
  public function EliminarMarca(Request $request){
    $id=$request->id;
    DB::table('marca')->where('Marca_ID', '=', $id)->delete();
    return;
  }
  public function ConsultaMarca($id){
    $consulta=Db::table('marca')->select('Marca_nombre')->where('Marca_ID','=',$id)->get();
    return response()->json(array($consulta));
  }
  public function UpdateMarca(Request $request){
    $id=$request->idM;
    $name=$request->name_marca_M;
    $update=DB::table('marca')->where('Marca_ID','=',$id)->update(['Marca_nombre'=>$name]);
    $consulta=Db::table('marca')->select('Marca_ID','Marca_nombre')->get();
    return view('productos/marca',['menssage'=>'Registro actualizado','consulta'=>$consulta]);
  }
}
