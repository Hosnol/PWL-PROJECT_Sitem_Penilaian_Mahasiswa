@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">{{ __('Daftar Mahasiswa') }}</div>
                <div class="card-body">
                    <nav class="navbar">
                        <form class="form-inline" action="{{ route('dosen.mahasiswa') }}" method="GET">
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
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Foto</th>
                                    <th>Nim</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kelas</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($mhs as $m)
                                <tr>
                                    <td><img width="100px" height="100px" src="{{ asset('storage/'.$m->foto) }}"></td>
                                    <td>{{ $m->nim }}</td>
                                    <td>{{ $m->nama }}</td>
                                    <td>{{ $m->jk }}</td>
                                    <td>{{ $m->kelas->nama_kelas }}</td>
                                    <td>
                                            <a class="btn btn-success" href="{{ route('dosen.profil-mahasiswa', $m->id) }}">Input Nilai</a>
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
