<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resep;
use App\Dokter;
use App\Pasien;
use App\Poliklinik;

class ResepController extends Controller
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

        $resep = Resep::whereHas('pasien', function($query) use($keyword) {
        $query->where('namapsn', 'LIKE', "%{$keyword}%");
        })->orwhereHas('dokter', function($query) use($keyword) {
        $query->where('namadkt', 'LIKE', "%{$keyword}%");
        })->orwhereHas('poliklinik', function($query) use($keyword) {
        $query->where('namaplk', 'LIKE', "%{$keyword}%");
        })->orWhere('nomorresep','LIKE',"%{$keyword}%")->orWhere('tanggalresep','LIKE',"%{$keyword}%")->paginate(2);

        // $branch = Branch::where('branchVenue','LIKE',"%{$keyword}%")
        // ->orWhere('branchAddress','LIKE',"%{$keyword}%")
        // ->paginate(100);

        return view('resep.index',compact(['resep']));
    }
    public function index()
    {
        $resep = Resep::paginate(2);
        return view('resep.index',compact('resep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = Pasien::all();
        $resep = Resep::all();
        $dokter = Dokter::all();
        $poliklinik = Poliklinik::all();
        return view('resep.create',compact(['dokter'],['poliklinik'],['resep'],['pasien']));
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
        'tanggalresep' => 'required',
        'dokter_id' => 'required',
        'pasien_id' => 'required',
        'poliklinik_id' => 'required',
        'totalharga' => 'required',
        'bayar' => 'required',
        'kembali' => 'required',
    ]);
        $resep = new Resep;
        $resep->tanggalresep = $request->tanggalresep;
        $resep->dokter_id = $request->dokter_id;
        $resep->pasien_id = $request->pasien_id;
        $resep->poliklinik_id = $request->poliklinik_id;
        $resep->totalharga = $request->totalharga;
        $resep->bayar = $request->bayar;
        $resep->kembali = $request->kembali;
        
        $resep->save();
        return redirect('resep');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resep = Resep::find($id);
       
        return view('resep.detail',compact('resep'));
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
        $resep = Resep::find($id);
        $dokter = Dokter::all();
        $poliklinik = Poliklinik::all();
        return view('resep.edit',compact('pasien','resep','dokter','poliklinik'));
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
        'tanggalresep' => 'required',
        'dokter_id' => 'required',
        'pasien_id' => 'required',
        'poliklinik_id' => 'required',
        'totalharga' => 'required',
        'bayar' => 'required',
        'kembali' => 'required',
    ]);
        $resep = Resep::find($id);
        $resep->tanggalresep = $request->tanggalresep;
        $resep->dokter_id = $request->dokter_id;
        $resep->pasien_id = $request->pasien_id;
        $resep->poliklinik_id = $request->poliklinik_id;
        $resep->totalharga = $request->totalharga;
        $resep->bayar = $request->bayar;
        $resep->kembali = $request->kembali;
        
        $resep->save();
        return redirect('resep');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Resep::find($id);
        $delete->delete();
        return redirect('resep');
    }
}
