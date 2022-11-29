<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;

class DetallePedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Producto $id)
    {
        $user = User::all();
        $name = auth()->user()->name;
        $usuarioId = auth()->user()->id;
        $email = auth()->user()->email;

        $producto = Producto::findOrFail($id);

        $detallePedido = DetallePedido::where('user_id', $usuarioId)->get();


        return view('detallePedidos.index', compact('user', 'name', 'usuarioId', 'email', 'producto', 'detallePedido'));


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
        $usuario = User::all();

        $userId = auth()->user()->id;
        $name = auth()->user()->name;

        $datos = $request->except('_token');
        dd($datos);

        DetallePedido::insert($datos);

        return redirect()->route('detallePedidos.index', compact('userId'))->with('exito', 'Producto se ha registrado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function show(DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function edit(DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetallePedido $detallePedido)
    {
        //
    }
}
