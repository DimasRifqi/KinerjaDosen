<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dasbor</span>
            </a>
        </li>
        <li class="nav-item nav-category">Verifikasi</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#verifikasi" aria-expanded="false"
                aria-controls="verifikasi">
                <i class="menu-icon mdi mdi-account-multiple-outline"></i>
                <span class="menu-title">Anggota</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="verifikasi">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('verifikator.permohonan.index') }}">Dosen</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('oppt.indexPermohonan.dosen') }}">Dosen (POV OPPT)</a>
                        {{-- viewpage terpisah yang ada filter univ --}}
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="menu-icon mdi mdi mdi-file"></i>
                <span class="menu-title">Tunjangan</span>
                <i class="menu-arrow"></i>
            </a>

            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('verifikator.pengajuan.index') }}">Data
                            Pengajuan</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Anggota</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#all_user" aria-expanded="false"
                aria-controls="all_user">
                <i class="menu-icon mdi mdi-account-multiple"></i>
                <span class="menu-title">All User</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="all_user">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.index') }}">Data AllUser</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.create') }}">Pendaftaran AllUser</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#dosen" aria-expanded="false" aria-controls="dosen">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">Dosen</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="dosen">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Data Dosen</a>
                        {{-- route beda untuk pageview beda yang ada filter universitas --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('datadosenbelajar') }}">Data Dosen(belajar)</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pendaftaran Dosen</a>
                        {{-- route beda untuk pageview beda yang ada filter universitas --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('oppt.index.dosen') }}">Data Dosen (POV OPPT)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('super.dosen.create') }}">Pendaftaran Dosen (POV OPPT)</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#lldikti" aria-expanded="false" aria-controls="lldikti">
                <i class="menu-icon mdi mdi-home-variant"></i>
                <span class="menu-title">LLDIKTI</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="lldikti">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('super.lldikti.all') }}">Data Admin
                            LLDIKTI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.lldikti.create') }}">Pendaftaran Admin LLDIKTI</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#operator" aria-expanded="false"
                aria-controls="operator">
                <i class="menu-icon mdi mdi-library"></i>
                <span class="menu-title">Operator</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="operator">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('super.operator.all') }}">Data Operator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('super.operator.create') }}">Pendaftaran Operator</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auditor" aria-expanded="false"
                aria-controls="auditor">
                <i class="menu-icon mdi mdi-library-books"></i>
                <span class="menu-title">Auditor</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auditor">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('super.auditor.all') }}">Data Auditor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('super.auditor.create') }}">Pendaftaran Auditor</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#komponen_anggota" aria-expanded="false"
                aria-controls="komponen_anggota">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Komponen{{-- / Master Data --}}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="komponen_anggota">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kota.index') }}">Kota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('univ.index') }}">Instansi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.prodi') }}">Program Studi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jabatan-fungsional.index') }}">Jabatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.pangkat') }}">Pangkat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gelar-depan.merge') }}">Gelar Depan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gelar-belakang.merge') }}">Gelar Belakang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.bank') }}">Bank</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Tunjangan</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#pengajuan" aria-expanded="false"
                aria-controls="pengajuan">
                <i class="menu-icon mdi mdi-file-outline"></i>
                <span class="menu-title">Pengajuan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="pengajuan">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('oppt.pengajuanIndex.dosen') }}">Data
                            Pengajuan (POV OPPT)</a></li>
                    {{-- route beda untuk pageview beda yang ada filter universitas --}}
                    <li class="nav-item"><a class="nav-link" href="{{ route('oppt.pengajuan.dosen') }}">Buat
                            Pengajuan (POV OPPT)</a></li>
                    {{-- route beda untuk pageview beda yang ada filter universitas --}}
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#komponen" aria-expanded="false"
                aria-controls="komponen">
                <i class="menu-icon mdi mdi-calendar-text"></i>
                <span class="menu-title">Periode</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="komponen">
                <ul class="nav flex-column sub-menu">
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ route('periode.index') }}">(obselete) Data
                            Periode</a>
                    </li> --}}
                    <li class="nav-item"><a class="nav-link" href="{{ route('index.periode') }}">Detail</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Profil</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#profil" aria-expanded="false"
                aria-controls="profil">
                <i class="menu-icon mdi mdi-account-card-details"></i>
                <span class="menu-title">Profil</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="profil">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('profil') }}">Lihat Profil</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ route('faq') }}">FAQ</a></li> --}}
                    <li class="nav-item"><a class="nav-link" href="{{ route('setelan') }}">Setelan</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">Keluar
                            (popup warning)</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form> --}}
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Lainnya</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.faq.index') }}">
                {{-- melihat & mengedit faq --}}
                <i class="mdi mdi-help-circle-outline menu-icon"></i>
                <span class="menu-title">FAQ</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('faq_view') }}">
                {{-- hanya melihat faq, tanpa mengedit dll --}}
                <i class="mdi mdi-help-circle-outline menu-icon"></i>
                <span class="menu-title">FAQ (View Only)</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.informasi.index') }}">
                {{-- melihat & mengedit Informasi --}}
                <i class="mdi mdi-information-outline menu-icon"></i>
                <span class="menu-title">Informasi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('informasi_view') }}">
                {{-- hanya melihat informasi, tanpa mengedit dll --}}
                <i class="mdi mdi-information-outline menu-icon"></i>
                <span class="menu-title">Informasi (View Only)</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.permohonan.index') }}">
                {{-- hanya melihat informasi, tanpa mengedit dll --}}
                <i class="mdi mdi-information-outline menu-icon"></i>
                <span class="menu-title">Permohonan</span>
            </a>
        </li>

        <li class="nav-item">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick=    "event.preventDefault();
                        document.getElementById('logout-form').submit();">
                <i class="mdi mdi mdi-power menu-icon"></i>
                <span class="menu-title">Keluar
                    (popup warning)</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>
