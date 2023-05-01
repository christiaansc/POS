@extends('layouts.dashboard')
@section('title','Gestión de productos')

@section('breadcrumb')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reporte de ventas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>      
              <li class="breadcrumb-item active">Reporte dia</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">


                    <div class="row ">
                        <div class="col-12 col-md-4 text-center">
                            <span>Fecha de consulta: <b> </b></span>
                            <div class="form-group">
                                <strong>{{\Carbon\Carbon::now()->format('d/m/Y')}}</strong>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center">
                            <span>Cantidad de registros: <b></b></span>
                            <div class="form-group">
                                <strong>{{$ventas->count()}}</strong>
                            </div>
                        </div>
                    
                        <div class="col-12 col-md-4 text-center">
                            <span>Total de ingresos: <b> </b></span>
                            <div class="form-group">
                                $<strong> {{number_format($total)}}</strong>
                            </div>
                        </div>
                    </div>
                 


                    <div class="card-body table-responsive">
                        <table  id="example1"class="table table-bordered table-striped dataTable dtr-inline" id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th style="width:50px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ventas as $sale)
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('ventas.show', $sale)}}">{{$sale->id}}</a>
                                    </th>
                                    <td>
                                        {{\Carbon\Carbon::parse($sale->sale_date)->format('d M y h:i a')}}
                                    </td>
                                    <td>$ {{number_format($sale->total)}}</td>
                                    <td>{{$sale->stado}}</td>
                                    <td style="width: 50px;">
                                       
                                        {{--  <a class="jsgrid-button jsgrid-edit-button" href="{{route('ventas.edit', $sale)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>  --}}
{{--                                          
                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>  --}}

                                        <a href="{{route('ventas.pdf', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                        <a href="{{route('ventas.print', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a>
                                        <a href="{{route('ventas.show', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                   
                                      
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$ventas->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "responsive": true,
      "searching": true,
	  "ordering": false,
    });
  });
</script>
@endsection