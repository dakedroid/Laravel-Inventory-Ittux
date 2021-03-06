<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\InventarioFormRequest;
use App\InventarioModel;
use App\CarritoModel;
use DB;

class acercadeController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
    */

    public function index(Request $request)
    {
        return view('almacen.acercade.index');
    }

    public function show($id)
    {
        return view("almacen.acercade.show");
    }

}
