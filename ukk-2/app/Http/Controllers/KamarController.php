<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datakamar = Kamar::latest()->paginate(5); 
        return view ('kamar.index',compact('datakamar'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Kamar.create');
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
            'tipe_kamar' => 'required',
            'nama_fasilitas' => 'required',
            'jumlah_kamar' => 'required',
        ]);

        Kamar::create([
            'tipe_kamar' => $request->tipe_kamar,
            'nama_fasilitas' => $request->nama_fasilitas,
            'jumlah_kamar' => $request->jumlah_kamar,
        ]);

        
        return redirect('/kamar')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kamar = Kamar::findorfail($id);
        return view('Kamar.edit', compact('kamar'));
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
            'tipe_kamar' => 'required',
            'nama_fasilitas' => 'required',
            'jumlah_kamar' => 'required',
        ]);

        $kamar = Kamar::findorfail($id);
        $kamar->update($request->all());
        return redirect('/kamar')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kamar = Kamar::findorfail($id);
        $kamar->delete();
        return back()->with('destroy', 'Data Ke Destroy');
    }
}
