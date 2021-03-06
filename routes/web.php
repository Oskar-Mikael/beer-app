<?php

use App\Http\Controllers\BeerController;
use App\Http\Controllers\BeerListController;
use App\Http\Controllers\UserController;
use App\Models\BeerList;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/profile', [UserController::class, 'index']);

//List Routes
Route::get('/create-list', [BeerListController::class, 'create'])->name('list.create');
Route::get('/list/{list}', [BeerListController::class, 'show'])->name('list.show');
Route::post('/create-list', [BeerListController::class, 'store'])->name('list.store');
Route::post('/add-item/{list}', [BeerListController::class, 'addItem'])->name('list.additem');
Route::delete('/remove-item/{list}', [BeerListController::class, 'removeItem'])->name('list.removeitem');

//Beer Routes
Route::get('/create-beer', [BeerController::class, 'create'])->name('beer.create');
Route::get('/beer/{beer}', [BeerController::class, 'show'])->name('beer.show');
Route::get('/beer/{beer}/edit', [BeerController::class, 'edit'])->name('beer.edit');
Route::post('/create-beer', [BeerController::class, 'store'])->name('beer.store');
Route::patch('/beer/{beer}', [BeerController::class, 'update'])->name('beer.update');
Route::delete('/beer/{beer}', [BeerController::class, 'destroy'])->name('beer.destroy');
