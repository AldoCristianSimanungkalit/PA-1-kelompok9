<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $destinasi = [
            (object)[
                'slug'=>'Tele',
                'nama'=>'Tele',
                'gambar'=>'balige.jpg',
                'deskripsi'=>'Pusat wisata Danau Toba yang indah'
            ],
            (object)[
                'slug'=>'Efrata',
                'nama'=>'Efrata',
                'gambar'=>'Efrata.jpeg',
                'deskripsi'=>'Air terjun di desa sihotang'
            ],
            (object)[
                'slug'=>'Sihotang',
                'nama'=>'Sihotang',
                'gambar'=>'liang.jpg',
                'deskripsi'=>'Desa dengan keindahan sewahnya'
            ],
        ];

        return view('pages.home', compact('destinasi'));
    }

    public function detail($slug)
    {
        $data = (object)[
            'nama'=>ucwords(str_replace('-', ' ', $slug)),
            'gambar'=>'balige.jpg',
            'deskripsi'=>'Ini adalah detail destinasi wisata yang sangat menarik untuk dikunjungi.'
        ];

        return view('pages.detail', compact('data'));
    }
}