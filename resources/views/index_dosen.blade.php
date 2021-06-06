@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">{{ __('Dosen') }}</div>
                <div class="card-body">
                    <div class="float-right my-2 mr-sm-2">
                        <a class="btn btn-success" href="{{ route('dosen.create') }}"> Input Dosen </a>
                    </div>
                    <nav class="navbar">
                        <form class="form-inline" action="{{ route('dosen.index') }}" method="GET">
                            <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Cari dosen..."
                                aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </nav>
                    @if ($message=Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                    @endif
                    <div class="mt-2">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nip</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Email</th>
                                    <th>No Handphone</th>
                                    <th>Alamat</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($dsn as $dosen)
                                <tr>
                                    <td>{{$dosen->nip}}</td>
                                    <td>{{$dosen->nama}}</td>
                                    <td>{{$dosen->jk}}</td>
                                    <td>{{$dosen->email}}</td>
                                    <td>{{$dosen->nohp}}</td>
                                    <td>{{$dosen->alamat}}</td>
                                    <td><img width="100px" height="100px" src="{{asset('storage/'.$dosen->gambar)}}"></td>
                                    <td>
                                        <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST"
                                            onsubmit="return confirm('Anda yakin ingin menghapus data?')">
                                            <a class="btn btn-primary" href="{{ route('dosen.edit', $dosen->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $dsn->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
