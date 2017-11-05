<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokter;
use App\Poliklinik;
use App\Pendaftaran;
use App\Resep;

class DokterController extends Controller
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
    public function index()
    {
        $dokter = Dokter::paginate(2);
        return view('dokter.index',compact('dokter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dokter = Dokter::all();
        $poliklinik = Poliklinik::all();
        return view('dokter.create',compact(['dokter'],['poliklinik']));
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
        'namadkt' => 'required',
        'spesialis' => 'required',
        'alamatdkt' => 'required',
        'telepondkt' => 'required',
        'poliklinik_id' => 'required',
        'tarif' => 'required',
    ]);
        $dokter = new Dokter;
        $dokter->namadkt = $request->namadkt;
        $dokter->spesialis = $request->spesialis;
        $dokter->alamatdkt = $request->alamatdkt;
        $dokter->telepondkt = $request->telepondkt;
        $dokter->poliklinik_id = $request->poliklinik_id;
        $dokter->tarif = $request->tarif;
        
        $dokter->save();
        return redirect('dokter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dokter = Dokter::find($id);
        return view('dokter.detail',compact('dokter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dokter = Dokter::find($id);
        $poliklinik = Poliklinik::all();
        return view('dokter.edit',compact('dokter','poliklinik'));
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
        'namadkt' => 'required',
        'spesialis' => 'required',
        'alamatdkt' => 'required',
        'telepondkt' => 'required',
        'poliklinik_id' => 'required',
        'tarif' => 'required',
    ]);
        $dokter = Dokter::find($id);
        $dokter->namadkt = $request->namadkt;
        $dokter->spesialis = $request->spesialis;
        $dokter->alamatdkt = $request->alamatdkt;
        $dokter->telepondkt = $request->telepondkt;
        $dokter->poliklinik_id = $request->poliklinik_id;
        $dokter->tarif = $request->tarif;
        
        $dokter->save();
        return redirect('dokter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Dokter::find($id);
        $delete1 = Pendaftaran::where('dokter_id',$id);
        $delete2 = Resep::where('dokter_id',$id);

        $delete1->delete();
        $delete2->delete();
        $delete->delete();
        return redirect('dokter');
    }
    public function search(Request $request)
    {
        $keyword = $request['keyword'];
        // $branch = Branch::where('branchName','LIKE',"%{$keyword}%")->paginate(30);

        $dokter = Dokter::whereHas('poliklinik', function($query) use($keyword) {
        $query->where('namaplk', 'LIKE', "%{$keyword}%");
        })->orWhere('kodedkt','LIKE',"%{$keyword}%")->orWhere('namadkt','LIKE',"%{$keyword}%")->orWhere('alamatdkt','LIKE',"%{$keyword}%")->orWhere('spesialis','LIKE',"%{$keyword}%")->paginate(2);

        // $branch = Branch::where('branchVenue','LIKE',"%{$keyword}%")
        // ->orWhere('branchAddress','LIKE',"%{$keyword}%")
        // ->paginate(100);

        return view('dokter.index',compact(['dokter']));
    }
}
