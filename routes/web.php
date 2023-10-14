<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CountryController;
use App\Livewire\BrandCreate;
use App\Livewire\BrandTable;
use App\Livewire\CountryTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('brand-table',BrandTable::class)->name('brand.table');
route::resource('brand',BrandController::class);

route::resource('country',CountryController::class);

