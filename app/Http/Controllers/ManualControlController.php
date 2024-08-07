<?php

namespace App\Http\Controllers;

class ManualControlController extends Controller
{
    public function index()
    {
        // Ambil data aktuator dan kirim ke view manual-control
        return view('manual-control');
    }
}
