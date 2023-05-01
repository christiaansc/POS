<?php

namespace App\Http\Controllers;

use App\Gasto;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GastoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
            $gastosTotales = DB::select('SELECT  sum(montoTotal) as totalGastos FROM gastos where month(fechaGasto) = month(now()) AND YEAR(fechaGasto) = YEAR(now())');
            $totalmesactual = DB::select('SELECT sum(montoTotal) as totalmesactual from gastos  where tipo_gasto = 0 and  month(fechaGasto) = month(now()) AND YEAR(fechaGasto) = YEAR(now()) ');
            $totalmesCasa = DB::select('SELECT sum(montoTotal) as totalmesCasa from gastos  where tipo_gasto = 1 and   month(fechaGasto) = month(now()) AND YEAR(fechaGasto) = YEAR(now()) ');
            

        //    dd($totalmesCasa);

           
            $gastos = Gasto::whereMonth('fechaGasto', '=', Carbon::now()->month)
                        ->WhereYear('fechaGasto' , '=' , Carbon::now()->year )
                        ->where('tipo_gasto' , '=' , 0)
                        ->orderBy('id', 'desc')->get();

            $gastosCasa = Gasto::whereMonth('fechaGasto', '=', Carbon::now()->month)
                        ->WhereYear('fechaGasto' , '=' , Carbon::now()->year )
                        ->where('tipo_gasto' , '=' , 1)
                        ->orderBy('id', 'desc')->get();                       
                        

            return view('admin.gasto.index' , compact('gastos', 'gastosTotales','totalmesactual', 'totalmesCasa', 'gastosCasa'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $montoTotal = $request->monto * $request->cantidad;
        $fechaGasto = Carbon::now('America/Santiago');
        $gasto = Gasto::create($request->all() + [
            'montoTotal' => $montoTotal,
            'fechaGasto' => $fechaGasto
            
            ]);
        return redirect()->route('gastos.index')->with('toast_success', 'Creado Exitosamente!');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function editGasto($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gasto $gasto)
    {   
        $gasto->delete();
        return redirect()->route('gastos.index')->with('toast_success', 'Eliminado Exitosamente!');
    }
}
