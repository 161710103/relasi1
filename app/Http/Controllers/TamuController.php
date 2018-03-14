<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kamar;
use App\Tamu;
use Session;

class TamuController extends Controller
{
     
    public function index()
    {
     $tamu = Tamu::with('Kamar')->get();
        return view('tamu.index',compact('tamu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $kamar = Kamar::all();
        return view('tamu.create',compact('kamar'));
    }       

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
            'nama' => 'required|',
            'nik' => 'required|',
            'kamar_id' => 'required'
        ]);
        $tamu = new Tamu;
        $tamu->nama = $request->nama;
        $tamu->nik = $request->nik;
        $tamu->kamar_id = $request->kamar_id;
        $tamu->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$tamu->nama</b>"
        ]);
        return redirect()->route('tamu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $tamu = Tamu::findOrFail($id);
        return view('tamu.show',compact('tamu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tamu = Tamu::findOrFail($id);
        $kamar = Kamar::all();
        $selectedkamar = Tamu::findOrFail($id)->kamar_id;
        return view('tamu.edit',compact('kamar','tamu','selectedkamar'));
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
        $this->validate($request,[
            'nama' => 'required|',
            'nik' => 'required|',
            'kamar_id' => 'required'
        ]);
        $tamu = Tamu::findOrFail($id);
        $tamu->nama = $request->nama;
        $tamu->nik = $request->nik;
        $tamu->kamar_id = $request->kamar_id;
        $tamu->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$tamu->nama</b>"
        ]);
        return redirect()->route('tamu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tamu = Tamu::findOrFail($id);
        $tamu->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('tamu.index');
    }
}
