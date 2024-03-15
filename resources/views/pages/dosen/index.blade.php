@extends('layout.main')

@section('content')
{{-- <table class="table table-bordered data-table" id="data-table">

    <thead>

        <tr>

            <th>No</th>

            <th>Name</th>

            <th>Email</th>

            <th width="100px">Action</th>

        </tr>

    </thead>

    <tbody>

    </tbody>

</table> --}}

<div class="panel">
    <div class="mb-5 flex items-center justify-between">
        <h5 class="text-lg font-semibold dark:text-white-light">Simple Table</h5>
    </div>
    <div class="mb-5">
        <div class="table-responsive ">
            <table class="data-table" style="width: 100%">
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
@push('scripts')


@endpush



