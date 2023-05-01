@extends('layouts.dashboard')
@section('title', 'Dashboard')

@section('content')
<div class="content pt-4">
    
    @role('Administrador')
        <!-- fitro periodo -->
        <!-- Montos ventas   -->
        <div class="row">
            
            <div class="col-lg-3">
                    <!-- small card -->
                @foreach($prom as $p)
                <div class="small-box bg-success">
                    <div class="inner">
                        <h2>${{number_format($p->total / $dayOfTheWeek)}}</h2>
                            <p>Promedio Venta mensual</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                 
                    </div>
                </div>
                @endforeach
                <div class="col-lg-3">
                    <!-- small card -->
                @foreach($totalmesactual as $tmactual)
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h2>${{number_format($tmactual->totalmesactual)}}</h2>
                            <p>Venta total mes actual</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                 
                    </div>
                </div>
                @endforeach
                <div class="col-lg-3">
                    <!-- small card -->
                    @foreach($totalDiaAnt as $diaAnt)
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h2>${{number_format($diaAnt->totalAnt)}}</h2>
                            <p>Venta total Dia Anterior</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                 
                    </div>
                </div>
                    @endforeach
                <div class="col-lg-3">
                    @foreach($totaldia2 as $t_dia2)
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h2>${{number_format($t_dia2->totaldia)}}</h2>
                            <p>Venta total dia</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                    
                    </div>
                </div>
                @endforeach
        
        </div>
    
    
    <!-- Total ventas diarias -->
        <div class="row">
            <div class="col-lg-3">
                    <!-- small card -->
                @foreach($t_credito as $credito)
                <div class="small-box bg-info">
                    <div class="inner">
                        <h2 id="t_credito">${{number_format($credito->totalcredito)}}</h2>
                            <p>TOTAL VENTAS CREDITO</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                 
                    </div>
                </div>
                @endforeach
                <div class="col-lg-3">
                    <!-- small card -->
                @foreach($t_debito as $debito)
                <div class="small-box bg-info">
                    <div class="inner">
                        <h2 id="t_debito">${{number_format($debito->totaldebito)}}</h2>
                            <p>TOTAL VENTAS DEBITO</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                 
                    </div>
                </div>
                @endforeach
                <div class="col-lg-3">
                    <!-- small card -->
                @foreach($t_transferencia as $transferencia)
                <div class="small-box bg-info">
                    <div class="inner">
                        <h2 id="t_transfe">${{number_format($transferencia->totaltransferencia)}}</h2>
                            <p>TOTAL VENTAS TRANSFERENCIA</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                 
                    </div>
                </div>
                @endforeach
                <div class="col-lg-3">
                @foreach($t_efectivo as $efectivo)
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h2 id="t_efectivo">${{number_format($efectivo->totalefectivo)}}</h2>
                            <p>TOTAL VENTAS EFECTIVO</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                     
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="row">
                
            @foreach($t_repartos_d as $t_rep_d )
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>
                        <div class="info-box-content">
                                
                            <span class="info-box-text">Total repartos diario</span>
                            <span class="info-box-number"> ${{number_format($t_rep_d->total_repartos)}}</span>      
                                 
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fa fa-bicycle"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Cantidad repartos diario</span>
                            <span class="info-box-number">{{$t_rep_d->cantidad}}</span>             
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            @endforeach 
            @foreach ($t_repartos_m as $t_rep_m )
                
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="fa fa-bicycle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Cantidad reparto mensual</span>
                        <span class="info-box-number">{{ $t_rep_m->cantidad }}</span>             
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total reparto mensual</span>
                        <span class="info-box-number"> ${{number_format($t_rep_m->total_repartos) }} </span>             
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        @endforeach
        
        <div class="row">    
                <div class="col-lg-6">
                @foreach($totaldia2 as $t_dia2)

                    <div class="small-box bg-secondary text-center">
                        <div class="inner">
                            <p><h5>META DIARIA</h5></p>
                            <h2>${{number_format($t_dia2->totaldia)}} / $180.000</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                    
                    </div>
                @endforeach
                </div>
                <div class="col-lg-6">
                    <div class="small-box bg-secondary text-center">
                        <div class="inner">
                            <p><h5>META MENSUAL</h5></p>
                            <h2>${{number_format($tmactual->totalmesactual)}} / $5,000,000</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                    
                    </div>
                </div>
        </div>
    

        <!--  grafica ventas diarias y mensuales -->
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <i class="fas fa-chart-line"></i>
                            Ventas - Meses
                        </h4>
                        <canvas id="ventas"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <i class="fas fa-chart-line"></i>
                            Ventas - Dia
                        </h4>
                        <canvas id="ventas2"></canvas>
                    </div>
                </div>
            </div>
        </div>
     
    @else

    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
                    @foreach($totaldia2 as $t_dia2)
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h1>${{number_format($t_dia2->totaldia)}}</h2>
                                <h4>Venta total dia</h4>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                          
                        </div>
                    </div>
                    @endforeach
        </div>
        <div class="col-lg-3"></div>

    <div class="row">
            
            <div class="col-lg-3">
                    <!-- small card -->
                @foreach($t_credito as $credito)
                <div class="small-box bg-info">
                    <div class="inner">
                        <h2 id="t_credito">${{number_format($credito->totalcredito)}}</h2>
                            <p>TOTAL VENTAS CREDITO</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                 
                    </div>
                </div>
                @endforeach
                <div class="col-lg-3">
                    <!-- small card -->
                @foreach($t_debito as $debito)
                <div class="small-box bg-info">
                    <div class="inner">
                        <h2 id="t_debito">${{number_format($debito->totaldebito)}}</h2>
                            <p>TOTAL VENTAS DEBITO</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                 
                    </div>
                </div>
                @endforeach
                <div class="col-lg-3">
                    <!-- small card -->
                @foreach($t_transferencia as $transferencia)
                <div class="small-box bg-info">
                    <div class="inner">
                        <h2 id="t_transfe">${{number_format($transferencia->totaltransferencia)}}</h2>
                            <p>TOTAL VENTAS TRANSFERENCIA</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                 
                    </div>
                </div>
                @endforeach
                <div class="col-lg-3">
                @foreach($t_efectivo as $efectivo)
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h2 id="t_efectivo">${{number_format($efectivo->totalefectivo)}}</h2>
                            <p>TOTAL VENTAS EFECTIVO</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                     
                    </div>
                </div>
                @endforeach               
        </div>
    @endrole
    
    <!-- Prooductos vendidos de hoy  -->
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-box"></i>
                        Productos  vendidos de hoy 
                    </h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th>Nombre</th>                                  
                                    <th>Cantidad vendida</th>
                                    <th>Ver detalles</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos_vendidos_dia as $productosvendidohoy)
                                <tr>
                                    <td>{{$productosvendidohoy->id}}</td>
                                    <td>{{$productosvendidohoy->name}}</td>
                                    
                                    <td><strong>{{$productosvendidohoy->quantity}}</strong> Unidades</td>
                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{route('products.show', $productosvendidohoy->id)}}">
                                            <i class="far fa-eye"></i>
                                            Ver detalles
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Productos mas vendidos del mes  -->
  
    
</div>
@endsection
@section('script')
<script>

    

