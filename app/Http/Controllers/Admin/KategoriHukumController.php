<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriHukum;
use Illuminate\Http\Request;

class KategoriHukumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = KategoriHukum::get();

        return view("pages.admin.kategori.index", compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.admin.kategori.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = KategoriHukum::create([
            "nama" => $request->nama,
            "image" => $request->image->store("kategori", "public")
        ]);

        return redirect()->route("admin.kategori.index")
            ->with("success", "Berhasil Tambah Data Baru");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $item = KategoriHukum::findOrFail($id);

        return view("pages.admin.kategori.edit", compact("item"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $formData = [
            "nama" => $request->nama
        ];

        if ($request->image) {
            $formData["image"] = $request->image->store("kategori", "public");
        }

        $data = KategoriHukum::findOrFail($id);
        $data->update($formData);

        return redirect()->route("admin.kategori.index")
            ->with("success", "Berhasil Update Data");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = KategoriHukum::findOrFail($id);
        $data->delete();

        return redirect()->back()
            ->with("success", "Berhasil Hapus Data");
    }
}
