<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Resepsionis;
use Illuminate\Http\Request;
use App\Http\Resources\KamarResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //get posts
         $kamar = Kamar::latest()->get();
         //return collection of posts as a resource
         return new KamarResource(true, 'List Data Kamar', $kamar);

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
        //define validation rules
        $validator = Validator::make($request->all(), [
            'tipe_kamar'     => 'required',
            'nama_fasilitas'     => 'required',
            'jumlah_kamar'   => 'required',
        ]);
        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/posts', $image->hashName());
        //create post
        $kamar = Kamar::create([
            'tipe_kamar'     => $request->tipe_kamar,
            'nama_fasilitas'     => $request->nama_fasilitas,
            'jumlah_kamar'   => $request->jumlah_kamar,
        ]);
        //return response
        return new KamarResource(true, 'Data Kamar Berhasil Ditambahkan!', $kamar);


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
    public function show(Kamar $kamar)
    {
        ///return single post as a resource
        return new KamarResource(true, 'Data Kamar Ditemukan!', $kamar);
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
    public function update(Request $request,  Kamar $kamar)
    {
         //define validation rules
         $validator = Validator::make($request->all(), [
            'tipe_kamar'     => 'required',
            'nama_fasilitas'   => 'required',
            'jumlah_kamar'   => 'required',
        ]);
        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //update post without image
        $kamar->update([
            'tipe_kamar'     => $request->tipe_kamar,
            'nama_fasilitas'   => $request->nama_fasilitas,
            'jumlah_kamar'   => $request->jumlah_kamar,
        ]);
        
        //check if image is not empty
        // if ($request->hasFile('image')) {
        //     //upload image
        //     $image = $request->file('image');
        //     $image->storeAs('public/posts', $image->hashName());
        //     //delete old image
        //     Storage::delete('public/posts/'.$post->image);
        //     //update post with new image
        //     $post->update([
        //         'image'     => $image->hashName(),
        //         'title'     => $request->title,
        //         'content'   => $request->content,
        //     ]);
        // } else {

        //     //update post without image
        //     $post->update([
        //         'tipe_kamar'     => $request->title,
        //         'content'   => $request->content,
        //     ]);
        // }

        //return response
        return new KamarResource(true, 'Data Kamar Berhasil Diubah!', $kamar);
        
        // $this->validate($request, [
        //     'tipe_kamar' => 'required',
        //     'nama_fasilitas' => 'required',
        //     'jumlah_kamar' => 'required',
        // ]);

        // $kamar = Kamar::findorfail($id);
        // $kamar->update($request->all());
        // return redirect('/kamar')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        // //delete image
        // Storage::delete('public/posts/'.$post->image);
        //delete post
        $kamar->delete();
        //return response
        return new KamarResource(true, 'Data Kamar Berhasil Dihapus!', null);


        // $kamar = Kamar::findorfail($id);
        // $kamar->delete();
        // return back()->with('destroy', 'Data Ke Destroy');
    }
}
