@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h4 class="mr-auto">Dosen</h4>
                <button class="btn btn-default btn-success btn-tone  btn-import" id="btn-import" type="button" role="button">
                    <i class="far fa-file-excel mr-1"></i>
                    <span>Import</span>
                </button>
                <button class="btn btn-icon btn-primary btn-tone ml-3 btn-dosen-add" id="btn-dosen-add" type="button" role="button">
                    <i class="fas fa-user-plus"></i>
                </button>
            </div>
            <div class="m-t-25">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover data-table" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center">No</th>
                                <th scope="col" style="text-align: center">Nama</th>
                                <th scope="col" style="text-align: center">Email</th>
                                <th scope="col" style="text-align: center">No HP</th>
                                <th scope="col" style="text-align: center">Alamat</th>
                                <th scope="col" style="width: 15%; text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Components -->
    <div class="modal fade bd-example-modal-edit" style="display: none;" id="editmodal" tabindex="-1" role="dialog"
        aria-labelledby="editModalLabel" aria-hidden="true">
    </div>

        <!-- Modal Import Components -->
    <div class="modal fade bd-example-modal-import" style="display: none;" id="importmodal" tabindex="-1" role="dialog"
        aria-labelledby="importModalLabel" aria-hidden="true">
    </div>




@endsection

@component('components.aset_datatable.aset_datatable')@endcomponent


