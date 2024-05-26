<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FE\ForumDiskusiController;
use App\Http\Controllers\FE\HomeController;
use App\Http\Controllers\FE\LawyerController;
use App\Http\Controllers\FE\TransaksiController;
use App\Http\Controllers\ProsesHiringController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\TransaksiController as UserTransaksiController;
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

Route::get('/', [HomeController::class, "index"])->name("home");
Route::get('/home', [HomeController::class, "index"])->name("home");
Route::get('forum-diskusi', [ForumDiskusiController::class, "index"])->name('forum-diskusi-front');
Route::get('lawyer', [LawyerController::class, 'index'])->name('lawyer-page');

Route::middleware("auth")->group(function () {
    Route::get("proses-hiring", [ProsesHiringController::class, "index"])->name("proses-hiring");
    Route::post("transaksi-store", [ProsesHiringController::class, "store"])->name("transaksi-store");

    Route::resource("transaksi", TransaksiController::class);

    Route::prefix("user")->name("user.")->group(function () {
        Route::resource("transaksi", UserTransaksiController::class);
        Route::resource("profile", ProfileController::class);
    });
});

Route::middleware("guest")->group(function () {
    Route::get("login", [AuthController::class, "login"])->name("login");
    Route::post("prosesLogin", [AuthController::class, "prosesLogin"])->name("prosesLogin");
    Route::get("register", [AuthController::class, "register"])->name("register");
    Route::post("prosesRegister", [AuthController::class, "prosesRegister"])->name("prosesRegister");
});
