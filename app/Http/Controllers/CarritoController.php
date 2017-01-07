<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarritoModel;
use App\InventarioModel;
use Illuminate\Support\Facades\Redirect;
use DB;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $carrito=DB::table('carrito')->where('nombre','LIKE','%'.$query.'%')
           
            ->orderBy('num_progre','asc')
            ->paginate(10);
            return view('almacen.carrito.index',["carrito"=>$carrito,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carrito=new CarritoModel;
      //  $carrito->num_progre=$request->get('num_progre');
        $carrito->nombre=$request->get('nombre');
        $carrito->clave=$request->get('clave');
        $carrito->categoria=$request->get('categoria');
        $carrito->tipo=$request->get('tipo');
        $carrito->cantidad=($request->get('cantidad'))-($request->get('c_prestar'));
        $carrito->unidad=$request->get('unidad');
        $carrito->portador=$request->get('portador');
        $carrito->save();
        return Redirect::to('almacen/carrito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("almacen.carrito.show",["carrito"=>CarritoModel::findOrFail($id)]);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventario=InventarioModel::findOrFail($id);
        $carrito=CarritoModel::findOrFail($id);
        $inventario->cantidad= $inventario->cantidad + $carrito->cantidad;
        //$carrito->cantidad = 0;
        $inventario->update();

        DB::table('carrito')->where('num_progre', $id)->delete();
        $carrito->update();
        return Redirect::to('almacen/inventario');
    }
}
