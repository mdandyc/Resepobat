<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendaftaran;
use App\Dokter;
use App\Pasien;
use App\Poliklinik;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function search(Request $request)
    {
        $keyword = $request['keyword'];
        // $branch = Branch::where('branchName','LIKE',"%{$keyword}%")->paginate(30);

        $pendaftaran = Pendaftaran::whereHas('pasien', function($query) use($keyword) {
        $query->where('namapsn', 'LIKE', "%{$keyword}%");
        })->orwhereHas('dokter', function($query) use($keyword) {
        $query->where('namadkt', 'LIKE', "%{$keyword}%");
        })->orwhereHas('poliklinik', function($query) use($keyword) {
        $query->where('namaplk', 'LIKE', "%{$keyword}%");
        })->orWhere('nomorpendf','LIKE',"%{$keyword}%")->orWhere('tanggalpendf','LIKE',"%{$keyword}%")->paginate(6);

        // $branch = Branch::where('branchVenue','LIKE',"%{$keyword}%")
        // ->orWhere('branchAddress','LIKE',"%{$keyword}%")
        // ->paginate(100);

        return view('pendaftaran.index',compact(['pendaftaran']));
    }
    public function index()
    {
        $pendaftaran = Pendaftaran::paginate(2);
        return view('pendaftaran.index',compact('pendaftaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = Pasien::all();
        $pendaftaran = Pendaftaran::all();
        $dokter = Dokter::all();
        $poliklinik = Poliklinik::all();
        return view('pendaftaran.create',compact(['dokter'],['poliklinik'],['pendaftaran'],['pasien']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
        'tanggalpendf' => 'required',
        'dokter_id' => 'required',
        'pasien_id' => 'required',
        'poliklinik_id' => 'required',
        'biaya' => 'required',
        'ket' => 'required',
    ]);
        $pendaftaran = new Pendaftaran;
        $pendaftaran->tanggalpendf = $request->tanggalpendf;
        $pendaftaran->dokter_id = $request->dokter_id;
        $pendaftaran->pasien_id = $request->pasien_id;
        $pendaftaran->poliklinik_id = $request->poliklinik_id;
        $pendaftaran->biaya = $request->biaya;
        $pendaftaran->ket = $request->ket;
        
        $pendaftaran->save();
        return redirect('pendaftaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        return view('pendaftaran.detail',compact('pendaftaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasien = Pasien::all();
        $pendaftaran = Pendaftaran::find($id);
        $dokter = Dokter::all();
        $poliklinik = Poliklinik::all();
        return view('pendaftaran.edit',compact(['dokter'],['poliklinik'],['pendaftaran'],['pasien']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'tanggalpendf' => 'required',
        'dokter_id' => 'required',
        'pasien_id' => 'required',
        'poliklinik_id' => 'required',
        'biaya' => 'required',
        'ket' => 'required',
    ]);
        $pendaftaran = Pendaftaran::find($id);
        $pendaftaran->tanggalpendf = $request->tanggalpendf;
        $pendaftaran->dokter_id = $request->dokter_id;
        $pendaftaran->pasien_id = $request->pasien_id;
        $pendaftaran->poliklinik_id = $request->poliklinik_id;
        $pendaftaran->biaya = $request->biaya;
        $pendaftaran->ket = $request->ket;
        
        $pendaftaran->save();
        return redirect('pendaftaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Pendaftaran::find($id);
        $delete->delete();
        return redirect('pendaftaran');
        
    }
}
