<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index()
    {
        return view('terms.index');
    }

    public function index_privacy()
    {
        return view('terms.privacy');
    }
}
