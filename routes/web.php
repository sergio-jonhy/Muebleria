<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Product;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('products', function () {
	$products = Product::orderBy('created_at', 'desc')->get();
    return view('products.index', compact('products'));
})->name('products.index');

Route::get('products/create', function () {
    return view('products.create');
})->name('products.create');

Route::post('products', function (Request $request) {
    $newProduct = new Product;
    $newProduct-> code = $request -> input('code');
    $newProduct-> name = $request -> input('name');
    $newProduct-> cost = $request -> input('cost');
    $newProduct-> stock = $request -> input('stock');
    $newProduct-> category_id = $request -> input('category');
    $newProduct->save();
    return redirect()->route('products.index')->with('info','Producto creado exitosamente');
})->name('products.store');

Route::delete('products/{id}', function ($id) {
    $product = Product:: findOrFail($id);
    $product->delete();
    return redirect()->route('products.index')->with('info','Producto eliminado exitosamente');
})->name('products.delete');

Route::get('products/{id}/edit', function ($id) {
	$product = Product:: findOrFail($id);
    return view('products.edit', compact('product'));
})->name('products.edit');

Route::put('products/{id}', function (Request $request, $id) {
	$product = Product:: findOrFail($id);
    $product-> code = $request -> input('code');
    $product-> name = $request -> input('name');
    $product-> cost = $request -> input('cost');
    $product-> stock = $request -> input('stock');
    $product-> category_id = $request -> input('category');
    $product->save();
    return redirect()->route('products.index')->with('info','Producto editado exitosamente');
})->name('products.update');