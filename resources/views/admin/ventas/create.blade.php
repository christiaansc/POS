@extends('layouts.dashboard')
@section('title','Gestión de Ventas')

@section('content')
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="card">
            {!! Form::open(['route'=>'ventas.store', 'method'=>'POST']) !!}
            <div class="card-body">
                         
                @include('admin.ventas._form')
                    
                    
            </div>
            <div class="card-footer text-muted">
                <button type="submit" id="guardar" style="display:none" class="btn btn-primary float-right">Registrar</button>
                    <a href="{{route('ventas.index')}}" class="btn btn-danger">
                    Volver
                    </a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="../../dist/js/venta.js" defer ></script>
@endsection