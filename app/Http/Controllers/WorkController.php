<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function listWorkers(Work $work)
    {
        return view('work.list-workers', compact('work'));
    }
}
