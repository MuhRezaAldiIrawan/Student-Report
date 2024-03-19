@extends('layout.main')

@section('content')
<div class="panel">
    <div class="mb-5 flex items-center justify-between">
        @include('components.modal-add-masterdata')
    </div>
    <div class="mb-5">
        <div class="table-responsive">
            <table class="table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Sale</th>
                        <th class="text-center">Status</th>
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
