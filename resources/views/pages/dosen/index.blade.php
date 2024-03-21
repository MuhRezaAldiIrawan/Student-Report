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
                <table class="table table-bordered table-hover data-table">
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

@endsection

@component('components.modal-add-dosen')@endcomponent

@push('js')
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}

    <!-- page js -->
    <script src="{{asset('vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables/dataTables.bootstrap.min.js')}}"></script>

    <script type="text/javascript">
        $(function () {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('dosen') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', },
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'address', name: 'address'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        });
    </script>

@endpush

@push('css')
    <!-- page css -->
    <link href="{{asset('vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endpush
