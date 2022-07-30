@extends('starter-resepsionis')

@section('judul', 'Guru')
@section('isi')

<div class="container">
     <div class="row justify-content-center">
          <div class="col-12">
               <div class="card">
                    <div class="card-body">
                         <h1 class="text-center">Resepsionis</h1>
                         @if ($message = Session::get('success'))
                         <div class= "alert alert-success" role="alert">
                              {{ $message }}
                         </div>
                         @endif
                         <a href="{{ route('create-resepsionis')}}" class="btn btn-info" style="margin-bottom: 20px">+</a>

                    <!-- table -->
                    
                    <table class="table">
                    <thead>
                         <tr>
                         <th scope="col">No</th>
                         <th scope="col">Nama Tamu</th>
                         <th scope="col">Tgl.Cek In</th>
                         <th scope="col">Tgl.Cek Out</th>
                         <th scope="col">Option</th>
                         </tr>
                       </thead>
                       <tbody>
                         @foreach ($resepsionis as $item)
                         <tr>
                           <th scope="row">{{$loop->iteration}}</th>
                           <td>{{$item->nama_tamu}}</td>
                           <td>{{$item->tgl_cekin}}</td>
                           <td>{{$item->tgl_cekout}}</td>
                           <td>
                                
                           <a href="{{ url('edit-resepsionis', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ url('delete-resepsionis', $item->id) }}" method="POST">
                                     @csrf
                                     @method('delete')
                                     <button class="btn btn-danger">Hapus</button>
                                </form>
                           </td>
                         </tr>
                         @endforeach
                       </tbody>
                     </table>
                     {{-- <a href="{{url('/home')}}" type="submit" class="btn btn-warning mb-3">Kembali</a> --}}
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection