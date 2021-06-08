<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/dosen') }}">Dashbord</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dosen.profil', Auth::user()->id ) }}">Profil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Nilai Mahasiswa</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">User</a>
        </li>
    </ul>
</div>