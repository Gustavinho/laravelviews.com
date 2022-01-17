<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocsController extends Controller
{
    public function index()
    {
        return view('docs');
    }

    public function show($path)
    {
        return response()->file(base_path('docs/'.$path));
    }
}
