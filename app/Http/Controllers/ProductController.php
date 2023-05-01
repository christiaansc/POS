<?php

namespace App\Http\Controllers;

use App\Product;
use App\Categoria;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;


class ProductController extends Controller
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

        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::get();
        $proveedores = ['id'=> 1 , 'nombre'=>'waffles'];
        return view('admin.product.create', compact('categorias', 'proveedores'));
      
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        try {
            $product = Product::create($request->all());
            return redirect('products')->with('toast_success', 'Creado Exitosamente!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('products.index')->with('toast_error', 'Producto no registrado!');
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));    
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categorias = Categoria::get();
        // $provers = Prover::get();

        $proveedores = ['id'=> 1 , 'nombre'=>'waffles'];
        return view('admin.product.edit', compact('product', 'categorias', 'proveedores'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
        }else{
            $image_name = $product->image;
        }
        $product->update($request->all()+[
            'image'=>$image_name,
        ]);
        if ($request->codigo == "") {
            $numero = $product->id;
            $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
            $product->update(['codigo'=>$numeroConCeros]);
        }
        return redirect()->route('products.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {        
        try {
            $product->delete();
            return redirect()->route('products.index')->with('toast_success', 'Eliminado Exitosamente!');
        } catch (\Throwable $th) {
            return redirect()->route('products.index')->with('toast_error', 'No se pso eliminar!');
        }
    }
    public function change_status( Product $product)
    {
        
        
        if ($product->stado == 'ACTIVO') {
            $product = Product::find($product->id)->update(['stado'=>'DESACTIVADO']);
            return redirect()->back();
        } else {
            $product->update(['stado'=>'ACTIVO']);
            return redirect()->back();
        } 
    }

  
}



