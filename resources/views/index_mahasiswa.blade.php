@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">{{ __('Mahasiswa') }}</div>
                <div class="card-body">
                    <div class="float-right my-2 mr-sm-2">
                        <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa </a>
                    </div>
                    <nav class="navbar">
                        <form class="form-inline" action="{{ route('mahasiswa.index') }}" method="GET">
                            <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Cari mahasiswa..."
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
                        <div class="table-responsive-sm">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nim</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>No Handphone</th>
                                    <th>Alamat</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($mhs as $m)
                                <tr>
                                    <td>{{ $m->nim }}</td>
                                    <td>{{ $m->nama }}</td>
                                    <td>{{ $m->kelas->nama_kelas }}</td>
                                    <td>{{ $m->nohp }}</td>
                                    <td>{{ $m->alamat }}</td>
                                    <td><img width="100px" height="100px" src="{{ asset('storage/'.$m->foto) }}"></td>
                                    <td>
                                        <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST"
                                            onsubmit="return confirm('Anda yakin ingin menghapus data?')">
                                            <a class="btn btn-primary" href="{{ route('mahasiswa.edit', $m->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $mhs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
