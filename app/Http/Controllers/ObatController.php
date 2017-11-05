<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obat;

class ObatController extends Controller
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
        $obat = Obat::where('namaobat','LIKE',"%{$keyword}%")->orWhere('jenisobat','LIKE',"%{$keyword}%")->orWhere('hargaobat','LIKE',"%{$keyword}%")->orWhere('kategori','LIKE',"%{$keyword}%")->paginate(2);
        return view('obat.index',compact('obat'));
    }
    public function index()
    {
        $obat = Obat::paginate(2);
        return view('obat.index',compact('obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obat = Obat::all();
        return view('obat.create',compact('obat'));
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
        'namaobat' => 'required',
        'jenisobat' => 'required',
        'kategori' => 'required',
        'hargaobat' => 'required',
        'jumlahobat' => 'required',
    ]);
        $obat = new Obat;
        $obat->namaobat = $request->namaobat;
        $obat->jenisobat = $request->jenisobat;
        $obat->kategori = $request->kategori;
        $obat->hargaobat = $request->hargaobat;
        $obat->jumlahobat = $request->jumlahobat;
        
        $obat->save();
        return redirect('obat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obat = Obat::find($id);
        return view('obat.detail',compact('obat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obat = Obat::find($id);
        return view('obat.edit',compact('obat'));
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
        'namaobat' => 'required',
        'jenisobat' => 'required',
        'kategori' => 'required',
        'hargaobat' => 'required',
        'jumlahobat' => 'required',
    ]);
        $obat = Obat::find($id);
        $obat->namaobat = $request->namaobat;
        $obat->jenisobat = $request->jenisobat;
        $obat->kategori = $request->kategori;
        $obat->hargaobat = $request->hargaobat;
        $obat->jumlahobat = $request->jumlahobat;
        
        $obat->save();
        return redirect('obat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Obat::find($id);
        $delete->delete();
        return redirect('obat');
    }
}
