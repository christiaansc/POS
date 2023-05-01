<?php

namespace App\Http\Controllers;

use App\Venta;
use App\Product;
use App\Cliente;
use Carbon\Carbon;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade as PDF;





class VentaController extends Controller
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
        $ventas = Venta::whereMonth('fecha_venta', '=', Carbon::now()->month)
                        ->WhereYear('fecha_venta' , '=' , Carbon::now()->year )
                        ->orderBy('id', 'desc')->get();   

        // $ventas =   Venta::whereDate('fecha_venta', Carbon::today())
        //                     ->orderBy('id', 'desc')->get();
        
        
         return view('admin.ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $productos = Product::where('estado', 'ACTIVO')->get();
        return view('admin.ventas.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cliente_id         = "1";
        $user_id            = Auth::user()->id;
        $total              = $request->total;
        $metodo_pago        = $request->metodo_pago;
        $fecha_venta        = Carbon::now('America/Santiago');
        $descuento          = $request->discount;
        
        
        
        try {

    
        if($metodo_pago === "DEBITO"){
                $desc_debito = ((($total * 1.15)/100)+ 30)*1.19;
                $total = $total - $desc_debito;
        }
        if($metodo_pago === "CREDITO"){
            $desc_credito = ((($total * 1.98)/100)+ 40)*1.19;
            $total = $total - $desc_credito;
            
        }  
        $sale = Venta::create([
            'fecha_venta'   =>  $fecha_venta,
            'total'         =>  $total,    
            'cliente_id'    =>  $cliente_id,
            'user_id'       =>  $user_id,
            'metodo_pago'   =>  $metodo_pago
            
        ]);

        foreach ($request->product_id as $key => $product) {
            $results[] = array("product_id"=>$request->product_id[$key],"metodo_pago"=>$request->metodo_pago, "cantidad"=>$request->quantity[$key], "precio"=>$request->price[$key], "descuento"=>$request->discount[$key], 'fecha_venta'=>Carbon::now('America/Santiago'));
            
        }

        
            $sale->ventaDetalle()->createMany($results);
            return redirect()->route('ventas.create')->with('toast_success', 'Venta registrada Exitosamente!');
           
        } catch (\Throwable $th) {
            return redirect()->route('ventas.create')->with('toast_error', 'Venta no registrada!');

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        
        $subtotal = 0 ;
        $VentaDetalles = $venta->VentaDetalle;
        
        foreach ($VentaDetalles as $ventaDetalle) {
            $subtotal += $ventaDetalle->cantidad*$ventaDetalle->precio-$ventaDetalle->cantidad* $ventaDetalle->precio*$ventaDetalle->descuento/100;
        }
        return view('admin.ventas.show', compact('venta', 'VentaDetalles', 'subtotal'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
    public function pdf(Venta $venta)
    {
        $subtotal = 0 ;
        $ventaDetalles = $venta->ventaDetalle;
        foreach ($ventaDetalles as $ventaDetalle) {
            $subtotal += $ventaDetalle->cantidad*$ventaDetalle->precio-$ventaDetalle->cantidad* $ventaDetalle->precio*$ventaDetalle->discount/100;
        }
        $pdf = PDF::loadView('admin.ventas.pdf', compact('venta', 'subtotal', 'ventaDetalles'));
        return $pdf->download('Reporte_de_venta'.$venta->id.'.pdf');
    }

    public function print(Venta $sale){
        try {
            $subtotal = 0 ;
            $saleDetails = $sale->venta;
            foreach ($saleDetails as $saleDetail) {
                $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
            }  

            $printer_name = "TM20";
            $connector = new WindowsPrintConnector($printer_name);
            $printer = new Printer($connector);

            $printer->text("€ 9,95\n");

            $printer->cut();
            $printer->close();


            return redirect()->back();

        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function change_status(Venta $venta)
    {
        if ($venta->stado === 'VALIDO') {

            $ventaUP = Venta::find($venta->id)->update(['stado'=>'CANCELADO']);
            return redirect()->back();
        } else {
            $venta->update(['stado'=>'VALIDO']);
            return redirect()->back();
        } 
    }
}
