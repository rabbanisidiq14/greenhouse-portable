<?php
namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data sensor dan kirim ke view dashboard
        return view('dashboard');
    }
}
