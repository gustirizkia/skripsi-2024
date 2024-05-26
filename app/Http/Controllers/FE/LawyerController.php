<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\KategoriHukum;
use App\Models\Pengacara;
use Illuminate\Http\Request;

class LawyerController extends Controller
{
    public function index(Request $request)
    {
        $kategori = KategoriHukum::get();

        $kategoriHukum = $request->kategori;
        $tipe = $request->tipe;

        $pengacara = Pengacara::query();

        if ($kategoriHukum) {
            $pengacara = $pengacara->where("kategori_hukum_id", $kategoriHukum);
        }

        if ($tipe === "populer") {
        } else if ($tipe === "terbaru") {
            $pengacara = $pengacara->orderBy("id", "desc");
        } else {
            $pengacara = $pengacara->inRandomOrder();
        }

        return view("pages.lawyer.index", [
            'kategori' => $kategori,
            'pengacara' => $pengacara->get()
        ]);
    }
}
