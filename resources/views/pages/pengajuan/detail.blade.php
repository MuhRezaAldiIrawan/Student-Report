@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="media align-items-center" style="display: flex">
                            <div class="avatar avatar-image rounded">
                                @if ($userdata->mahasiswa->avatar)
                                    <img src="{{ asset('storage/' . $userdata->mahasiswa->avatar) }}" alt="">
                                @else
                                    <img src="{{ asset('images/avatars/user-profile.jpeg') }}" alt="">
                                @endif
                            </div>
                            <div class="m-l-10">
                                <h4 class="m-b-0">{{ $data->user->nama }}</h4>
                            </div>
                        </div>
                        <div>
                            @switch($data->status)
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
                        <p>{{ $data->judul }}</p>
                    </div>
                    <div class="m-t-40">
                        <h6>Description:</h6>
                        <p style="text-align: justify">{{ $data->deskripsi }}</p>
                    </div>
                    <div class="d-md-flex m-t-30 align-items-center justify-content-between">
                        <div class="d-flex align-items-center m-t-10">
                            <span class="text-dark font-weight-semibold m-r-10 m-b-5">Team: </span>
                            <a class="m-r-5 m-b-5" href="{{ route('download.proposal', $data->id) }}">Download proposal</a>
                        </div>
                        <div class="m-t-10">
                            <span class="font-weight-semibold m-r-10 m-b-5 text-dark">Tanggal Pengajuan: </span>
                            <span>{{ $data->created_at }}</span>
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
                        @if ($data->status == 'Diterima')
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
                                                <button class="btn btn-success btn-block btn-tone m-r-5">Proposal Diterima</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @elseif ($data->status == 'Ditolak')
                        <li class="timeline-item">
                            <div class="timeline-item-head">
                                <div class="avatar avatar-icon avatar-sm avatar-red">
                                    <i class="anticon anticon-check"></i>
                                </div>
                            </div>
                            <div class="timeline-item-content">
                                <div class="m-l-10">
                                    <div class="media">
                                        <div class="m-l-10">
                                            <button class="btn btn-danger btn-block btn-tone m-r-5">Proposal Ditolak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @else
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
                                                <button class="btn btn-success btn-block btn-tone m-r-5" id="approve"
                                                    data-id="{{ $data->id }}">Terima</button>
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
                                                <button class="btn btn-danger btn-block btn-tone m-r-5" id="reject"
                                                    data-id="{{ $data->id }}">Tolak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pembimbing</h4>
                </div>
                <div class="card-body">
                    <ul class="timeline timeline-sm">
                        @if ($data->status == 'Diterima' && $data->pbb_1_dosen_id == null && $data->pbb_2_dosen_id == null)
                            <li class="timeline-item">
                                <div class="timeline-item-head">
                                    <div class="avatar avatar-icon avatar-sm avatar-blue">
                                        <i class="anticon anticon-check"></i>
                                    </div>
                                </div>
                                <div class="timeline-item-content">
                                    <div class="m-l-10">
                                        <div class="media">
                                            <div class="m-l-10">
                                                <button class="btn btn-info btn-block btn-tone m-r-5 btn-assign"
                                                    data-id="{{ $data->id }}">Berikan Pembimbing</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @elseif ($data->status == 'Diterima' && $data->pbb_1_dosen_id != null && $data->pbb_2_dosen_id != null)
                            @foreach ($dosenDetail as $d)
                            <li class="timeline-item">
                                <div class="timeline-item-head">
                                    <div class="avatar avatar-icon avatar-sm avatar-cyan">
                                        <i class="anticon anticon-check"></i>
                                    </div>
                                </div>
                                <div class="timeline-item-content">
                                    <div class="m-l-10">
                                        <div class="media align-items-center" style="display: flex">
                                            <div class="avatar avatar-image">
                                                @if ($d->avatar)
                                                <img src="{{ asset('storage/' . $d->avatar) }}" alt=""
                                                    class="mb-5 h-24 w-24 rounded-full object-cover">
                                                @else
                                                    <img src="{{ asset('images/avatars/user-profile.jpeg') }}" alt=""
                                                        class="mb-5 h-24 w-24 rounded-full object-cover">
                                                @endif
                                            </div>
                                            <div class="m-l-10">
                                                <h6 class="m-b-0">{{$d->user->nama}}</h6>
                                                <span class="text-muted font-size-13">
                                                    <i class="anticon anticon-mail"></i>
                                                    <span class="m-l-5">{{$d->user->email}}</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-edit" style="display: none;" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true"></div>


@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '#approve', function(e) {
            let id = $(this).data('id');
            let url = "/approve/" + id;
            const home = "/list_pengajuan";
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url,
                        type: 'GET',
                        dataType: 'JSON',
                        success: function(data) {
                            if ($.isEmptyObject(data.error)) {
                                Swal.fire({
                                    title: 'Success',
                                    text: data.success,
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: true
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = home;
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: data.error,
                                    icon: "error",
                                    timer: 2000,
                                    showConfirmButton: true
                                });
                            }
                        },
                        error: function(error) {
                            console.error(error);
                        }
                    });
                }
            });
            // console.log('berhasil ditekan tobol approve dengan id = ',id);
        });
    </script>
    <script>
        $(document).on('click', '#reject', function(e) {
            let id = $(this).data('id');
            let url = "/reject/" + id;
            const home = "/list_pengajuan";
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reject it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url,
                        type: 'GET',
                        dataType: 'JSON',
                        success: function(data) {
                            if ($.isEmptyObject(data.error)) {
                                Swal.fire({
                                    title: 'Success',
                                    text: data.success,
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: true
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = home;
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: data.error,
                                    icon: "error",
                                    timer: 2000,
                                    showConfirmButton: true
                                });
                            }
                        },
                        error: function(error) {
                            console.error(error);
                        }
                    });
                }
            });
            // console.log('berhasil ditekan tobol approve dengan id = ',id);
        });
    </script>

    <script>
        $(document).on('click', '.btn-assign', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let url = "/modal-assign/" + id;
            $(this).prop('disabled', true);
            $.ajax({
                url,
                data: {
                    id
                },
                type: "GET",
                dataType: "HTML",
                success: function(data) {
                    $('#editmodal').html(data);
                    $('#editmodal').modal('show');
                    $('.btn-assign').prop("disabled", false);
                },
                error: function(error) {
                    console.error(error);
                    $('.btn-assign').prop('disabled', false);
                }
            })
        })
    </script>

    <script>
        $(document).on('click', '#cancelbtn', function(e) {
            console.log('button ditekan');
            e.preventDefault();
            $('#editmodal').modal('hide');
        })
    </script>

    <script>
        $(document).on('submit', '#formassign', function(e) {

            console.log('form di submit');
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('update.pembimbing') }}";
            $('#saveform').prop("disabled", true);
            $('#saveform').html("Loading...");
            $.ajax({
                url,
                data: formData,
                type: "POST",
                dataType: "JSON",
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    Swal.fire({
                        title: 'Success',
                        text: data.success,
                        icon: "success",
                        timer: 2000
                    });
                    $('#editmodal').modal('hide');
                    $('#saveform').prop("disabled", false);
                    location.reload();
                },
                error: function(error) {
                    console.error(error);
                    $('#saveform').prop("disabled", false);
                }
            })
        })
    </script>
@endpush



