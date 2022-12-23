<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
// use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $lat = request()->user()->latitude;
        $lng = request()->user()->longitude;
        $users = User::with('Works')->distance($lat,$lng)->orderby('distance','asc')->get();
        return view('user.index', \compact('users'));
    }
    public function edit(User $user)
    {

        return view('user.edit', \compact('user'));
    }
}
