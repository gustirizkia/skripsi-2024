<?php

namespace App\Http\Controllers;

use App\Models\Pengacara;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class ProsesHiringController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'id' => "required"
        ]);

        $lawyer = Pengacara::find($request->id);
        if (!$lawyer) {
            return redirect()->back()
                ->with("error", "Pengacara Tidak ditemukan");
        }

        return view("pages.hiring.proses", [
            'pengacara' => $lawyer
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "pengacara" => "required|exists:pengacara,id",
            "laporan" => "required",
            "total_anggaran" => "required"
        ]);

        $pengacara = Pengacara::findOrFail($request->pengacara);

        $total_anggaran =  str_replace(".", "", $request->total_anggaran);

        if ($total_anggaran < $pengacara->harga_termurah) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    "Total Anggaran" => "Transaksi Minimal Rp. " . number_format($pengacara->harga_termurah)
                ]);
        }

        $formTransaksi = [
            "pengacara_id" => $request->pengacara,
            "user_id" => auth()->user()->id,
            "permasalahan" => $request->laporan,
            "nominal" => $total_anggaran
        ];

        $transaksi = Transaksi::create($formTransaksi);

        return redirect()->route("transaksi.show", $transaksi->id)->with("success", "berhasil melakukan transaksi, silahkan lanjutkan pembayaran");
    }
}
