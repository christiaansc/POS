<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/', 'HomeController@index')->middleware('can:admin.home')->name('admin.home');

// Rutas ventas
Route::get('ventas/pdf/{venta}', 'VentaController@pdf')->name('ventas.pdf');
Route::get('ventas/print/{venta}', 'VentaController@print')->name('ventas.print');  
Route::get('ventas/reports_day', 'ReportController@reports_day')->name('reports.day');
Route::get('ventas/reports_date', 'ReportController@reports_date')->name('reports.date');
Route::post('ventas/report_results', 'ReportController@report_results')->name('report.results');

Route::resource('ventas', 'VentaController')->names('ventas');
Route::resource('products', 'ProductController')->names('products');
Route::resource('clientes', 'ClienteController')->names('clientes');
Route::resource('insumos', 'InsumoController')->names('insumos');
Route::resource('gastos', 'GastoController')->names('gastos');
Route::resource('categorias', 'CategoriaController')->names('categorias');
Route::resource('plantas', 'PlantaController')->names('plantas');



Route::resource('roles', 'RolesController')->middleware('can:admin.roles')->names('admin.roles');
Route::resource('users', 'UserController')->middleware('can:admin.users')->names('admin.users');



Route::patch('/editGasto', 'GastoController@editInsumo')->name('editGasto');




Route::get('get_products_by_barcode', 'ProductController@get_products_by_barcode')->name('get_products_by_barcode');
Route::get('get_products_by_id', 'ProductController@get_products_by_id')->name('get_products_by_id');

Route::get('periodo', 'HomeController@periodo')->name('periodo');





Route::get('change_status/ventas/{venta}', 'VentaController@change_status')->name('change.status.ventas');
Route::get('change_status/products/{product}', 'ProductController@change_status')->name('change.status.products');
Route::get('change_status/Insumos/{insumo}', 'InsumoController@change_status')->name('change.status.insumos');
