<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\Producto;
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
        $pedidos = Pedidos::all();

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
        $producto = Producto::orderBy('tipo', 'asc')->get();
        //
        return view('pedidos.insert', compact('producto'));
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
        // $producto_id = $request->producto_id;
        // $cantidad = $request->cantidad;
        // $nombreCliente = $request->nombreCliente;
        // $apellidoCliente = $request->apellidoCliente;
        // $direccionCliente = $request->direccionCliente;
        // $correoCliente = $request->correoCliente;
        // $contactoCliente = $request->contactoCliente;
        // Producto::create($request->all());
        Pedidos::create($request->all());

        return redirect()->route('pedidos.index')->with('exito', '¡El registro se ha creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedidos  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if(Gate::denies('administrador'))
        // {
        //     return redirect()->route('productos.index');
        // }
        //
        // $pedido = Pedidos::findOrFail($id);
        $pedidos = Pedidos::join('productos','pedidos.producto_id','producto.id')
                                            ->select('pedidos.id','pedidos.cantidad',
                                            'pedidos.nombreCliente','pedidos.apellidoCliente',
                                            'pedidos.direccionCliente', 'pedidos.correoCliente',  
                                            'pedidos.contactoCliente','producto.tipo as masa')
                                            ->where('pedidos.id',$id)
                                            ->first();
        return view('pedidos.show', compact('pedidos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedidos  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(Gate::denies('administrador'))
        {
            return redirect()->route('pedidos.index');
        }
        $pedido = Pedidos::findOrFail($id);
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
        $producto = Producto::findOrFail($id);
        $pedidos->update($request->all());

        return redirect()->route('pedidos.index')->with('exito', '¡El registro se ha modificado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedidos  $producto
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
