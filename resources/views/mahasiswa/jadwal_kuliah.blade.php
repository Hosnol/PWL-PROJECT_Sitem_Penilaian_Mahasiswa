@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">{{ __('Matakuliah') }}</div>
                <div class="card-body">
                    <div class="mt-2">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Hari</th>
                                    <th>Kelas</th>
                                    <th>Jam</th>
                                    <th>Matakuliah</th>
                                    <th>Dosen</th>
                                </tr>
                                @foreach ($jadwal as $j )
                                <tr>
                                    <td>{{ $j->hari }}</td>
                                    <td>{{ $j->kelas->nama_kelas }} </td>
                                    <td>{{ $j->jam_mulai }} - {{ $j->jam_selesai }}</td>
                                    <td>{{ $j->matakuliah->nama_matkul }}</td>
                                    <td>{{ $j->dosen->nama }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection