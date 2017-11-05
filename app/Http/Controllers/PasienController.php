<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Pendaftaran;
use App\Pembayaran;
use App\Resep;

class PasienController extends Controller
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
        $pasien = Pasien::where('namapsn','LIKE',"%{$keyword}%")->orWhere('alamatpsn','LIKE',"%{$keyword}%")->orWhere('genderpsn','LIKE',"%{$keyword}%")->orWhere('umurpsn','LIKE',"%{$keyword}%")->paginate(2);
        return view('pasien.index',compact('pasien'));
    }
    public function index()
    {
        $pasien = Pasien::paginate(2);
        return view('pasien.index',compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = Pasien::all();
        return view('pasien.create',compact('pasien'));
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
        'namapsn' => 'required',
        'alamatpsn' => 'required',
        'genderpsn' => 'required',
        'umurpsn' => 'required',
        'teleponpsn' => 'required',
    ]);
        $pasien = new Pasien;
        $pasien->namapsn = $request->namapsn;
        $pasien->alamatpsn = $request->alamatpsn;
        $pasien->genderpsn = $request->genderpsn;
        $pasien->umurpsn = $request->umurpsn;
        $pasien->teleponpsn = $request->teleponpsn;
        
        $pasien->save();
        return redirect('pasien');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = Pasien::find($id);
        return view('pasien.detail',compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasien = Pasien::find($id);
        return view('pasien.edit',compact('pasien'));
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
        'namapsn' => 'required',
        'alamatpsn' => 'required',
        'genderpsn' => 'required',
        'umurpsn' => 'required',
        'teleponpsn' => 'required',
    ]);
        $pasien = Pasien::find($id);
        $pasien->namapsn = $request->namapsn;
        $pasien->alamatpsn = $request->alamatpsn;
        $pasien->genderpsn = $request->genderpsn;
        $pasien->umurpsn = $request->umurpsn;
        $pasien->teleponpsn = $request->teleponpsn;
        
        $pasien->save();
        return redirect('pasien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Pasien::find($id);
        $delete2 = Pendaftaran::where('pasien_id',$id);
        $delete3 = Pembayaran::where('pasien_id',$id);
        $delete4 = Resep::where('pasien_id',$id);

        $delete->delete();
        $delete2->delete();
        $delete3->delete();
        $delete4->delete();
        return redirect('pasien');
    }
}
