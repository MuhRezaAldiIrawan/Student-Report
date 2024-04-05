@extends('layout.main')

@section('content')
    <div class="page-header no-gutters">
        <div class="row align-items-md-center">
            <div class="col-md-6">
                <div class="media m-v-10">
                    <div class="avatar avatar-cyan avatar-icon avatar-square">
                        <i class="anticon anticon-star"></i>
                    </div>
                    <div class="media-body m-l-15">
                        <h6 class="mb-0">All Members ()</h6>
                        <span class="text-gray font-size-13">{{auth()->user()->nama}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-md-right m-v-10">
                    <div class="btn-group">
                        <button id="card-view-btn" type="button" class="btn btn-default btn-icon active">
                            <i class="anticon anticon-appstore"></i>
                        </button>
                        <button id="list-view-btn" type="button" class="btn btn-default btn-icon">
                            <i class="anticon anticon-ordered-list"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11 mx-auto">
            <!-- Card View -->
            <div class="row" id="card-view">
                @foreach ($mahasiswa as $m )
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="m-t-20 text-center">
                                <div class="avatar avatar-image" style="height: 100px; width: 100px;">
                                    @if ($m->avatar)
                                    <img src="{{ asset('storage/' . $m->avatar) }}" alt=""
                                        class="mb-5 h-24 w-24 rounded-full object-cover">
                                    @else
                                        <img src="{{ asset('images/avatars/user-profile.jpeg') }}" alt=""
                                            class="mb-5 h-24 w-24 rounded-full object-cover">
                                    @endif
                                </div>
                                <h4 class="m-t-30">{{$m->user->nama}}</h4>
                                <small>{{$m->nim}}</small>
                                <p>{{$m->user->email}}</p>
                            </div>
                            <div class="text-center m-t-15">
                                <small>Judul Mahasiswa</small>
                            </div>
                            <div class="text-center m-t-30">
                                <a href="profile.html" class="btn btn-primary btn-tone">
                                    <i class="anticon anticon-mail"></i>
                                    <span class="m-l-5">Contact</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row d-none" id="list-view">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>NIM</th>
                                                <th>Email</th>
                                                <th>Judul</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mahasiswa as $m)
                                            <tr>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <div class="avatar avatar-image">
                                                            <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                        </div>
                                                        <div class="media-body m-l-15">
                                                            <h6 class="mb-0">{{$m->user->nama}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$m->nim}}</td>
                                                <td>{{$m->user->email}}</td>
                                                <td>Judul</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/pages/profile.js') }}"></script>
@endpush
