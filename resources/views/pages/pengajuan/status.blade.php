@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($data->isEmpty())
                <div class="alert alert-success" style="display: flex; flex-direction: column; align-items: center;">
                    <h4 class="alert-heading">Kamu Belum mengajukan Judul</h4>
                    <p class="m-b-0">Silahkan Ajukan judul terlebih dahulu</p>
                    <img src="{{ asset('images/avatars/nothings.png') }}" alt="proposal-accept" class="mt-3"
                        style="height: 600px;">
                    <button class="btn btn-success mt-3"onclick="window.location.href='{{ route('pengajuan') }}'">Ajukan Judul</button>
                </div>
            @else
                @foreach ($data as $d)
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="media align-items-center" style="display: flex">
                                <div class="avatar avatar-image rounded">
                                    @if ($userdata->mahasiswa->avatar)
                                        <img src="{{ asset('storage/' . $userdata->mahasiswa->avatar) }}" alt="">
                                    @else
                                        <img src="{{asset('images/avatars/user-profile.jpeg')}}" alt="">
                                    @endif
                                </div>
                                <div class="m-l-10">
                                    <h4 class="m-b-0">{{ auth()->user()->nama }}</h4>
                                </div>
                            </div>
                            <div>
                                @switch($d->status)
                                    @case('Pengajuan')
                                        <span class="badge badge-pill badge-warning">Menunggu Review</span>
                                    @break

                                    @case('Diterima')
                                        <span class="badge badge-pill badge-success">Diterima</span>
                                    @break

                                    @case('Ditolak')
                                        <span class="badge badge-pill badge-danger">Ditolak</span>
                                    @break

                                    @default
                                        <span class="badge badge-pill badge-danger">Belum Mengajukan</span>
                                @endswitch
                            </div>
                        </div>
                        <div class="m-t-40">
                            <h6>Judul:</h6>
                            <h6>{{ $d->judul }}</h6>

                        </div>
                        <div class="m-t-40">
                            <h6>Description:</h6>
                            <p>{{ $d->deskripsi }}</p>

                        </div>

                        <div class="d-md-flex m-t-30 align-items-center justify-content-between">
                            <div class="d-flex align-items-center m-t-10">
                                @if (!empty($d->pbb_1_dosen_id) || !empty($d->pbb_2_dosen_id))
                                    <span class="text-dark font-weight-semibold m-r-10 m-b-5">Dosen Pembimbing</span>
                                    <a class="m-r-5 m-b-5" href="javascript:void(0);" data-toggle="tooltip"
                                        title="Erin Gonzales">
                                        <div class="avatar avatar-image" style="width: 30px; height: 30px;">
                                            <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                        </div>
                                    </a>
                                    <a class="m-r-5 m-b-5" href="javascript:void(0);" data-toggle="tooltip"
                                        title="Darryl Day">
                                        <div class="avatar avatar-image" style="width: 30px; height: 30px;">
                                            <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                        </div>
                                    </a>
                                @else
                                    <h6>Belum memiliki Dosen Pembimbing</h6>
                                @endif

                            </div>
                            <div class="m-t-10">
                                <span class="font-weight-semibold m-r-10 m-b-5 text-dark">Due Date: </span>
                                <span>{{ $d->created_at }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-30">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Activities</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="timeline timeline-sm">
                                        @foreach ($logs as $l)
                                            @switch($l->status)
                                                @case('Pengajuan')
                                                    <li class="timeline-item">
                                                        <div class="timeline-item-head">
                                                            <div class="avatar avatar-icon avatar-sm avatar-gold">
                                                                <i class="anticon anticon-arrow-right"></i>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-item-content">
                                                            <div class="m-l-10">
                                                                <div class="media align-items-center" style="display: flex">
                                                                    <div class="m-l-10">
                                                                        <h6 class="m-b-0">{{ $l->status }}</h6>
                                                                        <span class="text-muted font-size-13">
                                                                            <i class="anticon anticon-clock-circle"></i>
                                                                            <span class="m-l-5">{{ $l->created_at }}</span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @break
                                                @case('Diterima')
                                                    <li class="timeline-item">
                                                        <div class="timeline-item-head">
                                                            <div class="avatar avatar-icon avatar-sm avatar-cyan">
                                                                <i class="anticon anticon-check"></i>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-item-content">
                                                            <div class="m-l-10">
                                                                <div class="media align-items-center" style="display: flex">
                                                                    <div class="m-l-10">
                                                                        <h6 class="m-b-0">{{ $l->status }}</h6>
                                                                        <span class="text-muted font-size-13">
                                                                            <i class="anticon anticon-clock-circle"></i>
                                                                            <span class="m-l-5">{{ $l->created_at }}</span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @break

                                                @case('Ditolak')
                                                <li class="timeline-item">
                                                    <div class="timeline-item-head">
                                                        <div class="avatar avatar-icon avatar-sm avatar-red">
                                                            <i class="anticon anticon-close"></i>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-item-content">
                                                        <div class="m-l-10">
                                                            <div class="media align-items-center" style="display: flex">
                                                                <div class="m-l-10">
                                                                    <h6 class="m-b-0">{{ $l->status }}</h6>
                                                                    <span class="text-muted font-size-13">
                                                                        <i class="anticon anticon-clock-circle"></i>
                                                                        <span class="m-l-5">{{ $l->created_at }}</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @break
                                                @default
                                            @endswitch

                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            @endif
        </div>
    </div>

    </div>
@endsection
