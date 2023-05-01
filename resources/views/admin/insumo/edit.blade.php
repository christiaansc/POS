@extends('layouts.dashboard')
@section('title','Editar producto')

@section('breadcrumb')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Insumos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>      
              <li class="breadcrumb-item"><a href="/insumos">Insumos</a></li>
              <li class="breadcrumb-item active">editar insumos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
	
                {!! Form::model($insumo,['route'=>['insumos.update',$insumo], 'method'=>'PUT']) !!}
					<div class="form-group">
						<label for="tipo_insumo">Tipo insumo</label>

						<select class="form-control" name="tipo_insumo" id="tipo_insumo">
                        @foreach ($tiposInsumo as $t_insumo)
						<option value="{{$t_insumo}}"
                            @if( $t_insumo == $insumo->tipo_insumo)
                            selected
                            @endif
                            >{{$t_insumo}}</option>
                        @endforeach	                     
                      	</select>
					</div>
					<div class="form-group">
						<label for="stock">Stock</label>
						<input type="number" class="form-control" name="stock" id="stock" aria-describedby="helpId"  value="{{$insumo->stock}}"required>
						<input type="hidden" class="form-control" name="id" id="id" value="{{$insumo->id}}">
                        
					</div>
				
                    <button type="submit" class="btn btn-success mr-2">Editar</button>
                    <a href="{{route('insumos.index')}}" class="btn btn-info">
                        Cancelar
                    </a>
                {!! Form::close() !!}

        </div>
    </div> 
</div>
@endsection