<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    
    public function index()
    {
        $works = Work::with('Users')->get();
        return view('work.index', \compact('works'));
    }
    public function edit(Work $work)
    {

        return view('work.edit', \compact('work'));
    }

}
