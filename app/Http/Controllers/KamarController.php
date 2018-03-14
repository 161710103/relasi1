<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tamu;
use App\Kamar;
use App\Fasilitas;
use Session;
class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = Kamar::with('Fasilitas')->get();
        return view('kamar.index',compact('mhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fsl = Fasilitas::all();
        return view('kamar.create',compact('fsl'));
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
            'nomor_kamar' => 'required|',
            'fasilitas_id' => 'required'
        ]);
        $kamar = new Kamar;
        $kamar->nomor_kamar = $request->nomor_kamar;
        $kamar->fasilitas_id = $request->fasilitas_id;
        $kamar->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$kamar->nomor_kamar</b>"
        ]);
        return redirect()->route('kamar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('kamar.show',compact('kamar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $kamar = Kamar::findOrFail($id);
        $fsl = Fasilitas::all();
        $selectedFasilitas = Kamar::findOrFail($id)->fasilitas_id;
        return view('kamar.edit',compact('kamar','fsl','selectedFasilitas'));
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
            'nomor_kamar' => 'required|',
            'fasilitas_id' => 'required'
        ]);
        $kamar = Kamar::findOrFail($id);
        $kamar->nomor_kamar = $request->nomor_kamar;
        $kamar->fasilitas_id = $request->fasilitas_id;
        $kamar->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$kamar->nomor_kamar</b>"
        ]);
        return redirect()->route('kamar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $kamar = Kamar::findOrFail($id);
        $kamar->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('kamar.index');
    }
}
