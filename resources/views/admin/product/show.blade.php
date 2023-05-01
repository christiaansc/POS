@extends('layouts.dashboard')
@section('title','Gestión de productos')

@section('breadcrumb')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administracion de productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li> 
              <li class="breadcrumb-item"><a href="/products">Productos</a></li>     
              <li class="breadcrumb-item active">{{$product->nombre}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
            <!-- Profile Image -->
                <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                    </div>
                    <h3 class="profile-username text-center">{{ $product->nombre }}</h3>
                    <!-- <p class="text-muted text-center">Software Engineer</p> -->

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Proveedor</b> <a class="float-right">{{ $product->provider_id }} </a>
                        </li>
                        <li class="list-group-item">
                            <b>Categoria</b> <a class="float-right">{{ $product->categoria->nombre }}</a>
                        </li>
                    </ul>
                    @if ($product->stado == 'ACTIVO')
                        <a href="{{route('change.status.products', $product->id)}}" class="btn btn-success btn-block">Activo</a>
                        @else
                        <a href="{{route('change.status.products', $product->id)}}" class="btn btn-danger btn-block">Desactivado</a>
                    @endif
                    </div>  <!-- /.card-body -->
                </div>  
            </div>  <!-- /.col -->
            <div class="col-md-8">
                <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Información del producto</h3>
                        </div>
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Descripcion</strong>
                            <p class="text-muted">
                                {{ $product->descripcion }}
                            </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Codigo Busqueda</strong>

                            <p class="text-muted">{{ $product->codigo }}</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Precio </strong>

                            <p class="text-muted">
                               $ {{ number_format($product->precio) }}
                            </p>

                        </div>  <!-- /.card-body -->
                </div> <!-- /.card -->
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection