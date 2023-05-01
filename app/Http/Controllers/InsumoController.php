<?php

namespace App\Http\Controllers;

use App\Insumo;
use App\Categoria;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Gate;


class InsumoController extends Controller
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
     
        $insumosLocal = Insumo::where('tipo_insumo', 'LOCAL')->get();
        $insumosCocina = Insumo::where('tipo_insumo', 'COCINA')->get();
        return view('admin.insumo.index' , compact('insumosCocina', 'insumosLocal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.insumo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (Gate::allows('adm')) {
        //     dd('el usuario si es admin');
        // }else{
        //     dd('el usuario no es admin');

        // }
        $insrumo = Insumo::create($request->all());
        return redirect()->route('insumos.index')->with('toast_success', 'Creado Exitosamente!');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function show(Insumo $insumo)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function edit(Insumo $insumo)
    {
        $categorias = Categoria::get();
        $tiposInsumo = ['LOCAL' ,'COCINA'];
       
        return view('admin.insumo.edit', compact('insumo' , 'categorias','tiposInsumo'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insumo $insumo)
    {
        // dd($request->all());
        
        $id = $request->id;
        $insumo = Insumo::find($id)->update($request->all());
        if($insumo){
            return redirect()->route('insumos.index')->with('toast_success', 'Modificdo Exitosamente!');  
        }else{
            return redirect()->route('insumos.index')->with('toast_error', 'Ops Algo salio mal!');  
        }   
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insumo $insumo)
    {
        $insumo->delete();
        return redirect()->route('insumos.index')->with('toast_success', 'Eliminado Exitosamente!');
    }

    public function change_status( Insumo $insumo)
    {
        // dd($insumo);
        if ($insumo->estado == 'ACTIVO') {
            $insumo = Insumo::find($insumo->id)->update(['estado'=>'DESACTIVADO']);
            return redirect()->back();
        } else {
            $insumo->update(['estado'=>'ACTIVO']);
            return redirect()->back();
        } 
    }
}
