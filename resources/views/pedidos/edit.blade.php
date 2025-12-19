@extends('layouts.app')
@section('titulo', 'Editar Pedido')
@section('contenido')

    <div class="mb-3 text-center">
        <h2 >Modificar Pedido de {{$pedido->nombre_cliente}}</h2>
    </div>
    <form action="{{route('pedidos.update',$pedido)}}" method="POST">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                Corrige los errores del formulario.
            </div>
        @endif
        <div class="mb-3"> 
            <label class="form-label">Nombre  *</label> 
            <input type="text" name="nombre_cliente" class="form-control" value="{{$pedido->nombre_cliente}}" required> 
        </div>
        <div class="mb-3"> 
            <label class="form-label">Teléfono *</label>
            <input type="text" name="telefono_cliente" class="form-control @error('telefono_cliente') is-invalid @enderror" value="{{$pedido->telefono_cliente}}" >
        <div class="mb-3"> 
            <label class="form-label">Servicio *</label>
            <input type="text" name="servicio" class="form-control @error('servicio') is-invalid @enderror" value="{{$pedido->servicio}}" required>
        </div>
        <div class="mb-3"> 
            <label class="form-label">Cantidad *</label>
            <input type="number" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror" value="{{$pedido->cantidad}}" required>
        </div>  
        <div class="mb-3"> 
            <label class="form-label">Estado *</label>
            <select name="estado" class="form-select" required>
                <option value="">Seleccione un estado</option>
                <option value="lavando" {{ $pedido->estado == 'lavando' ? 'selected' : '' }}>Lavando</option>
                <option value="listo" {{ $pedido->estado == 'listo' ? 'selected' : '' }}>Listo</option>
                <option value="recogido" {{ $pedido->estado == 'recogido' ? 'selected' : '' }}>Recogido</option>
            </select>
        </div>      
       
        <a href="{{route('pedidos.index')}}"class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>

@endsection