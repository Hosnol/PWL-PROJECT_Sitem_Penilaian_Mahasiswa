<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/mahasiswa') }}">Dashbord</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mahasiswa.jadwal',Auth::user()->mahasiswa->kelas_id) }}">Jadwal Kuliah</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mahasiswa.nilai', Auth::user()->mahasiswa->id) }}">Nilai</a>
        </li>
    </ul>
</div>