@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="media align-items-center">
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
                    <p>{{ $data->deskripsi }}</p>
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
</div>
@endsection
