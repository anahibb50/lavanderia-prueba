<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::getPedidos();

        return view('pedidos.index',compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pedidos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'telefono_cliente' => 'required|regex:/^[0-9]{10}$/',
            'servicio' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
        ]);

        Pedido::create([
            'nombre_cliente'=>$request->nombre_cliente,
            'telefono_cliente'=>$request->telefono_cliente,
            'servicio'=>$request->servicio,
            'cantidad'=>$request->cantidad,
            'estado'=>'lavando',
        ]);
        return redirect()->route('pedidos.index')->with('success', 'Pedido creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        return view('pedidos.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'telefono_cliente' => 'required|regex:/^[0-9]{10}$/',
            'servicio' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
            'estado' => 'required|string',
        ]);
        $pedido->update([
            'nombre_cliente'=>$request->nombre_cliente,
            'telefono_cliente'=>$request->telefono_cliente,
            'servicio'=>$request->servicio,
            'cantidad'=>$request->cantidad,
            'estado'=>$request->estado,
        ]);

        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->update(['estado' => 'eliminado']);
        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado exitosamente.');
    }
}
