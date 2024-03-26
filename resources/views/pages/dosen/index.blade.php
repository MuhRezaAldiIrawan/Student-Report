@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <h4>Dosen</h4>
                <button class="btn btn-icon btn-primary btn-tone" data-toggle="modal" data-target=".bd-example-modal-xl">
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

    <div class="modal fade bd-example-modal-edit" style="display: none;" id="editmodal" tabindex="-1" role="dialog"
        aria-labelledby="editModalLabel" aria-hidden="true"></div>

    </div>
@endsection

@include('components.modal-add-dosen')

@push('js')
    <script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables/dataTables.bootstrap.min.js') }}"></script>

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

    <script type="text/javascript">
        function getDosen() {

            let table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dosen') }}",
                lengthMenu: [
                    5, 10
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
                ]
            });

        }
    </script>

    <script>
        $(document).on('click', '.btn-outlet-edit', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let url = "/modal-edit/" + id;
            $(this).prop('disabled', true)
            $(this).html('Loading...')
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
                    $('.btn-outlet-edit').prop('disabled', false);
                    $('.btn-outlet-edit').html('<i class="far fa-edit"></i>');
                },
                error: function(error) {
                    console.error(error);
                    $('.btn-outlet-edit').prop('disabled', false);
                    $('.btn-outlet-edit').html('<i class="far fa-edit"></i>');
                }
            })
        })
    </script>

    <script>
        $(document).on('submit', '#editform', function(e) {
            e.preventDefault();
            let data = $(this).serialize();
            let url = "{{ route('dosen.update') }}";
            $('#saveform').prop("disabled", true);
            $('#saveform').html("Loading...");
            $.ajax({
                url,
                data,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
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
        function reloadTable() {
            $('#data-table').DataTable().clear().destroy();
            getDosen();
        }
    </script>
@endpush

@push('css')
    <!-- page css -->
    <link href="{{ asset('vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endpush
