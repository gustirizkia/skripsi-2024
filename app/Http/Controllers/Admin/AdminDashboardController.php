<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengacara;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $transaksi = Transaksi::get()->groupBy("status_pembayaran");
        $transaksi_terakhir = Transaksi::orderBy('id', "desc")->limit(10)->get();
        $pengacara = Pengacara::get();

        return view("pages.admin.dashboard", compact("transaksi", "pengacara", "transaksi_terakhir"));
    }
}
