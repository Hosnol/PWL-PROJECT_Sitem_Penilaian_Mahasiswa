@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">{{ __('Matakuliah') }}</div>
                <div class="card-body">
                    <div class="float-right my-2 mr-sm-2">
                        <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#exampleModalCenter">
                            Input Matakuliah
                        </button>
                    </div>
                    <nav class="navbar">
                        <form class="form-inline" action="{{ route('matakuliah.index') }}" method="GET">
                            <input class="form-control mr-sm-2" type="search" name="cari"
                                placeholder="Cari matakuliah..." aria-label="Search">
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
                                    <th>No</th>
                                    <th>Nama Matakuliah</th>
                                    <th>SKS</th>
                                    <th>Jam</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($mk as $no => $matakuliah)
                                <tr>
                                    <td>{{ $no + $mk->firstItem() }}</td>
                                    <td>{{$matakuliah->nama_matkul}}</td>
                                    <td>{{$matakuliah->sks}}</td>
                                    <td>{{$matakuliah->jam}}</td>
                                    <td>
                                        <form action="{{ route('matakuliah.destroy', $matakuliah->id) }}" method="POST"
                                            onsubmit="return confirm('Anda yakin ingin menghapus data?')">
                                            <a class="btn btn-primary"
                                                href="{{ route('matakuliah.edit', $matakuliah->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $mk->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah matakuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('matakuliah.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="matkul">Nama matakuliah</label>
                        <input type="text" name="nama_matkul" class="form-control" id="nama_matkul"
                            aria-describedby="nama_matkul">
                    </div>

                    <div class="form-group">
                        <label for="sks">Sks</label>
                        <input type="sks" name="sks" class="form-control" id="sks" aria-describedby="sks">
                    </div>

                    <div class="form-group">
                        <label for="jam">Jam</label>
                        <input type="jam" name="jam" class="form-control" id="jam" aria-describedby="jam">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
