<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempatWisata;

class DashboardController extends Controller
{
    public function index()
    {
        $wisata = TempatWisata::all();
        return view('dashboard_user', compact('wisata'));
    }
}
