@extends('layouts.app')
@section('titulo', 'Registrar Pedido')

@section('contenido')
<div class="mb-3 text-center">
    <h2>Registrar Nuevo Pedido</h2>
</div>

<form action="{{ route('pedidos.store') }}" method="POST">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
            Corrige los errores del formulario.
        </div>
    @endif

    <div class="mb-3">
        <label class="form-label">Nombre *</label>
        <input 
            type="text" name="nombre_cliente" class="form-control @error('nombre_cliente') is-invalid @enderror"
            
        >
        @error('nombre_cliente')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Teléfono *</label>
        <input type="text" name="telefono_cliente" class="form-control @error('telefono_cliente') is-invalid @enderror"
        >
        @error('telefono_cliente')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Servicio *</label>
        <input type="text" name="servicio" class="form-control @error('servicio') is-invalid @enderror" >
        @error('servicio')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Cantidad *</label>
        <input type="number" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror">
        @error('cantidad')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <a href="{{ route('pedidos.index') }}" class="btn btn-danger">Cancelar</a>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
@endsection
