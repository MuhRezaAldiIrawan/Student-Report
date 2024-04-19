@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            @foreach ($data as $d)
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="media align-items-center">
                        <div class="avatar avatar-image rounded">
                            <img src="assets/images/others/thumb-3.jpg" alt="">
                        </div>
                        <div class="m-l-10">
                            <h4 class="m-b-0">{{auth()->user()->nama}}</h4>
                        </div>
                    </div>
                    <div>
                        <span class="badge badge-pill badge-blue">{{$d->status}}</span>
                    </div>
                </div>
                <div class="m-t-40">
                    <h6>Judul:</h6>
                        <h6>{{$d->judul}}</h6>

                </div>
                <div class="m-t-40">
                    <h6>Description:</h6>
                    <p>{{$d->deskripsi}}</p>

                </div>

                <div class="d-md-flex m-t-30 align-items-center justify-content-between">
                    <div class="d-flex align-items-center m-t-10">
                        @if (!empty($d->pbb_1_dosen_id) || !empty($d->pbb_2_dosen_id))
                        <span class="text-dark font-weight-semibold m-r-10 m-b-5">Dosen Pembimbing</span>
                            <a class="m-r-5 m-b-5" href="javascript:void(0);" data-toggle="tooltip" title="Erin Gonzales">
                                <div class="avatar avatar-image" style="width: 30px; height: 30px;">
                                    <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                </div>
                            </a>
                            <a class="m-r-5 m-b-5" href="javascript:void(0);" data-toggle="tooltip" title="Darryl Day">
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
                        <span>{{$d->created_at}}</span>
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
                                <li class="timeline-item">
                                    <div class="timeline-item-head">
                                        <div class="avatar avatar-icon avatar-sm avatar-cyan">
                                            <i class="anticon anticon-check"></i>
                                        </div>
                                    </div>
                                    <div class="timeline-item-content">
                                        <div class="m-l-10">
                                            <div class="media align-items-center">
                                                <div class="avatar avatar-image">
                                                    <img src="assets/images/avatars/thumb-4.jpg" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <h6 class="m-b-0">Virgil Gonzales</h6>
                                                    <span class="text-muted font-size-13">
                                                        <i class="anticon anticon-clock-circle"></i>
                                                        <span class="m-l-5">10:44 PM</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="m-t-20">
                                                <p class="m-l-20">
                                                    <span class="text-dark font-weight-semibold">Complete task </span>
                                                    <span class="m-l-5"> Prototype Design</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-item-head">
                                        <div class="avatar avatar-icon avatar-sm avatar-blue">
                                            <i class="anticon anticon-link"></i>
                                        </div>
                                    </div>
                                    <div class="timeline-item-content">
                                        <div class="m-l-10">
                                            <div class="media align-items-center">
                                                <div class="avatar avatar-image">
                                                    <img src="assets/images/avatars/thumb-8.jpg" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <h6 class="m-b-0">Lilian Stone</h6>
                                                    <span class="text-muted font-size-13">
                                                        <i class="anticon anticon-clock-circle"></i>
                                                        <span class="m-l-5">8:34 PM</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="m-t-20">
                                                <p class="m-l-20">
                                                    <span class="text-dark font-weight-semibold">Attached file </span>
                                                    <span class="m-l-5"> Mockup Zip</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-item-head">
                                        <div class="avatar avatar-icon avatar-sm avatar-purple">
                                            <i class="anticon anticon-message"></i>
                                        </div>
                                    </div>
                                    <div class="timeline-item-content">
                                        <div class="m-l-10">
                                            <div class="media align-items-center">
                                                <div class="avatar avatar-image">
                                                    <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <h6 class="m-b-0">Erin Gonzales</h6>
                                                    <span class="text-muted font-size-13">
                                                        <i class="anticon anticon-clock-circle"></i>
                                                        <span class="m-l-5">8:34 PM</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="m-t-20">
                                                <p class="m-l-20">
                                                    <span class="text-dark font-weight-semibold">Commented  </span>
                                                    <span class="m-l-5"> 'This is not our work!'</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-item-head">
                                        <div class="avatar avatar-icon avatar-sm avatar-purple">
                                            <i class="anticon anticon-message"></i>
                                        </div>
                                    </div>
                                    <div class="timeline-item-content">
                                        <div class="m-l-10">
                                            <div class="media align-items-center">
                                                <div class="avatar avatar-image">
                                                    <img src="assets/images/avatars/thumb-6.jpg" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <h6 class="m-b-0">Riley Newman</h6>
                                                    <span class="text-muted font-size-13">
                                                        <i class="anticon anticon-clock-circle"></i>
                                                        <span class="m-l-5">8:34 PM</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="m-t-20">
                                                <p class="m-l-20">
                                                    <span class="text-dark font-weight-semibold">Commented  </span>
                                                    <span class="m-l-5"> 'Hi, please done this before tommorow'</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-item-head">
                                        <div class="avatar avatar-icon avatar-sm avatar-red">
                                            <i class="anticon anticon-delete"></i>
                                        </div>
                                    </div>
                                    <div class="timeline-item-content">
                                        <div class="m-l-10">
                                            <div class="media align-items-center">
                                                <div class="avatar avatar-image">
                                                    <img src="assets/images/avatars/thumb-7.jpg" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <h6 class="m-b-0">Pamela Wanda</h6>
                                                    <span class="text-muted font-size-13">
                                                        <i class="anticon anticon-clock-circle"></i>
                                                        <span class="m-l-5">8:34 PM</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="m-t-20">
                                                <p class="m-l-20">
                                                    <span class="text-dark font-weight-semibold">Removed  </span>
                                                    <span class="m-l-5"> a file</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-item-head">
                                        <div class="avatar avatar-icon avatar-sm avatar-gold">
                                            <i class="anticon anticon-file-add"></i>
                                        </div>
                                    </div>
                                    <div class="timeline-item-content">
                                        <div class="m-l-10">
                                            <div class="media align-items-center">
                                                <div class="avatar avatar-image">
                                                    <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <h6 class="m-b-0">Marshall Nichols</h6>
                                                    <span class="text-muted font-size-13">
                                                        <i class="anticon anticon-clock-circle"></i>
                                                        <span class="m-l-5">5:21 PM</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="m-t-20">
                                                <p class="m-l-20">
                                                    <span class="text-dark font-weight-semibold">Create  </span>
                                                    <span class="m-l-5"> this project</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
