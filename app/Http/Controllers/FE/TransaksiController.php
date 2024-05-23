<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            "bukti_bayar" => "required"
        ]);


        $transaksi = Transaksi::find($request->transaksi_id);

        $image = $request->bukti_bayar->store("transaksi", "public");

        $transaksi->update([
            "bukti_bayar" => $image,
            "status_pembayaran" => "Pembayaran dalam proses"
        ]);

        return redirect()->route("user.transaksi.index")
            ->with("success", "Transaksi sedang dalam proses");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaksi = Transaksi::find($id);

        return view("pages.transaksi.detail", [
            "transaksi" => $transaksi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
