@extends('starter-admin')

<!-- @section('judul', 'Form Create') -->
@section('isi')
<div class="container">
     <div class="row justify-content-center">
          <div class="col-8">
               <div class="card">
                    <div class="card-body">
                    <form action="{{ route('simpan') }}" method="POST" enctype= "multipart/form-data">
                    {{ csrf_field() }}
                    
                    
                    <div class="mb-3">
                    <label class="form-label">Tipe Kamar</label>
                    <input type="text" class="form-control" name="tipe_kamar">
                    @error('tipe_kamar')
                    <div class="text-info">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="mb-3">
                    <label class="form-label">Nama Fasilitas</label>
                    <input type="text" class="form-control" name="nama_fasilitas">
                    @error('nama_fasilitas')
                    <div class="text-info">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="mb-3">
                    <label class="form-label">Jumlah Kamar</label>
                    <input type="text" class="form-control" name="jumlah_kamar">
                    @error('jumlah_kamar')
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