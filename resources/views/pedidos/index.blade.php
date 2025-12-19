@extends('layouts.app')
@section('titulo', 'Lista de Pedidos')
@section('contenido')
    <div class="mb-3 gap-2 d-flex">
        <a href="{{ route('pedidos.create') }}"class="btn btn-outline-dark">Crear Pedido</a>

    </div>

    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Cliente</th>
                    <th>Teléfono del Cliente</th>
                    <th>Servicio</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Fecha de registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->nombre_cliente }}</td>
                        <td>{{ $pedido->telefono_cliente }}</td>
                        <td>{{ $pedido->servicio }}</td>
                        <td>{{ $pedido->cantidad }}</td>
                        <td>{{ $pedido->estado }}</td>
                        <td>{{ $pedido->created_at }}</td>
                        <td>
                            <a href="{{ route('pedidos.edit', $pedido) }}" class="btn btn-sm btn-warning">
                                Editar</a>
                            <form action="{{ route('pedidos.destroy', $pedido) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                onclick="return confirm('¿Estás seguro de eliminar este pedido?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection