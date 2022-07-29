<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasHotel;

class FasilitasHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datafasilhotel = FasilitasHotel::latest()->paginate(5); 
        return view ('fasilitashotel.index',compact('datafasilhotel'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('FasilitasHotel.create');
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
            'nama_fasilitas' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required',
            
        ]);

        $data = FasilitasHotel::create($request->all());
        if($request->hasFile('gambar')){
                $request->file('gambar')->move('gambarFasilitas/', $request->file('gambar')->getClientOriginalName());
                $data->gambar = $request->file('gambar')->getClientOriginalName();
                $data->save();
            }
        
            return redirect('/fasilitashotel')->with('success', 'Data Berhasil Ditambahkan');
            
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
        $fasilhotel = FasilitasHotel::findorfail($id);
        return view('FasilitasHotel.edit', compact('fasilhotel'));
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
        // $this->validate($request, [
        //     'nama_fasilitas' => 'required',
        //     'keterangan' => 'required',
        //     'gambar' => 'required',
            
        // ]);

        $fasilhotel = FasilitasHotel::findorfail($id);
        $fasilhotel->update($request->all());

        if($request->hasFile('gambar')){
            $request->file('gambar')->move('gambarFasilitas/', $request->file('gambar')->getClientOriginalName());
            $fasilhotel->gambar = $request->file('gambar')->getClientOriginalName();
            $fasilhotel->save();
        }
        return redirect('/fasilitashotel')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fasilhotel = FasilitasHotel::findorfail($id);
        $fasilhotel->delete();
        return back()->with('destroy', 'Data Ke Destroy');
    }
}
