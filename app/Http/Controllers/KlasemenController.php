<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use Illuminate\Http\Request;

class KlasemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klubs = Klub::orderBy('points', 'desc')->get();

        return view('klasemen.index', compact('klubs'));
    }
}
