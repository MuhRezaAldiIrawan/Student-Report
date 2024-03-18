@extends('layout.main')

@section('content')
<div class="panel">
    <div class="flex items-center justify-end mb-3 ">
        @include('components.add-dosen-modal')
    </div>
    <div class="mb-5">
        <div class="table-responsive ">
            <table class="data-table table-hover" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Hp</th>
                        <th>Jenis kelamin</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection

{{-- @component('components.add-dosen-modal')@endcomponent --}}

@component('components.asset-datatables') @endcomponent

@push('scripts')
<script type="text/javascript">

    $(function () {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/dosen",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'address', name: 'address'},
            {data: 'phone', name: 'phone'},
            {data: 'gender', name: 'gender'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            ],


    });

    });
</script>


@endpush




