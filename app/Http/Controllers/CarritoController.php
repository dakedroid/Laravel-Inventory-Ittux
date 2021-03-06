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
use App;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function __construct()
  {
      $this->middleware('auth');
  }

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
      return view("almacen.carrito.create");    
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
    public function update(Request $request)

    {


	   $destinos = DB::table('carrito')->pluck('destino');

        if ($destinos->get(0) == "departamento"){
            
            return view("almacen.carrito.create");  

         }else if ($destinos->get(0) == "prestamo"){

            return Redirect::to('/pdf/prestamo');

        }     


        //$pdf = PDF::loadView('documentos.entradas');
        //return $pdf->download('archivo.pdf');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $inventario=InventarioModel::where('clave', '=' ,$id)->firstOrFail();
        $carrito=CarritoModel::where('clave', '=' ,$id)->firstOrFail();
        $inventario->cantidad= $inventario->cantidad + $carrito->cantidad;
        $inventario->update();

        DB::table('carrito')->where('clave', $id)->delete();
        $carrito->update();

        DB::table('historial_salidas')->where('clave', $id)->delete();
        return Redirect::to('almacen/inventario');
    }

}
