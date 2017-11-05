<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poliklinik;

class PoliklinikController extends Controller
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
        $poliklinik = Poliklinik::where('kodeplk','LIKE',"%{$keyword}%")->orWhere('namaplk','LIKE',"%{$keyword}%")->paginate(2);
        return view('poliklinik.index',compact('poliklinik'));
    }
    public function index()
    {
        $poliklinik = Poliklinik::paginate(2);
        return view('poliklinik.index',compact('poliklinik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poliklinik = Poliklinik::all();
        return view('poliklinik.create',compact('poliklinik'));
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
        'namaplk' => 'required',

    ]);
        $poliklinik = new Poliklinik;
        $poliklinik->namaplk = $request->namaplk;

        $poliklinik->save();
        return redirect('poliklinik');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poliklinik = Poliklinik::find($id);
        return view('poliklinik.detail',compact('poliklinik'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poliklinik = Poliklinik::find($id);
        return view('poliklinik.edit',compact('poliklinik'));
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
        'namaplk' => 'required',

    ]);
        $poliklinik = Poliklinik::find($id);
        $poliklinik->namaplk = $request->namaplk;

        $poliklinik->save();
        return redirect('poliklinik');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Poliklinik::find($id);
        $delete->delete();
        return redirect('poliklinik');
    }
}
