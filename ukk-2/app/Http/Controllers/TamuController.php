<?php

namespace App\Http\Controllers;

use App\Models\tamu;
use Illuminate\Http\Request;
use App\Http\Resources\TamuResource;
use Illuminate\Support\Facades\Validator;

class TamuController extends Controller
{
    public function index()
    {
        //get posts
        $tamu = tamu::latest()->paginate(5);
        //return collection of posts as a resource
        return new TamuResource(true, 'List Data Tamu', $tamu);
        
        $data = tamu::all();
        return view('tamu.pemesanan',compact('data'));
    }

    public function create()
    {
        return view('tamu.pemesanan');
    }

    public function store(Request $request)
    {

        //define validation rules
        $validator = Validator::make($request->all(), [
            'namapemesan' => 'required',
            'email' => 'required',
            'notelp' => 'required',
            'namatamu' => 'required',
            'tipekamar' => 'required',
            'tglcekin' => 'required',
            'tglcekout' => 'required',
            'jmlkamar' => 'required', 
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/posts', $image->hashName());

        //create post
        $tamu = tamu::create([
            'namapemesan' => $request->namapemesan,
            'email' => $request->email,
            'notelp' => $request->notelp,
            'namatamu' => $request->namatamu,
            'tipekamar' => $request->tipekamar,
            'tglcekin' => $request->tglcekin,
            'tglcekout' => $request->tglcekout,
            'jmlkamar' => $request->jmlkamar,
        ]);

        //return response
        return new TamuResource(true, 'Data Post Berhasil Ditambahkan!', $tamu);

        
        $this->validate($request,[
            'namapemesan' => 'required',
            'email' => 'required',
            'notelp' => 'required',
            'namatamu' => 'required',
            'tipekamar' => 'required',
            'tglcekin' => 'required',
            'tglcekout' => 'required',
            'jmlkamar' => 'required',
        ]);
        tamu::create([
            'namapemesan' => $request->namapemesan,
            'email' => $request->email,
            'notelp' => $request->notelp,
            'namatamu' => $request->namatamu,
            'tipekamar' => $request->tipekamar,
            'tglcekin' => $request->tglcekin,
            'tglcekout' => $request->tglcekout,
            'jmlkamar' => $request->jmlkamar,

        ]);

        return Redirect('/tampil');
    }

    public function show(tamu $tamu)
    {
        //return single post as a resource
        return new TamuResource(true, 'Data Post Ditemukan!', $tamu);
    }

    public function update(Request $request, tamu $tamu)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'namapemesan'     => 'required',
            'email'   => 'required',
            'notelp'     => 'required',
            'namatamu'   => 'required',
            'tipekamar'     => 'required',
            'tglcekin'   => 'required',
            'tglcekout'     => 'required',
            'jmlkamar'   => 'required',
        ]);
        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //update post without image
        $tamu->update([
            'namapemesan'     => $request->namapemesan,
            'email'   => $request->email,
            'notelp'   => $request->notelp,
            'namatamu'   => $request->namatamu,
            'tipekamar'   => $request->tipekamar,
            'tglcekin'   => $request->tglcekin,
            'tglcekout'   => $request->tglcekout,
            'jmlkamar'   => $request->jmlkamar,
        ]);
        //return response
        return new TamuResource(true, 'Data Post Berhasil Diubah!', $tamu);

        $this->validate($request, [
            'namapemesan'     => 'required',
            'email'   => 'required',
            'notelp'     => 'required',
            'namatamu'   => 'required',
            'tipekamar'     => 'required',
            'tglcekin'   => 'required',
            'tglcekout'     => 'required',
            'jmlkamar'   => 'required',
        ]);
        $tamu = tamu::findorfail($id);
        $tamu->update($request->all());
        return redirect('/tamu')->with('success', 'Data Berhasil Di Update');

    }


    // public function destroy($id)
    // {
    //     $data=tamu::findorfail($id);
    //     $data->delete();
    //     return back()->with('destroy','data berhasil dihapus');
    // }

    public function destroy(tamu $tamu)
    {

        //delete post
        $tamu->delete();
        //return response
        return new TamuResource(true, 'Data Post Berhasil Dihapus!', null);

        $tamu = tamu::findorfail($id);
        $tamu->delete();
        return back()->with('destroy', 'Data Ke Destroy');

    }
}
