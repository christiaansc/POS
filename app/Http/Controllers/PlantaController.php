<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Planta;
use Carbon\Carbon;


class PlantaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalCompra = Planta::where('accion' , '=', '0')
                            ->whereMonth('fecha', '=', Carbon::now()->month)
                            ->sum('montoTotal');

        $totalVenta = Planta::where('accion' , '=', '1')
                            ->whereMonth('fecha', '=', Carbon::now()->month)
                            ->sum('montoTotal');      

        $compras = Planta::where('accion' , '=', '0')
                            ->whereMonth('fecha', '=', Carbon::now()->month)
                            ->get();

        $ventas = Planta::where('accion' , '=', '1')
                            ->whereMonth('fecha', '=', Carbon::now()->month)
                            ->get();

                                      
        
        return view('admin.plantas.index', compact('totalCompra','totalVenta','compras','ventas'));

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
        $fecha = Carbon::now('America/Santiago');
        $gasto = Planta::create($request->all() + [
            'montoTotal' => $montoTotal,
            'fecha' => $fecha
            
            ]);
        return redirect()->route('plantas.index')->with('toast_success', 'Creado Exitosamente!'); 
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
    public function destroy(Planta $planta)
    {
         
        $planta->delete();
        return redirect()->route('plantas.index')->with('toast_success', 'Eliminado Exitosamente!');
    }
}
