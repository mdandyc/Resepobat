<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;
use App\Resep;
use App\Obat;

class DetailController extends Controller
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

        $detail = Detail::whereHas('obat', function($query) use($keyword) {
        $query->where('namaobat', 'LIKE', "%{$keyword}%");
        })->orwhereHas('resep', function($query) use($keyword) {
        $query->where('nomorresep', 'LIKE', "%{$keyword}%");
        })->orWhere('id','LIKE',"%{$keyword}%")->paginate(2);
        $resep = Resep::all();
        // $branch = Branch::where('branchVenue','LIKE',"%{$keyword}%")
        // ->orWhere('branchAddress','LIKE',"%{$keyword}%")
        // ->paginate(100);

        return view('detail.index',compact(['detail'],['resep']));
    }

    public function index()
    {
        $resep = Resep::all();
        $detail = Detail::paginate(2);
        return view('detail.index',compact('detail','resep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detail = Detail::all();
        $resep = Resep::all();
        $obat = Obat::all();
        return view('detail.create',compact(['detail'],['resep'],['obat']));
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
        'resep_id' => 'required',
        'obat_id' => 'required',
        'harga' => 'required',
        'dosis' => 'required',
        'subtotal' => 'required',
    ]);
        $detail = new Detail;
        $detail->resep_id = $request->resep_id;
        $detail->obat_id = $request->obat_id;
        $detail->harga = $request->harga;
        $detail->dosis = $request->dosis;
        $detail->subtotal = $request->subtotal;
        
        $detail->save();
        return redirect('detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Detail::find($id);
        return view('detail.detail',compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = Detail::find($id);
        $resep = Resep::all();
        $obat = Obat::all();
        return view('detail.edit',compact('detail','resep','obat'));
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
        'resep_id' => 'required',
        'obat_id' => 'required',
        'harga' => 'required',
        'dosis' => 'required',
        'subtotal' => 'required',
    ]);
        $detail = Detail::find($id);
        $detail->resep_id = $request->resep_id;
        $detail->obat_id = $request->obat_id;
        $detail->harga = $request->harga;
        $detail->dosis = $request->dosis;
        $detail->subtotal = $request->subtotal;
        
        $detail->save();
        return redirect('detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Detail::find($id);
        $delete->delete();
        return redirect('detail');

    }
}
