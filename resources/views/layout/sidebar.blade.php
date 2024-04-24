
<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown mt-3">
                <a href="/dashboard">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>


            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fas fa-book"></i>
                    </span>
                    <span class="title">Proposal</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    @if (auth()->user()->role == 'Mahasiswa')
                    <li class="nav-item dropdown">
                        <a href="{{route('pengajuan')}}">
                            <span class="title">Ajukan Judul</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('status.proposal')}}">status proposal</a>
                    </li>
                    @elseif (auth()->user()->role == 'Dosen' || auth()->user()->role == 'Admin')
                    <li>
                        <a href="{{route('list.pengajuan')}}">List Pengajuan</a>
                    </li>

                    <li>
                        <a href="{{route('list.pengajuan.diterima')}}">Proposal Diterima</a>
                    </li>

                    <li>
                        <a href="{{route('list.pengajuan.ditolak')}}">Proposal Ditolak</a>
                    </li>
                    @endif
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="{{route('bimbingan')}}">
                    <span class="icon-holder">
                        <i class="fab fa-weixin"></i>
                    </span>
                    <span class="title">Mahasiswa Bimbingan</span>
                </a>
            </li>

            @if (auth()->user()->role == 'Dosen' || auth()->user()->role == 'Admin')
            <li class="nav-item dropdown">
                <a href="/dosen">
                    <span class="icon-holder">
                        <i class="fas fa-user-tie"></i>
                    </span>
                    <span class="title">Dosen</span>
                </a>
            </li>


            <li class="nav-item dropdown">
                <a href="{{route('mahasiswa')}}">
                    <span class="icon-holder">
                        <i class="fas fa-user-graduate"></i>
                    </span>
                    <span class="title">Mahasiswa</span>
                </a>
            </li>
            @endif
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fas fa-user-cog"></i>
                    </span>
                    <span class="title">User</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/user-profile">Profile</a>
                    </li>
                    <li>
                        <a href="/user-setting">User Setting</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
