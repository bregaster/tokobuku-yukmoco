<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;

class UserController extends Controller
{
    public function daftar_user(){
        return view('admin/daftar_user', ['users' => User::getUserData()]);
    }
}
