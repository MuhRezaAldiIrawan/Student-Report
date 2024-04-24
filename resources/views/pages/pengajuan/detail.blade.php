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
                                    <img src="assets/images/others/thumb-3.jpg" alt="">
                                @endif
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
@endpush
