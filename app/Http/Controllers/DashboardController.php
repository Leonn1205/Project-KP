<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempatWisata;
use App\Models\TempatKuliner;

class DashboardController extends Controller
{
    public function index()
    {
        $wisata = TempatWisata::all();
        $kuliner = TempatKuliner::all();

        return view('dashboard_user', compact('wisata', 'kuliner'));
    }
}
