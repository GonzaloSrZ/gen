<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ClienteController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/menu', function () {
    return view('admin.menu4');
});

Route::get('/admin', [AdminController::class, 'index'])
->middleware('auth.admin')
->name('admin.index');

Route::get('/admin/clientes', [AdminController::class, 'clientes'])
->middleware('auth.admin')
->name('admin.clientes');

Route::get('/admin/ventas', [AdminController::class, 'ventas'])
->middleware('auth.admin')
->name('admin.ventas');

Route::get('/admin/ventas/crear', [AdminController::class, 'crearVenta'])
->middleware('auth.admin')
->name('admin.ventas.crear');

Route::get('/admin/articulos', [AdminController::class, 'articulos'])
->middleware('auth.admin')
->name('admin.articulos');

Route::get('/pdf/{id}', [PdfController::class, 'index'])->name('pdf');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect()->to('/admin');
})->name('dashboard');