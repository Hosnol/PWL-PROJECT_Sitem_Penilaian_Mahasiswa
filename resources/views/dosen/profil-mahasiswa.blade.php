@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Datail Mahasiswa') }}</div>

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <img class="rounded float-left" width="200px" height="200px"
                                src="{{asset('storage/'.$Mahasiswa->foto)}}">
                        </div>

                        <div class="form-group mt-4 col-md-2">
                            <p><b>NIM <p>
                                        <p>Nama </p>
                                        <p>Kelas</p>
                                        <p>Jenis Kelamin</p></b>
                        </div>

                        <div class="form-group mt-4 ">
                            <p> {{ $Mahasiswa->nim }} </p>
                            <p> {{ $Mahasiswa->nama }} </p>
                            <p> {{ $Mahasiswa->kelas->nama_kelas }} </p>
                            <p> {{ $Mahasiswa->jk }} </p>
                        </div>
                    </div>
                    @if ($message=Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                    @endif

                    @if ($message=Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{$message}}</p>
                    </div>
                    @endif
                    <div class="mt-2">
                        <div class="float-right my-2 mr-sm-2">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#exampleModal">
                                Tambah Nilai
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Matakuliah</th>
                                    <th>SKS</th>
                                    <th>Nilai</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($Mahasiswa->matakuliah as $no => $mapel )
                                <tr>
                                    <td>{{ ++$no}}</td>
                                    <td>{{ $mapel->nama_matkul }}</td>
                                    <td>{{ $mapel->sks }}</td>
                                    <td>{{ $mapel->pivot->nilai }}</td>
                                    <td>
                                        <form action="{{ route('dosen.deletenilai',['id'=>$Mahasiswa->id, 'matakuliah_id'=>$mapel->id])}}" method="POST"
                                            onsubmit="return confirm('Anda yakin ingin menghapus data?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <a class="btn btn-primary" href="{{ route('dosen.mahasiswa') }}">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('dosen.addnilai', $Mahasiswa->id) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="matkul">Matakuliah</label>
                        <select class="form-control" name="matakuliah">
                            @foreach ($matkul as $mk)
                            <option value="{{ $mk->id }}">{{ $mk->nama_matkul }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="text" name="nilai" class="form-control" aria-describedby="nilai">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
