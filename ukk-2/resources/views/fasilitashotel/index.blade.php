@extends('starter-admin')

@section('isi')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card" style="overflow-x:auto">
                <div class="card-body">
                    <h1 class="text-center">Data Fasilitas Hotel</h1>
                    <!-- @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                    @endif -->
                    <a href="{{ route('create-fh')}}" class="btn btn-info">Tambah Data</a>

                    <!-- table -->

                    <table class="table">
                        <thead>
                            <tr scope="row">
                                <th>No</th>
                                <th>Nama Fasilitas</th>
                                <th>Keterangan</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datafasilhotel as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->nama_fasilitas}}</td>
                                <td>{{$item->keterangan}}</td>
                                <td>
                                <img src="{{ asset('gambarFasilitas/'.$item->gambar) }}" alt="" style="width: 100px;">
                                </td>
                                <td>
                                    <a href="{{ url('edit-fh', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ url('delete-fh', $item->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{url('/home')}}" type="submit" class="btn btn-warning mb-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection