@extends('starter-resepsionis')

@section('judul', 'Form Create Data Guru')
@section('isi')
<div class="container">
     <div class="row justify-content-center">
          <div class="col-8">
               <div class="card">
                    <div class="card-body">
                    <form action="{{ route('simpan-resepsionis') }}" method="POST" enctype= "multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Tamu :</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Tamu" name="nama_tamu">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tanggal Cek In :</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1"  name="tgl_cekin">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tanggal Cek Out :</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1"  name="tgl_cekout">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                      </div>
               </div>
          </div>
     </div>
</div>
@endsection