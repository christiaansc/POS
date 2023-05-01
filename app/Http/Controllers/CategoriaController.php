<?php

namespace App\Http\Controllers;

use App\Categoria;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::get();

        return  view('admin.categorias.index' , compact('categorias'));
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
        // dd($request->all());
        Categoria::create($request->all());
        return redirect()->route('categorias.index')->with('toast_success', 'Creado Exitosamente!');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return view('admin.categorias.show', compact('categoria'));
        
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());

        $categoria = Categoria::find($id)->update($request->all());

        if($categoria){
            
            return redirect()->route('categorias.index')->with('toast_success', 'Editado Exitosamente!');
        }else{
            return redirect()->route('categorias.index')->with('toast_error', 'Editado Exitosamente!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        
        $categoria_id = $categoria->id;
        $wordlist = DB::table('products')->where('categoria_id', '=', $categoria_id)
            ->get();
        $wordCount = $wordlist->count();

        if($wordCount == 0){ 
            $categoria->delete();
            return redirect()->route('categorias.index')->with('toast_success', 'Eliminado Exitosamente!');
           
        }else{
          
            return redirect()->route('categorias.index')->with('toast_error', 'La categoria tiene productos Asociados!');
            
        }
      
            
        
    }
}
