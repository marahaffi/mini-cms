<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('a-propos', [
            'auteur' => 'Marah Affi',
            'groupe' => 'MDW32',
        ]);
    }
}