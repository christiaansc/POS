<?php

namespace App\Http\Controllers;

use App\Venta;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

              $ventasmes=DB::select('SELECT monthname(v.fecha_venta) as mes, sum(v.total) as totalmes from ventas v where v.stado="VALIDO" AND YEAR(fecha_venta) = YEAR(now())  group by monthname(v.fecha_venta) desc');
      
              $ventasdia=DB::select('SELECT DATE(fecha_venta) as dia ,SUM(total) as totalpordia from ventas WHERE stado="VALIDO"  group by DATE(fecha_venta)  desc limit 7');
              $dayOfTheWeek = Carbon::now()->daysInMonth;
              $prom = Venta::
                selectRaw('sum(total) as total')
                    ->where('stado', '=' , 'VALIDO')
                    ->WhereYear('fecha_venta' , '=' , Carbon::now()->year )
                    ->whereMonth('fecha_venta', '=', Carbon::now()->month)
                    ->orderBy('id', 'desc')
                    ->get();

                  
              
              $totales=DB::select('SELECT sum(v.total) as totalventa from ventas v where DATE(v.fecha_venta)=curdate() and v.stado="VALIDO"');
              
            //   $productosvendidos=DB::select('SELECT p.codigo as code, 
            //   sum(dv.cantidad) as quantity, p.nombre as name , p.id as id , p.stock as stock from products p 
            //   inner join venta_detalles dv on p.id=dv.product_id 
            //   inner join ventas v on dv.venta_id=v.id where v.stado="VALIDO" 
            //   and month(v.fecha_venta)=month(curdate()) 
            //   and year(v.fecha_venta)=year(curdate()) 
            //   group by p.codigo ,p.nombre, p.id , p.stock order by sum(dv.cantidad) desc limit 10');

              $productos_vendidos_dia=DB::select('SELECT  
              sum(dv.cantidad) as quantity, p.nombre as name , p.id as id , p.stock as stock from products p 
              inner join venta_detalles dv on p.id=dv.product_id 
              inner join ventas v on dv.venta_id=v.id where v.stado="VALIDO" 
              and date(v.fecha_venta) = curdate()
              group by p.nombre, p.id , p.stock order by sum(dv.cantidad) desc limit 10');
             
            //  $sales = Venta::WhereDate('fecha_venta', Carbon::today('America/Santiago'))->get();
            //  $totaldia = $sales->sum('total');

             $totaldia2 = DB::select('SELECT sum(total) as totaldia FROM ventas where date(fecha_venta) = curdate() and stado = "VALIDO"');
                         
             $totalm= DB::select('SELECT sum(v.total) as totalmes from ventas v where v.stado="VALIDO" AND YEAR(v.fecha_venta) = YEAR(now())  ');

             $totalDiaAnt= DB::select('SELECT sum(total) as totalAnt from ventas  where DATE(fecha_venta) =  DATE_SUB(curdate(),INTERVAL 1 DAY) AND stado="VALIDO"');

             $totalmesactual = DB::select('SELECT sum(v.total) as totalmesactual from ventas v where v.stado="VALIDO" and month(v.fecha_venta) = month(now()) AND YEAR(fecha_venta) = YEAR(now()) ');

            $t_efectivo      = DB::select('SELECT sum(total) as totalefectivo FROM ventas WHERE metodo_pago = "EFECTIVO" AND stado = "VALIDO" AND DATE(fecha_venta)  = CURDATE()');
            $t_transferencia = DB::select('SELECT sum(total) as totaltransferencia FROM ventas WHERE metodo_pago = "TRANSFERENCIA" AND stado = "VALIDO" AND DATE(fecha_venta)  = CURDATE()');
            $t_debito        = DB::select('SELECT sum(total) as totaldebito FROM ventas WHERE metodo_pago = "DEBITO" AND stado = "VALIDO" AND DATE(fecha_venta)  = CURDATE()');
            $t_credito       = DB::select('SELECT sum(total) as totalcredito FROM ventas WHERE metodo_pago = "CREDITO" AND stado = "VALIDO" AND DATE(fecha_venta)  = CURDATE()');


            $t_repartos_d    = DB::select('SELECT sum(p.precio) as total_repartos, count(vd.id) cantidad FROM ventas v
            inner join venta_detalles vd on v.id = vd.venta_id
            inner join products p  on p.id =  vd.product_id
            where p.categoria_id = 25  
            AND  v.stado = "VALIDO"
            AND   date(v.fecha_venta) = date(now())');

            $t_repartos_m    = DB::select('SELECT sum(p.precio) as total_repartos , count(vd.id) cantidad FROM ventas v
            inner join venta_detalles vd on v.id = vd.venta_id
            inner join products p  on p.id =  vd.product_id
            where p.categoria_id = 25  
            AND  v.stado = "VALIDO" 
            AND   year(v.fecha_venta) =  YEAR (NOW())
            AND   month(v.fecha_venta) =  MONTH (NOW())');
            
            
            // dd($t_repartos_d);

            // dd($t_transferencia);
              return view('home', compact(  'ventasmes',
                'ventasdia',
                'totales',
                'productos_vendidos_dia',
                'totalm',
                'totalmesactual',
                'totalDiaAnt',
                'totaldia2',
                't_efectivo',
                't_transferencia',
                't_debito',
                't_repartos_d',
                't_repartos_m',
                't_credito',
                'prom',
                'dayOfTheWeek'

            ));
    }

    public function periodo( Request $request){

        // print_r($request->codPeriodo);

        switch ($request->codPeriodo) {
            case '1':
                //print_r('1');
                $sq = " AND DATE(fecha_venta)  = CURDATE()";
                break;
             case '2':
                //print_r('2');
                $sq = " AND DATE(fecha_venta)  = DATE_SUB(CURDATE(),INTERVAL 1 DAY) ";
                break;
             case '3':
                //print_r('3');
                $sq = " AND month(fecha_venta) = month(now()) AND YEAR(fecha_venta) = YEAR(now())  ";
                break; 
            
            default:
                print_r("Seleccione periodo");
                break;
        }


        $data = array();
        $t_efectivo      = DB::select('SELECT IFNULL(sum(total),0) as totalefectivo FROM ventas WHERE metodo_pago = "EFECTIVO" AND stado = "VALIDO"  ' . $sq   );
        $t_transferencia = DB::select('SELECT IFNULL(sum(total),0) as totaltransferencia FROM ventas WHERE metodo_pago = "TRANSFERENCIA" AND stado = "VALIDO"  ' . $sq );
        $t_debito        = DB::select('SELECT IFNULL(sum(total),0) as totaldebito FROM ventas WHERE metodo_pago = "DEBITO" AND stado = "VALIDO"  ' . $sq);
        $t_credito       = DB::select('SELECT IFNULL(sum(total),0) as totalcredito FROM ventas WHERE metodo_pago = "CREDITO" AND stado = "VALIDO"  ' .  $sq);

        $data["t_credito"] = $t_credito[0]->totalcredito;
        $data["t_debito"] = $t_debito[0]->totaldebito;
        $data["t_transferencia"] = $t_transferencia[0]->totaltransferencia;
        $data["t_efectivo"] = $t_efectivo[0]->totalefectivo  ;
        


        return response()->json( $data);

    }

}
