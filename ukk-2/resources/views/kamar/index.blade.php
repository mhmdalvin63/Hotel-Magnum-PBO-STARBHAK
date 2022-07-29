@extends('starter')

@section('isi')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card" style="overflow-x:auto">
                <div class="card-body">
                    <h1 class="text-center">Data Kamar</h1>
                    <!-- @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                    @endif -->
                    <a href="{{ route('create')}}" class="btn btn-info">Tambah Data</a>

                    <!-- table -->

                    <table class="table">
                        <thead>
                            <tr scope="row">
                                <th>No</th>
                                <th>Tipe Kamar</th>
                                <th>Nama Fasilitas</th>
                                <th>Jumlah Kamar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datakamar as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->tipe_kamar}}</td>
                                <td>{{$item->nama_fasilitas}}</td>
                                <td>{{$item->jumlah_kamar}}</td>
                                <td>
                                    <a href="{{ url('edit-kamar', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ url('delete-kamar', $item->id) }}" method="POST">
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