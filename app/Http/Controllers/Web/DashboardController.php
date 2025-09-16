<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Client;

class DashboardController extends Controller
{
    public function index()
    {
        return view('panel', [
            'usuarios'  => User::count(),
            'productos' => Product::count(),
            'clientes'  => Client::count(),
        ]);
    }
}
