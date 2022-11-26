<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku as Buku;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home', ['buku' => Buku::paginate(8)]);
    }
    public function show($id)
    {
        $buku = Buku::find($id);
        return view('single-product',compact('buku'));
    }
}