@push('js')
    <script>
        function reloadTable() {
            $('#data-table').DataTable().clear().destroy();
            getDosen();
        }
    </script>

    <script>
        $(document).on('click', '#cancelbtn', function(e) {
            console.log('button ditekan');
            e.preventDefault();
            $('#editmodal').modal('hide');
        })
    </script>

    <script>
        $(document).ready(function() {
            getDosen();
        });
    </script>

    <script>
        function getDosen() {

            let table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dosen') }}",
                lengthMenu: [
                    10, 20
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                layout: {
                    topStart: {
                        buttons: ['copy', 'excel', 'pdf', 'colvis']
                    }
                }
            });
        }
    </script>

    <script>
        $(document).on('click', '.btn-dosen-edit', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let url = "/modal-edit/" + id;
            $(this).prop('disabled', true)
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
                    $('.btn-dosen-edit').prop('disabled', false);
                    $('.btn-dosen-edit').html('<i class="far fa-edit"></i>');
                },
                error: function(error) {
                    console.error(error);
                    $('.btn-dosen-edit').prop('disabled', false);
                    $('.btn-dosen-edit').html('<i class="far fa-edit"></i>');
                }
            })
        })
    </script>

    <script>
        $(document).on('click', '.btn-dosen-delete', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let url = "/delete-dosen/" + id;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url,
                        type: "GET",
                        dataType: "HTML",
                        success: function(data) {
                            reloadTable();
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                icon: 'success',
                                timer: 2000

                            })
                        }
                    })
                }
            })
        })
    </script>

    <script>
        $(document).on('click', '.btn-dosen-add', function(e) {
            e.preventDefault();
            let url = "/modal-get";
            $(this).prop('disabled', true)
            $.ajax({
                url,
                type: "GET",
                dataType: "HTML",
                success: function(data) {
                    $('#editmodal').html(data);
                    $('#editmodal').modal('show');
                    $('.btn-dosen-add').prop("disabled", false);
                    $('.btn-dosen-add').html('<i class="fas fa-user-plus"></i>');
                },
                error: function(error) {
                    console.error(error);
                    $('.btn-dosen-add').prop('disabled', false);
                    $('.btn-dosen-add').html('<i class="fas fa-user-plus"></i>');
                }
            })
        })
    </script>

    <script>
        $(document).on('click', '.btn-import', function(e) {
            console.log("button import ditekan");
            e.preventDefault();
            let url = "/modal-import";
            $(this).prop('disabled', true)
            $.ajax({
                url,
                type: "GET",
                dataType: "HTML",
                success: function(data) {
                    $('#importmodal').html(data);
                    $('#importmodal').modal('show');
                    $('.btn-import').prop("disabled", false);
                    $('.btn-import').html('<i class="far fa-file-excel mr-1"></i><span>Import</span>');
                },
                error: function(error) {
                    console.error(error);
                    $('.btn-import').prop('disabled', false);
                    $('.btn-import').html('<i class="far fa-file-excel mr-1"></i><span>Import</span>');
                }
            })
        })
    </script>

    <script>
        $(document).on('submit', '#form-importuser', function(e){
            e.preventDefault();
            let data = new FormData(this);
            const url = '/import-dosen';
            $('#savefile').html("Uploading");
            $('#savefile').prop("disabled",true);
            console.log("berhasil ditekan");
            $.ajax({
                url,
                data,
                type: "POST",
                dataType: "JSON",
                cache:false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    Swal.fire({
                        title: 'Loading...',
                        html: 'Please wait while we are uploading your file.',
                        icon: "info",
                        buttons: false,
                        dangerMode: true,
                        showConfirmButton: false
                    });
                },
                success: function(data)
                {
                    if(data.code == 200)
                    {
                        Swal.fire({
                            title: 'Success',
                            text: data.success,
                            icon: "success",
                            timer: 2000
                        });
                        $('#savefile').prop("disabled",false);
                        $('#savefile').html('Save');
                        $('#importmodal').modal('hide');
                        reloadTable();
                    }else if(data.code == 400)
                    {
                        Swal.fire({
                            title: 'Failed',
                            icon: "error",
                            timer: 2000
                        });
                        $('#savefile').prop("disabled",false);
                        $('#savefile').html('Save');
                        $('#customFile').val('');
                    }
                },
                error: function(error)
                {
                    console.error(error);
                    $('#savefile').prop("disabled",false);
                    $('#savefile').html('Save');
                    $('#customFile').val('');
                }
            })
        })
    </script>

    <script>
        $(document).on('submit', '#editform', function(e) {
            e.preventDefault();
            let data = $('#editform').serialize();
            let url = "{{ route('dosen.update') }}";
            $('#saveform').prop("disabled", true);
            $('#saveform').html("Loading...");
            $.ajax({
                url,
                data,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    Swal.fire({
                        title: 'Success',
                        text: data.success,
                        icon: "success",
                        timer: 2000
                    });
                    $('#editmodal').modal('hide');
                    $('#saveform').prop("disabled", false);
                    reloadTable();
                },
                error: function(error) {
                    console.error(error);
                    $('#saveform').prop("disabled", false);
                }
            })
        })
    </script>

    <script>
        $(document).on('submit', '#adddosen', function(e) {
            e.preventDefault();
            let data = $(this).serialize();
            let url = "{{ route('dosen.store') }}";
            $('#saveform').html("Uploading");
            $('#saveform').prop("disabled", true);
            $.ajax({
                url,
                data,
                type: "POST",
                dataType: "JSON",
                beforeSend: function() {
                    Swal.fire({
                        title: 'Loading...',
                        html: 'Please wait while we are uploading your data.',
                        icon: "info",
                        buttons: false,
                        dangerMode: true,
                        showConfirmButton: false
                    });
                },
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        Swal.fire({
                            title: 'Success',
                            text: data.success,
                            icon: "success",
                            timer: 2000
                        });
                        $('#saveform').prop("disabled", false);
                        $('#saveform').html('Save');
                        $('#editmodal').modal('hide');
                        reloadTable();
                    } else {
                        swal(
                            data.error, {
                                icon: "error",
                            });
                        $('#savefile').prop("disabled", false);
                        $('#savefile').html('Save');
                    }
                },
                error: function(error) {
                    console.error(error);
                    $('#savefile').prop("disabled", false);
                    $('#savefile').html('Save');
                }
            })
        })
    </script>
@endpush
