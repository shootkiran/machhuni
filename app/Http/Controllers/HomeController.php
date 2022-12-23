<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $user = request()->user();
        return view('home',compact('user'));
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        return view('search', compact('works'));
    }
    
}
