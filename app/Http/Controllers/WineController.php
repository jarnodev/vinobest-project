<?php

namespace App\Http\Controllers;

use App\Models\Wine;

class WineController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $wines = Wine::all();

        return view('wines', compact('wines'));
    }
}
