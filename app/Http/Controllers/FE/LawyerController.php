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
        $pengacara = Pengacara::orderBy("id", "desc")->get();

        return view("pages.lawyer.index", [
            'kategori' => $kategori,
            'pengacara' => $pengacara
        ]);
    }
}
