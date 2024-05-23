<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\KategoriHukum;
use App\Models\Pengacara;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $kategori = KategoriHukum::get();
        $pengacara = Pengacara::orderBy("id", "desc")->get();

        return view("pages.home", [
            'kategori' => $kategori,
            "pengacara" => $pengacara

        ]);
    }
}
