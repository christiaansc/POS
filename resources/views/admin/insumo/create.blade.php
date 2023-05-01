@extends('layouts.dashboard')
@section('title','Crear Insumo')

@section('breadcrumb')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de Insumos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>  
              <li class="breadcrumb-item"><a href="/insumos">Insumos</a></li>      
              <li class="breadcrumb-item active">Crear Insumo</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')

<div class="container-fluid">
    <div class="card ">
        <div class="card-body">
	
                    {!! Form::open(['route'=>'insumos.store', 'method'=>'POST','files' => true]) !!}
                   
                    <div class="form-group">
                      <label for="nombre">Detalle</label>
                      <input type="text" name="nombre" id="nombre" class="form-control" aria-describedby="helpId" required>
                    </div>
           
                    <div class="form-group">
          
                      <label for="tipo_insumo">Tipo Insumo</label>
                      <select class="form-control" name="tipo_insumo" id="tipo_insumo">                    
                        <option value="LOCAL">LOCAL</option>
                           
                      </select>
                    </div>
         
  
                    <div class="form-group">
                        <label for="stock">Cantidad</label>
                        <input type="number" name="stock" id="stock" class="form-control" aria-describedby="helpId" required>
                    </div>
				
                     <button type="submit" class="btn btn-success mr-2">Registrar</button>
                     <a href="{{route('insumos.index')}}" class="btn btn-info">
                        Cancelar
                     </a>
                     {!! Form::close() !!}

        </div>
    </div> 
</div>
@endsection