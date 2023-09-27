<?php

use App\Http\Controllers\BukuController;
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

Route::resource("buku", BukuController::class)->name("index", "buku")->name("create", "buku.create")->name("store", "buku.store")->name("edit", "buku.edit")->name("update", "buku.update")->name("destroy", "buku.destroy");

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/siswa', function () {
//     return view("index");
// });
