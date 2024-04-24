@extends('layout.main')

@section('content')
<div class="page-header">
    <h2 class="header-title">Ajukan Judul</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>data judul</a>
            <a class="breadcrumb-item" href="#">Forms</a>
            <span class="breadcrumb-item active">Form judul</span>
        </nav>
    </div>
</div>
    <div class="card">
        <div class="card-body">
            @if ($check && $check->user_id == auth()->user()->id && $check->status == 'Pengajuan')
            <div class="alert alert-success" >
                <h4 class="alert-heading">Well done!</h4>
                <p class="m-b-0">Kamu telah selesai mengajukan judul. silahkan tunggu review dari judul yang anda telah ajukan sebelumnya. untuk melihat status judul anda dapat klik tombol dibawah</p>
                <button class="btn btn-success mt-3" onclick="window.location.href='{{ route('status.proposal') }}'">Lihat Status</button>
                <hr class="m-v-20">
                <p class="m-b-0">Terima Kasih </p>
            </div>
            @elseif ($check && $check->user_id == auth()->user()->id && $check->status == 'Diterima')
            <div class="alert alert-success" style="display: flex; flex-direction: column; align-items: center;">
                <h4 class="alert-heading">Well done!</h4>
                <p class="m-b-0">Judul yang kamu ajukan telah diterima!!!</p>
                <img src="{{ asset('images/avatars/proposal-accepts.jpg') }}" alt="proposal-accept" class="mt-3" style="height: 600px;">
                <button class="btn btn-success mt-3" onclick="window.location.href='{{ route('status.proposal') }}'">Lihat Status</button>
            </div>
            @else
            <form  method="POST" enctype="multipart/form-data" id="pengajuan">
                @csrf
                <input type="text" name="user_id" id="user_id" value="{{ auth()->user()->id }}" hidden>
                <div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label">Judul Proposal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputJudul" placeholder="judul Proposal" name="judul">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="inputJudul" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" aria-label="With textarea" name="deskripsi"></textarea>
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="inputJudul" class="col-sm-2 col-form-label">file skripsi</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="file">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row" hidden>
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="status" style="background: #6ECB63" placeholder="judul Proposal" name="status" value="Pengajuan">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('vendors/jquery-validation/jquery.validate.min.js')}}"></script>
<script>
    $(document).on('submit', '#pengajuan', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        let url = "{{ route('pengajuan.store') }}";
        const home = "/dashboard";
        $.ajax({
            url,
            data: formData,
            type: "POST",
            dataType: "JSON",
            cache: false,
            processData: false,
            contentType: false,

            beforeSend: function() {
                Swal.fire({
                    title: 'Loading...',
                    html: 'Please wait while we are uploading your data.',
                    icon: "info",
                    showConfirmButton: false
                });
            },
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
                        title: 'Failed',
                        icon: "error",
                        text: data.error,
                        showConfirmButton: true,
                        confirmButtonText: "Ok",
                        confirmButtonColor: "#DD6B55",
                    });

                }
            },
            error: function(error) {
                console.error(error);

            }
        })
    })
</script>
@endpush
