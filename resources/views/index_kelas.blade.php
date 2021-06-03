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
                            Input Kelas
                        </button>
                    </div>
                    <nav class="navbar">
                        <form class="form-inline" action="{{ route('kelas.index') }}" method="GET">
                            <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Cari kelas..."
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
                                    <th>No</th>
                                    <th>Nama kelas</th>
                                    <th>Jumlah mahasiswa</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($kls as $no => $kelas)
                                <tr>
                                    <td>{{ $no + $kls->firstItem() }}</td>
                                    <td>{{ $kelas->nama_kelas}}</td>
                                    <td>{{ $kelas->mahasiswa->count()}}</td>
                                    <td>
                                        <form action="{{ route('kelas.destroy', $kelas->id) }}" method="POST"
                                            onsubmit="return confirm('Anda yakin ingin menghapus data?')">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModalCenter2">
                                                Edit
                                            </button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $kls->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal add -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('kelas.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_kelas">Nama kelas</label>
                        <input type="text" name="nama_kelas" class="form-control" required="required" id="nama_kelas"
                            aria-describedby="nama_kelas">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Modal edit -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('kelas.update', $kelas->id) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_kelas">Nama kelas</label>
                            <input type="text" name="nama_kelas" class="form-control" required="required"
                                id="nama_kelas" aria-describedby="nama_kelas" value="{{ $kelas->nama_kelas }}">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
