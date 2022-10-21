<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Gate;
=======
use Illuminate\Support\Facades\Storage;
use Gate;
use Auth;
>>>>>>> 318dc06 (dayron)

class ProductoController extends Controller
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
        $productos = Producto::all();

         // enviar a la vista para mostras los productos
         return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('administrador'))
        {
            return redirect()->route('productos.index');
        }
        //
        return view('productos.insert');
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
<<<<<<< HEAD
        $tipo = $request->tipo;
        $descripcion = $request->descripcion;
        $img = $request->img;
        $precio = $request->precio;
        $existencia = $request->existencia;

        Producto::create($request->all());
=======
        // $tipo = $request->tipo;
        // $descripcion = $request->descripcion;
        // $img = $request->img;
        // $precio = $request->precio;
        // $existencia = $request->existencia;
        $datosProductos = $request->except('_token');
        if($request->hasFile('imagen'))
        {
            $datosProductos['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }

        Producto::insert($datosProductos);
        // Producto::create($request->all());
>>>>>>> 318dc06 (dayron)
        return redirect()->route('productos.index')->with('exito','¡El registro se ha creado satisfactoriamente!');

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
<<<<<<< HEAD
        if(Gate::denies('administrador'))
        {
            return redirect()->route('productos.index');
        }
=======
        // if(Gate::denies('administrador'))
        // {
        //     return redirect()->route('productos.index');
        // }
>>>>>>> 318dc06 (dayron)
        //
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
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
<<<<<<< HEAD
=======
        if(Gate::denies('administrador'))
        {
            return redirect()->route('productos.index');
        }
>>>>>>> 318dc06 (dayron)
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
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
<<<<<<< HEAD

        $producto->update($request->all());
=======
        $datosProductos = $request->except(['_token', '_method']);
        if($request->hasFile('imagen'))
        {
            Storage::delete('public/'. $producto->imagen);
            $datosProductos['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }

        // $producto->update($request->all());
        Producto::where('id', $id)->update($datosProductos);
>>>>>>> 318dc06 (dayron)
        return redirect()->route('productos.index')->with('exito','¡El registro se ha actualizado satisfactoriamente!');


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
            return redirect()->route('productos.index');
        }
        //
        $producto = Producto::findOrFail($id);
<<<<<<< HEAD
        $producto->delete();
=======
        if(Storage::delete('public/'. $producto->imagen))
        {
            $producto->delete();
        }
>>>>>>> 318dc06 (dayron)
        return redirect()->route('productos.index');
    }
}
