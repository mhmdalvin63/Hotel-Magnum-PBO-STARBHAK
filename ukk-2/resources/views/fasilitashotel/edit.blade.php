@extends('starter-admin')

<!-- @section('judul', 'Form Edit') -->
@section('isi')
<div class="container">
     <div class="row justify-content-center">
          <div class="col-8">
               <div class="card">
                    <div class="card-body">
                    <form action="{{ route('update-fh', $fasilhotel->id) }}" method="POST" enctype= "multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    
                    <div class="mb-3">
                    <label class="form-label">Nama Fasilitas</label>
                    <input type="text" class="form-control" name="nama_fasilitas" value="{{ $fasilhotel->nama_fasilitas }}">
                    @error('nama_fasilitas')
                    <div class="text-info">{{ $message }}</div>
                    @enderror
                    </div>
                    
                    
                    <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" value="{{ $fasilhotel->keterangan }}">
                    @error('keterangan')
                    <div class="text-info">{{ $message }}</div>
                    @enderror
                    </div>
                    
                    
                    <div class="mb-3">
                    <label class="form-label">Gambar</label>
                    <input type="file" class="form-control" name="gambar" value="{{ $fasilhotel->gambar }}">
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