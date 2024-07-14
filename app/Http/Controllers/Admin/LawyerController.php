<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriHukum;
use App\Models\Kota;
use App\Models\Pengacara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LawyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Pengacara::orderBy("id", "desc")->paginate(12);

        return view("pages.admin.lawyer.index", [
            "items" => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = KategoriHukum::orderby("nama", "asc")->get();
        $kota = Kota::orderBy("nama", "asc")->get();

        return view("pages.admin.lawyer.create", [
            'kategori' => $kategori,
            "kota" => $kota
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'string|required',
            'nomor_telepon' => 'string|required',
            'pendidikan_terakhir' => 'string|required',
            'kategori_hukum_id' => 'string|required',
            'kantor' => 'string|required',
            'kota' => 'string|required',
            'tentang' => 'string|required',
            'email' => 'string|required|email|unique:pengacara,email',

        ]);

        DB::beginTransaction();

        try {

            $formData = [
                "nama_lengkap" => $request->nama,
                "nomor_telepon" => $request->nomor_telepon,
                "email" => $request->email,
                "nama_instansi" => $request->kantor,
                "sertifikat_advokat" => $request->sertifikat_advokat,
                "pendidikan_terakhir" => $request->pendidikan_terakhir,
                "kategori_hukum_id" => $request->kategori_hukum_id,
                "tentang" => $request->tentang,
                "kota_id" => $request->kota,
            ];

            $formData["sertifikat_advokat"] = $request->sertifikat_advokat->store("sertifikat_advokat", "public");
            $formData["foto"] = $request->foto_profile->store("foto_profile", "public");

            $insertData = Pengacara::create($formData);

            DB::commit();

            return redirect()->back()->with("success", "Berhasil tambah pengacara");
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with("error", "Gagal Tambah data");
        }
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
        $kategori = KategoriHukum::orderby("nama", "asc")->get();
        $kota = Kota::orderBy("nama", "asc")->get();

        $pengacara = Pengacara::findOrFail($id);

        return view("pages.admin.lawyer.edit", [
            'kota' => $kota,
            "kategori" => $kategori,
            "pengacara" => $pengacara
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'string|required',
            'nomor_telepon' => 'string|required',
            'pendidikan_terakhir' => 'string|required',
            'kategori_hukum_id' => 'string|required',
            'kantor' => 'string|required',
            'kota' => 'string|required',
            'tentang' => 'string|required',
            'email' => 'string|required|email',

        ]);

        DB::beginTransaction();

        try {

            $formData = [
                "nama_lengkap" => $request->nama,
                "nomor_telepon" => $request->nomor_telepon,
                "email" => $request->email,
                "nama_instansi" => $request->kantor,
                "pendidikan_terakhir" => $request->pendidikan_terakhir,
                "kategori_hukum_id" => $request->kategori_hukum_id,
                "tentang" => $request->tentang,
                "kota_id" => $request->kota,
            ];

            if ($request->sertifikat_advokat) {
                $formData["sertifikat_advokat"] = $request->sertifikat_advokat->store("sertifikat_advokat", "public");
            }

            if ($request->foto_profile) {
                $formData["foto"] = $request->foto_profile->store("foto_profile", "public");
            }


            $insertData = Pengacara::where("id", $id)->update($formData);

            DB::commit();

            return redirect()->back()->with("success", "Berhasil update pengacara");
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with("error", "Gagal Tambah data");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pengacara::findOrFail($id);

        $data->delete();

        return redirect()->back()
            ->with("success", "Berhasil hapus data");
    }
}
