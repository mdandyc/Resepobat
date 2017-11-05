<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\Pasien;

class PembayaranController extends Controller
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

        $pembayaran = Pembayaran::whereHas('pasien', function($query) use($keyword) {
        $query->where('namapsn', 'LIKE', "%{$keyword}%");
        })->orWhere('nomorbyr','LIKE',"%{$keyword}%")->orWhere('tanggalbyr','LIKE',"%{$keyword}%")->paginate(2);

        // $branch = Branch::where('branchVenue','LIKE',"%{$keyword}%")
        // ->orWhere('branchAddress','LIKE',"%{$keyword}%")
        // ->paginate(100);

        return view('pembayaran.index',compact(['pembayaran']));
    }
    public function index()
    {
        $pembayaran = Pembayaran::paginate(2);
        return view('pembayaran.index',compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = Pasien::all();
        $pembayaran = Pembayaran::all();
        return view('pembayaran.create',compact(['pembayaran'],['pasien']));
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
        'pasien_id' => 'required',
        'tanggalbyr' => 'required',
        'jumlahbyr' => 'required',
    ]);
        $pembayaran = new Pembayaran;
        $pembayaran->pasien_id = $request->pasien_id;
        $pembayaran->tanggalbyr = $request->tanggalbyr;
        $pembayaran->jumlahbyr = $request->jumlahbyr;
        
        $pembayaran->save();
        return redirect('pembayaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembayaran = Pembayaran::find($id);
        return view('pembayaran.detail',compact('pembayaran'));
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
        $pembayaran = Pembayaran::find($id);
        return view('pembayaran.edit',compact(['pembayaran'],['pasien']));
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
        'pasien_id' => 'required',
        'tanggalbyr' => 'required',
        'jumlahbyr' => 'required',
    ]);
        $pembayaran = Pembayaran::find($id);
        $pembayaran->pasien_id = $request->pasien_id;
        $pembayaran->tanggalbyr = $request->tanggalbyr;
        $pembayaran->jumlahbyr = $request->jumlahbyr;
        
        $pembayaran->save();
        return redirect('pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Pembayaran::find($id);
        $delete->delete();
        return redirect('pembayaran');
    }
}
