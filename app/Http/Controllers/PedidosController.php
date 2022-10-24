<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Gate;
use Auth;

class PedidosController extends Controller
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
    public function index()
    {
        // Obtener todos los registros de productos 
        $pedidos = Pedido::all();

         // enviar a la vista para mostras los productos
         return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo 'Hola';
        if(Gate::denies('administrador'))
        {
            return redirect()->route('pedidos.index');
        }
        //
        return view('pedidos.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $tipo = $request->tipo;
        // $descripcion = $request->descripcion;
        // $img = $request->img;
        // $precio = $request->precio;
        // $existencia = $request->existencia;
        // Producto::create($request->all());
        return redirect()->route('pedidos.index')->with('exito','¡El registro se ha creado satisfactoriamente!');

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if(Gate::denies('administrador'))
        // {
        //     return redirect()->route('productos.index');
        // }
        //
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(Gate::denies('administrador'))
        {
            return redirect()->route('pedidos.index');
        }
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pedido = Producto::findOrFail($id);
        return redirect()->route('pedidos.index')->with('exito','¡El registro se ha actualizado satisfactoriamente!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('administrador'))
        {
            return redirect()->route('pedidos.index');
        }
        //
        $pedido = Pedido::findOrFail($id);
        if(Storage::delete('public/'))
        {
            $pedido->delete();
        }
        return redirect()->route('pedidos.index');
    }
}
