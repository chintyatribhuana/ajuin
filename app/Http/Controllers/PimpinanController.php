<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\JenisDokumen;
use App\Models\Dokumen;
use App\Models\ProgresDokumen;
use App\Models\Mitra;
use Illuminate\Support\Facades\DB;
use App\Models\Kerjasama;
use Illuminate\Http\Request;

class PimpinanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kerjasama = Kerjasama::all();
        return view('pimpinan.dashboard', compact(['user','kerjasama']));
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
