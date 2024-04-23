@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="media align-items-center" style="display: flex">
                        <div class="avatar avatar-image rounded">
                            <img src="assets/images/others/thumb-3.jpg" alt="">
                        </div>
                        <div class="m-l-10">
                            <h4 class="m-b-0">{{ $data->user->nama }}</h4>
                        </div>
                    </div>
                    <div>
                        <span class="badge badge-pill badge-warning">Diajukan</span>
                    </div>
                </div>
                <div class="m-t-40">
                    <h6>Judul:</h6>
                    <p>{{ $data->judul }}</p>
                </div>
                <div class="m-t-40">
                    <h6>Description:</h6>
                    <p style="text-align: justify">{{ $data->deskripsi }}</p>
                </div>
                <div class="d-md-flex m-t-30 align-items-center justify-content-between">
                    <div class="d-flex align-items-center m-t-10">
                        <span class="text-dark font-weight-semibold m-r-10 m-b-5">Team: </span>
                        <a class="m-r-5 m-b-5" href="{{route('download.proposal', $data->id)}}">Download proposal</a>
                    </div>
                    <div class="m-t-10">
                        <span class="font-weight-semibold m-r-10 m-b-5 text-dark">Tanggal Pengajuan: </span>
                        <span>{{$data->created_at}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Action</h4>
            </div>
            <div class="card-body">
                <ul class="timeline timeline-sm">
                    <li class="timeline-item">
                        <div class="timeline-item-head">
                            <div class="avatar avatar-icon avatar-sm avatar-cyan">
                                <i class="anticon anticon-check"></i>
                            </div>
                        </div>
                        <div class="timeline-item-content">
                            <div class="m-l-10">
                                <div class="media">
                                    <div class="m-l-10">
                                        <button class="btn btn-success btn-block btn-tone m-r-5">Terima</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-item-head">
                            <div class="avatar avatar-icon avatar-sm avatar-red">
                                <i class="anticon anticon-close"></i>
                            </div>
                        </div>
                        <div class="timeline-item-content">
                            <div class="m-l-10">
                                <div class="media">
                                    <div class="m-l-10">
                                        <button class="btn btn-danger btn-block btn-tone m-r-5">Tolak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
