<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $role = Auth::user()->level;
            if($role == "pengusul"){
                return redirect()->to('pengusul');
            } 
            else if($role == "pengelola"){
                return redirect()->to('pengelola');
            }
            else if($role == "legal"){
                return redirect()->to('legal');
            }
            else if($role == "pimpinan"){
                return redirect()->to('pimpinan');
            }
             else {
                return redirect()->to('logout');
            }
    }
}
