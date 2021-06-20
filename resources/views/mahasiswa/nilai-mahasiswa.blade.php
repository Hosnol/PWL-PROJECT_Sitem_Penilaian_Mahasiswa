@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">{{ __('Nilai') }}</div>
                <div class="card-body">
                        <p><b>Nama  : </b>{{ $Mahasiswa->nama }}
                        <p><b>NIM   : </b>{{ $Mahasiswa->nim }}
                        <p><b>Kelas : </b>{{ $Mahasiswa->kelas->nama_kelas }}
                    <div class="mt-2">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Matakuliah</th>
                                    <th>SKS</th>
                                    <th>Nilai</th>
                                </tr>
                                @foreach ($Mahasiswa->matakuliah as $item )
                                <tr>
                                    <td>{{ $item->nama_matkul }}</td>
                                    <td>{{ $item->sks }} </td>
                                    <td>{{ $item->pivot->nilai }}</td>
                                </tr>
                                @endforeach
                            </table>
                            <a class="btn btn-danger" href="{{ route('mahasiswa.cetak', $Mahasiswa->id) }}">Cetak Ke PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection