@extends('layouts.dashboard')
@section('title','Editar producto')

@section('breadcrumb')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Producto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>      
              <li class="breadcrumb-item"><a href="/products">Productos</a></li>
              <li class="breadcrumb-item active">editar producto</li>

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')

<div class="container">
    <div class="card ">
        <div class="card-body">
	
                  
                   
                    {!! Form::model($product,['route'=>['products.update',$product], 'method'=>'PUT','files' => true]) !!}

                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" name="nombre" id="nombre" class="form-control" value="{{$product->nombre}}" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                      <label for="codigo">Código de barras</label>
                      <input type="text" name="codigo" value="{{$product->codigo}}"  id="codigo" class="form-control" required>
                      <!-- <small id="helpId" class="text-muted">Campo opcional</small> -->
                    </div>

                    <div class="form-group">
                      <label for="descripcion">descripcion</label>
                      <textarea name="descripcion" id="descripcion" cols="100" rows="4" class="form-control">{{$product->descripcion}} </textarea>
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio de venta</label>
                        <input type="number" name="precio" id="precio" value="{{$product->precio}}"  class="form-control" aria-describedby="helpId" required>
                    </div>
  
                	<input type="hidden" name="stock" id="stock" class="form-control" aria-describedby="helpId" value="1" >
                            
                    <div class="form-group">
                      <label for="categoria_id">Categoría</label>
  
                      <select class="form-control" name="categoria_id" id="categoria_id">
                        @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}" 
                            @if ($categoria->id == $product->categoria_id)
                            selected
                            @endif
                            >{{$categoria->nombre}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                        <label for="provider_id">Proveedor</label>
                        <select class="form-control" name="provider_id" id="provider_id">
                      
                        <option value="1">WafflesBikes</option>

                        </select>
                    </div>
                     <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                     <a href="{{route('products.index')}}" class="btn btn-info">
                        Cancelar
                     </a>
                     {!! Form::close() !!}

        </div>
    </div> 
</div>
@endsection