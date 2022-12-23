<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        // $works = Work::all();
         $works = Work::Where('alternative_titles', 'like',"%$keyword%")
         ->orWhere('title',"like","%$keyword%")->get();
        return view('search', compact('works'));
    }
    
}