$(function () {
    $('#periodo').change(function(){
            var periodo = $('#periodo').val();
            $.ajax({
                url: "{{route('periodo')}}",
                method: 'GET',
                data:{
                    codPeriodo: periodo,
                },
                success: function(data){
                 
                    credito = data["t_credito"];
                    debito = data["t_debito"];
                    transf = data["t_transferencia"];
                    efectivo = data["t_efectivo"];

                    // console.log(data);
            
                    $("#t_efectivo").text(efectivo);
                    $("#t_transfe").text(transf);
                    $("#t_debito").text(debito);
                    $("#t_credito").text(credito);
                   


            }
        });
    });
});

</script>
<script>


    $(function () {

        Chart.defaults.global.defaultFontSize = 12;    


        var varVenta=document.getElementById('ventas2').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($ventasdia as $ventadia)
                {                     
                    echo '"'. $ventadia->dia.'",';} ?>],
                    datasets: [{
                        label: 'Total ventas Diarias',
                        data: [<?php foreach ($ventasdia as $reg)
                        {echo ''. $reg->totalpordia.','; } ?>],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: 'rgba(0, 0, 0, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    tooltips: {
           callbacks: {
               label: function(tooltipItem, data) {
                  var value = data.datasets[0].data[tooltipItem.index];
                  value = value.toString();
                  value = value.split(/(?=(?:...)*$)/);
                  value = value.join('.');
                  return value;
               }
           } // end callbacks:
         }, //end tooltips
                    scales: {
                        yAxes: [{
                            
                            ticks: {
                                beginAtZero:true,
                                userCallback: function(value, index, values) {
                                // Convert the number to a string and splite the string every 3 charaters from the end
                                value = value.toString();
                                value = value.split(/(?=(?:...)*$)/);
                                value = value.join('.');
                                return value;
                  }
                            }
                        }]
                    }
                }
            });

            var varVenta=document.getElementById('ventas').getContext('2d');
            
            var charVenta = new Chart(varVenta, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($ventasmes as $reg)
                { 
                    
                    echo '"'. $reg->mes.'",';} ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasmes as $reg)
                        {echo ''. $reg->totalmes.',';} ?>],
                        backgroundColor:  ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de',
                                             '#70EA25', '#BEEA25', '#25EAD8', '#C925EA', '#E7EA25'],
                        borderColor: 'rgba(0, 0, 0, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var value = data.datasets[0].data[tooltipItem.index];
                            value = value.toString();
                            value = value.split(/(?=(?:...)*$)/);
                            value = value.join('.');
                            return value;
                        }
                    } // end callbacks:
                    }, //end tooltips
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                userCallback: function(value, index, values) {
                                    // Convert the number to a string and splite the string every 3 charaters from the end
                                    value = value.toString();
                                    value = value.split(/(?=(?:...)*$)/);
                                    value = value.join('.');
                                    return value;
                                }
                            }
                        }]
                    }
                }
            });
           
    });
</script>
@endsection