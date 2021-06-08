@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Biodata Dosen') }}</div>

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <img class="rounded float-left" width="200px" height="200px" src="{{asset('storage/'.$dsn->gambar)}}">
                        </div>

                        <div class="form-group col-md-2">
                            <p><b>NIP <p>
                            <p>Nama </p>
                            <p>Email</p>
                            <p>Alamat</p></b>
                        </div>

                        <div class="form-group">
                            <p> {{ $dsn->nip }} </p>
                            <p> {{ $dsn->nama }} </p>
                            <p> {{ $dsn->email }} </p>
                            <p> {{ $dsn->alamat }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
