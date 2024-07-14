<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminTransaksiController;
use App\Http\Controllers\Admin\KategoriHukumController;
use App\Http\Controllers\Admin\LawyerController;
use Illuminate\Support\Facades\Route;

Route::middleware("auth", "admin")
    ->group(function () {
        Route::get("/", [AdminDashboardController::class, "index"]);

        Route::resource("kategori", KategoriHukumController::class);
        Route::resource("lawyer", LawyerController::class);
        Route::resource("transaksi", AdminTransaksiController::class);
    });
