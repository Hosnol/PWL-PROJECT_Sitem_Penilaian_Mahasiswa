@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">{{ __('Jadwal') }}</div>
                <div class="card-body">
                    <div class="float-right my-2 mr-sm-2">
                        <a class="btn btn-success" href="{{ route('jadwal.create') }}"> Input Jadwal </a>
                    </div>
                    <nav class="navbar">
                        <form class="form-inline" action="{{ route('jadwal.index') }}" method="GET">
                            <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Cari data jadwal..."
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
                                    <th>Hari</th>
                                    <th>Kelas</th>
                                    <th>Jam</th>
                                    <th>Matakuliah</th>
                                    <th>Dosen</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($jadwal as $j )
                                <tr>
                                    <td>{{ $j->hari }}</td>
                                    <td>{{ $j->kelas->nama_kelas }} </td>
                                    <td>{{ $j->jam_mulai }} - {{ $j->jam_selesai }}</td>
                                    <td>{{ $j->matakuliah->nama_matkul }}</td>
                                    <td>{{ $j->dosen->nama }}</td>
                                    <td>
                                        <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST"
                                            onsubmit="return confirm('Anda yakin ingin menghapus data?')">
                                            <a class="btn btn-primary" href="{{ route('jadwal.edit', $j->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $jadwal->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
