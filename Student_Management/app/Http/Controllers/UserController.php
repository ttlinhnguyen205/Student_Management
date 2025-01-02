<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = ['Nguyen Van A', 'Tran Thi B'];
        return view('User', compact('users'));
    }
}
