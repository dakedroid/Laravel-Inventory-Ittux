<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarritoModel;
use App\InventarioModel;
use App\PrestamoModel;
use App\Http\Requests\Historial_salidasFormRequest;
use App\Historial_salidasModel;
use Illuminate\Support\Facades\Redirect;
use DB;
use PDF;
class PrestamoController extends Controller
{

 public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(Request $request)
  {
      if ($request)
      {
          $query=trim($request->get('searchText'));
          $prestamo=DB::table('prestamo')->where('nombre','LIKE','%'.$query.'%')
          ->orderBy('num_progre','desc')
          ->paginate(10);
          return view('almacen.prestamo.index',["prestamo"=>$prestamo,"searchText"=>$query]);
      }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
     
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      return view("almacen.prestamo.show",["carrito"=>CarritoModel::findOrFail($id)]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      return view("almacen.carrito.edit",["carrito"=>CarritoModel::findOrFail($id)]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $prestamo=PrestamoModel::where('clave', '=' ,$id)->firstOrFail();
      $inventario=InventarioModel::where('clave', '=' ,$id)->firstOrFail();
      $inventario->cantidad= $inventario->cantidad + $prestamo->cantidad;
      $inventario->update();
      DB::table('prestamo')->where('clave', $id)->delete();  
      return Redirect::to('almacen/inventario');
  }
}
