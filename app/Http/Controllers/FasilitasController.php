<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tamu;
use App\Kamar;
use App\Fasilitas;
use Session;

class FasilitasController extends Controller
{

    public function index()
    {
        $fsl = Fasilitas::all();
        return view('fasilitas.index',compact('fsl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fasilitas.create');
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
            'nama_fasilitas' => 'required|',
        ]);
        $fsl = new Fasilitas;
        $fsl->nama_fasilitas = $request->nama_fasilitas;
        $fsl->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$fsl->nama_fasilitas</b>"
        ]);
        return redirect()->route('fasilitas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fsl = Fasilitas::findOrFail($id);
        return view('fasilitas.show',compact('fsl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $fsl = Fasilitas::findOrFail($id);
        return view('fasilitas.edit',compact('fsl'));
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
            'nama_fasilitas' => 'required|'
            
        ]);
        $fsl = Fasilitas::findOrFail($id);
        $fsl->nama_fasilitas = $request->nama_fasilitas;
        $fsl->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$fsl->nama_fasilitas</b>"
        ]);
        return redirect()->route('fasilitas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fsl = Fasilitas::findOrFail($id);
        $fsl->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('fasilitas.index');
    }
}
