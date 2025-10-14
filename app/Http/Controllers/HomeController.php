<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempatKuliner;
use App\Models\TempatWisata;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $role = auth()->user()->role;

            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'superadmin') {
                return redirect()->route('superadmin.dashboard_user');
            }
        }
        
        $wisata = TempatWisata::all();
        $kuliner = TempatKuliner::all();

        return view('welcome', compact('wisata', 'kuliner'));
    }
}
