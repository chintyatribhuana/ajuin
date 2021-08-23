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

class PengusulController extends Controller
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
        return view('pengusul.dashboard', compact(['user','kerjasama']));
    }
    
    public function create()
    {
        return view('pengusul/create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            // 'filename' => 'required|mimetypes:application/pdf|max:5000'
        ]);
        
        // $mitra = Mitra::firstOrCreate(
        //     [
        //         'nama_mitra' => '$request->nama_mitra',
        //         'instansi_mitra' => '$request->instansi_mitra'
        //     ],
        //     [
        //         'jabatan' => '$request->jabatan',
        //         'jenis_instansi_mitra' => '$request->jenis_instansi_mitra',
        //     ]
        // );
            
        $mitra = new Mitra;
        $mitra->nama_mitra = $request->nama_mitra;
        $mitra->jabatan = $request->jabatan;
        $mitra->instansi_mitra = $request->instansi_mitra;
        $mitra->jenis_instansi_mitra = $request->jenis_instansi;
        //$mitra->id_users = '6';
        $mitra->save();

        $uploadedFile = $request->file('filename');   
        $path = $uploadedFile->store('public/files');
        
        $kerjasama = new Kerjasama;
        $kerjasama->perihal_kerjasama = $request->perihal_kerjasama;
        $kerjasama->unit_pelaksana = $request->unit_pelaksana;
        $kerjasama->deskripsi = $request->deskripsi;
        $kerjasama->rencana_implementasi = $request->rencana_implementasi;
        $kerjasama->lama_kerjasama = $request->lama_kerjasama;
        $kerjasama->status = '1';
        $kerjasama->users_id = $user->id;
        $kerjasama->mitra_id = $mitra->id;
        $kerjasama->filename = $request->file('filename')->getClientOriginalName();
        // return $kerjasama->filename;
        $kerjasama->filepath = $path;
       // Storage::put('local', $request->filename->getClientOriginalName());
        // return $request->filename->getClientOriginalName();
        $kerjasama->save();

        
        return redirect('pengusul')->with('status','Usulan berhasil ditambahkan');
    }

    public function storedokumenmou(Request $request)
    {
        
        $this->validate($request, [
            'id' => 'required'
        ]);

        $user = Auth::user();

        $dokumen = new Dokumen;
        $dokumen->kerjasama_id = $request->id;
        $dokumen->users_id = $user->id;
        $dokumen->jenis_dokumen_id = 1;
        $dokumen->save();

        $progres_dokumen = new ProgresDokumen;
        $progres_dokumen->users_id = $user->id;
        $progres_dokumen->dokumen_id = $dokumen->id;
        $progres_dokumen->status_progres = 1;
        $progres_dokumen->save();

        return redirect('pengusul')->with('status','Usulan berhasil ditambahkan');
    }

    public function storedokumenmoa(Request $request)
    {
        
        $this->validate($request, [
            'id' => 'required'
        ]);

        $user = Auth::user();

        $dokumen = new Dokumen;
        $dokumen->kerjasama_id = $request->id;
        $dokumen->users_id = $user->id;
        $dokumen->jenis_dokumen_id = 2;
        $dokumen->save();

        $progres_dokumen = new ProgresDokumen;
        $progres_dokumen->users_id = $user->id;
        $progres_dokumen->dokumen_id = $dokumen->id;
        $progres_dokumen->status_progres = 1;
        $progres_dokumen->save();

        return redirect('pengusul')->with('status','Usulan berhasil ditambahkan');
    }


    public function ajukandokumenmou($id)
    {
        $user = Auth::user();
        $kerjasama = Kerjasama::find($id);
        return view('pengusul.ajukandokumenmou', compact(['user','kerjasama']));
    }
    public function ajukandokumenmoa($id)
    {
        $user = Auth::user();
        $kerjasama = Kerjasama::find($id);
        return view('pengusul.ajukandokumenmoa', compact(['user','kerjasama']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kerjasama = Kerjasama::find($id);
        // $progres_dokumen = ProgresDokumen::all();
        // $dokumen = Dokumen->;

        $dokumen1 = DB::table('dokumen')->where('kerjasama_id', '=', $id)
                                        ->where('jenis_dokumen_id', '=', 1)                                
                                        ->first();
        $dokumen2 = DB::table('dokumen')->where('kerjasama_id', '=', $id)
                                        ->where('jenis_dokumen_id', '=', 2)                                
                                        ->first();
        // $progres_dokumen = DB::table('progres_dokumen')->where('dokumen_id', $dokumen->id)->get();
        // $progres_dokumen = DB::table('progres_dokumen')->where('dokumen_id', '=', $dokumen->id)->get();
        // return $dokumen1;
        // return $kerjasama->progres_dokumen;
        return view('pengusul.show', compact(['kerjasama','dokumen1','dokumen2']));
    }
    public function edit($id)
    {
        $kerjasama = Kerjasama::find($id);
        return view('pengusul.edit', compact('kerjasama'));
    }
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $this->validate($request, [
            'filename' => 'required|mimetypes:application/pdf|max:5000'
            // 'path_dokumen_usulan' => 'required|file|max:5000', // max 5MB
        ]);
        
        $path = $request->file('filename')->storeAs(
            'public/files', $request->file('filename')->getClientOriginalName()
        );

        $mitra->nama_mitra = $request->nama_mitra;
        $mitra->jabatan = $request->jabatan;
        $mitra->instansi_mitra = $request->instansi_mitra;
        $mitra->jenis_instansi_mitra = $request->jenis_instansi;
        //$mitra->id_users = '6';
        $mitra->save();

        $kerjasama->perihal_kerjasama = $request->perihal_kerjasama;
        $kerjasama->unit_pelaksana = $request->unit_pelaksana;
        $kerjasama->deskripsi = $request->deskripsi;
        $kerjasama->rencana_implementasi = $request->rencana_implementasi;
        $kerjasama->lama_kerjasama = $request->lama_kerjasama;
        $kerjasama->status = '1';
        //$kerjasama->mitra->nama_mitra = $request->nama_mitra;
        $kerjasama->users_id = $user->id;
        $kerjasama->mitra_id = $mitra->id;
        $kerjasama->filepath = $path;
        $kerjasama->filename = $path;
        //return $request;
        $kerjasama->save();
    }
    public function destroy($id)
    {
            $kerjasama = Kerjasama::find($id); 
            $kerjasama->delete();
            return redirect('pengusul')->with('status','Usulan berhasil dihapus');
    }
    public function datausulan(User $user)
    {
        $user = Auth::user();
        $kerjasama = Kerjasama::where('status', '=', 1)
                                ->where('users_id', '=', $user->id)
                                ->get();
        $mitra = Mitra::all();
        
        return view('pengusul.datausulan', compact(['user','mitra','kerjasama']));
    }
    public function datakerjasama()
    {
        $user = Auth::user();
        $kerjasama = Kerjasama::where('status','!=', 1)
                                ->where('users_id', '=', $user->id)
                                ->get();
        $mitra = Mitra::all();
        
        return view('pengusul.datakerjasama', compact(['user','mitra','kerjasama']));
    }
    public function datadokumen()
    {
        $user = Auth::user();
        $kerjasama = Kerjasama::all();
        $progres_dokumen = ProgresDokumen::all();
        $dokumen = Dokumen::all();

        // return $kerjasama;
        return view('pengusul.datadokumen', compact(['user','kerjasama','progres_dokumen','dokumen']));
    }
}
