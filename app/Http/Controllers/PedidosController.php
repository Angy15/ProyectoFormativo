<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
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
    public function index(Pedidos $id)
    {
        // Obtener todos los registros del pedido
        $usuarios = User::all();
        
        $dd = auth()->user()->id;

        
        
        if(Auth::user()->hasRol("Administrador")){
            
            $pedidoUsuario = Pedidos::all();
            return view('pedidos.index', compact("pedidoUsuario"));

        }
            $pedidos = Pedidos::findOrFail($id);

            $pedidoUsuario = Pedidos::where("user_id", $dd)
            ->get();
       
    
    
        // $user = User::where('user_id',auth()->user()->id)->get();
         // enviar a la vista para mostras los productos
       

         return view('pedidos.index', compact("pedidos","usuarios","pedidoUsuario"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productos = Producto::orderBy('tipo', 'asc')->get();
        return view('pedidos.insert', compact('productos'));
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
        $user_id = $request->user_id;
        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $telefono = $request->telefono;
        $direccion = $request->direccion;
        $productos_id = $request->productos_id;
        $cantidad = $request->cantidad;
        $productos2_id = $request->productos2_id;
        $cantidad2 = $request->cantidad2;
        $estado = $request->estado;

        Pedidos::create($request->all());
        return redirect()->route('pedidos.index')->with('exito', '¡El registro se ha creado satisfactoriamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pedidos = Pedidos::join('productos', 'pedidos.productos_id', 'productos.id')
                                        ->select('pedidos.id', 'pedidos.nombre', 'pedidos.apellido', 'pedidos.telefono',
                                                    'pedidos.direccion', 'pedidos.productos_id', 'pedidos.cantidad', 
                                                    'pedidos.productos2_id', 'pedidos.cantidad2','pedidos.estado', 'productos.tipo as productos')
                                                    ->where('pedidos.id',$id)
                                                    ->first();

        $pedidos2 = Pedidos::join('productos', 'pedidos.productos2_id',  'productos.id')
                                        ->select('pedidos.id', 'pedidos.nombre', 'pedidos.apellido', 'pedidos.telefono',
                                                        'pedidos.direccion', 'pedidos.productos_id', 'pedidos.cantidad', 
                                                        'pedidos.productos2_id', 'pedidos.cantidad2','pedidos.estado', 'productos.tipo as productos2')
                                                        ->where('pedidos.id',$id)
                                                        ->first();

        return view('pedidos.show', compact('pedidos', 'pedidos2'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pedidos = Pedidos::findOrFail($id);
        if(Gate::denies('administrador'))
        {
            if($pedidos->estado=="En proceso")
            {
                return redirect()->route('pedidos.index');
            }
        }


    
        $productos = Producto::orderBy('tipo', 'asc')->get();
        return view('pedidos.edit', compact('pedidos', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pedidos = Pedidos::findOrFail($id);

        $pedidos->update($request->all());
        return redirect()->route('pedidos.index')->with('exito', '¡El registro se ha actualizado satisfactoriamente!');

    }

    public function updateEstado(Request $request,$id)
    {

        // dd($id);
        $pedido = Pedidos::find($id);
        $pedido->estado = $request->estado;
        $pedido->save();

        return redirect()->route('pedidos.index')->with('exito', '¡El registro se ha actualizado satisfactoriamente!');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pedidos = Pedidos::findOrFail($id);
        if(Gate::denies('administrador'))
        {
            if($pedidos->estado=="En proceso")
            {
                return redirect()->route('pedidos.index');
            }
        }

        $pedidos = Pedidos::findOrFail($id);

        $pedidos->delete();

        return redirect()->route('pedidos.index');
    }
}
