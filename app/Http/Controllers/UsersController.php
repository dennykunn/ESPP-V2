<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('users', compact('user'));
    }
}
