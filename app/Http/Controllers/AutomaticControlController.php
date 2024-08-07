<?php
namespace App\Http\Controllers;

class AutomaticControlController extends Controller
{
    public function index()
    {
        // Ambil data sensor dan parameter kontrol otomatis
        return view('automatic-control');
    }
}
