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
                         <thead  class="">
                           <tr>
                               <th scope="col">#</th>
                               
                               <th scope="col">Nama Tamu</th>
                               <th scope="col">Tgl. Check In</th>
                               <th scope="col">Tgl. Check Out</th>
                               <th scope="col">Option</th>
   
                             </tr>
                           </thead>
                           <tbody>
                               @foreach ($data as $item)
                       
                             <tr>
                               <th scope="row">{{$loop->iteration}}</th>
                               
                               <td>{{ $item->namatamu }}</td>
                               <td>{{ $item->tglcekin }}</td>
                               <td>{{ $item->tglcekout }}</td>
                               
   
                               <td>
                                   <form action="{{ url('hapus', $item->id)}}" method="POST">
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