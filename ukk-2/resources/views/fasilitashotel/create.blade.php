@extends('starter-admin')

<!-- @section('judul', 'Form Create') -->
@section('isi')
<div class="container">
     <div class="row justify-content-center">
          <div class="col-8">
               <div class="card">
                    <div class="card-body">
                    <form action="{{ route('simpan-fh') }}" method="POST" enctype= "multipart/form-data">
                    {{ csrf_field() }}
                    
                    <div class="mb-3">
                    <label class="form-label">Nama Fasilitas</label>
                    <input type="text" class="form-control" name="nama_fasilitas">
                    @error('nama_fasilitas')
                    <div class="text-info">{{ $message }}</div>
                    @enderror
                    </div>
                    
                    
                    <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan">
                    @error('keterangan')
                    <div class="text-info">{{ $message }}</div>
                    @enderror
                    </div>

                    

                    <div class="mb-3">
                    <label class="form-label">Masukan Gambar</label>
                    <input type="file" class="form-control" name="gambar">
                    @error('gambar')
                    <div class="text-info">{{ $message }}</div>
                    @enderror
                    </div>

                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>    
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection