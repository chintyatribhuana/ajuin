<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\JenisDokumen;
use App\Models\Dokumen;
use App\Models\Mitra;
use App\Models\JenisInstansiMitra;
use App\Models\ProgresDokumen;
use App\Models\Kerjasama;
use Auth;
use Illuminate\Http\Request;

class PengelolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $kerjasama = Kerjasama::all();
        return view('pengelola.dashboard', compact(['user','kerjasama']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        $kerjasama = Kerjasama::find($id);
        $dokumen1 = DB::table('dokumen')->where('kerjasama_id', '=', $id)
                                        ->where('jenis_dokumen_id', '=', 1)                                
                                        ->first();
        $dokumen2 = DB::table('dokumen')->where('kerjasama_id', '=', $id)
                                        ->where('jenis_dokumen_id', '=', 2)                                
                                        ->first();
        return view('pengelola.show', compact(['kerjasama','dokumen1','dokumen2']));
    }
    public function showusulan($id)
    {
        $kerjasama = Kerjasama::find($id);
        return view('pengelola.showusulan', compact('kerjasama'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    public function datausulanreview()
    {
        $kerjasama = Kerjasama::where('status', '=', 1)
                                ->get();
        $mitra = Mitra::all();
        
        return view('pengelola.datausulanreview', compact(['mitra','kerjasama']));
    }
    public function acc_usulan($id)
    {
        $kerjasama = Kerjasama::find($id);
        return view('pengelola.acc_usulan', compact('kerjasama'));
    }
    public function storeaccusulan(Request $request)
    {
        
        $this->validate($request, [
            'id' => 'required'
        ]);

        $kerjasama = Kerjasama::find($request->id);
        $kerjasama->status = 2;
        $kerjasama->save(); 
        return redirect('pengelola')->with('status','Usulan berhasil ditambahkan');
    }
    public function storerevisiusulan(Request $request)
    {
        
        $this->validate($request, [
            'id' => 'required'
        ]);

        $kerjasama = Kerjasama::find($request->id);
        $kerjasama->status = 3;
        $kerjasama->save(); 
        return redirect('pengelola')->with('status','Usulan berhasil ditambahkan');
    }
    public function datakerjasama()
    {
        $kerjasama = Kerjasama::where('status','!=', 1)
                                ->get();
        $mitra = Mitra::all();
        
        return view('pengelola.datakerjasama', compact(['mitra','kerjasama']));
    }
    public function datadokumenreview()
    {
        $progres_dokumen = ProgresDokumen::where('status_progres','=', 1)
                                ->get();
        
        return view('pengelola.datadokumenreview', compact('progres_dokumen'));
    }
    public function accdokumen($id)
    {
        $progres_dokumen = ProgresDokumen::find($id);
        return view('pengelola.accdokumen', compact('progres_dokumen'));
    }
    public function updatestatusdok($id)
    {
        

        $progres_dokumen = ProgresDokumen::find($id);
        dd($progres_dokumen);
        $progres_dokumen->status_progres = '2';
        $progres_dokumen->update();
        // $progres_dokumen = ProgresDokumen::where($progres_dokumen->dokumen->id, '=', '$request->dokumen_id')->first();
        return redirect('pengelola.dashboard')->with('status','Usulan berhasil ditambahkan');
    }
}
