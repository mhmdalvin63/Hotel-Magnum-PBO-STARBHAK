@extends('starter-tamu')

<!-- @section('judul', 'Form Create') -->
@section('isi')
   
  
  <div class="container mt-5" >
    <div class="row justify-content-center ">
       <div class="col-11" >
           <div class="card">
               <div class="card-body">
                 <h1 class="text-center mb-5">Form Pemesanan</h1>
                   <form action="{{ route('simpan') }}" method="POST" class="col-7">
                       @csrf
                       
                       <div class="mb-3">
                         <label for="exampleInputEmail1" class="form-label">Nama Pemesan</label>
                         <input type="text" class="form-control" name="namapemesan">
                       </div>
  
                       <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email">
                      </div>
  
                       <div class="mb-3">
                           <label for="exampleInputEmail1" class="form-label">No. Telp</label>
                           <input type="number" class="form-control" name="notelp">
                      </div>

                       <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Tamu</label>
                            <input type="text" class="form-control" name="namatamu">
                      </div>
  
                       <div class="mb-3">
                           <label for="exampleInputEmail1" class="form-label">Tipe Kamar</label>
                           <select name="tipekamar" class="form-select form-control" id="" >
                               <option selected>Pilih Tipe Kamar</option>
                               <option value="1">Tipe Superior</option>
                               <option value="2">Tipe Deluxe</option>
                               <option value="3">Tipe Presidential Suite</option>
                           </select>
                      </div>
  
                       <div class="mb-3">
                           <label for="exampleInputEmail1" class="form-label">Tgl Check In</label>
                           <input type="date" class="form-control" name="tglcekin">
                      </div>
  
                       <div class="mb-3">
                           <label for="exampleInputEmail1" class="form-label">Tgl Check Out</label>
                           <input type="date" class="form-control" name="tglcekout">
                      </div>
  
                       <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jumlah Kamar</label>
                            <input type="number" class="form-control" name="jmlkamar">
                       </div>
                           
                       <button type="submit" class="btn btn-outline-dark">Pesan</button>
                     </form>
               </div>
           </div>
       </div>
    </div>
  </div>

  

    @endsection