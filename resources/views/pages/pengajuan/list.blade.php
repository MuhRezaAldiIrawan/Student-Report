@extends('layout.main')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <h4 class="mr-auto">list Pengajuan Proposal</h4>
        </div>
        <div class="m-t-25">
            <div class="table-responsive">
                <table class="table table-bordered table-hover data-table" id="data-table">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center">No</th>
                            <th scope="col" style="text-align: center">Nama</th>
                            <th scope="col" style="text-align: center">judul</th>
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

@component('components.aset_datatable.aset_datatable')@endcomponent

@push('js')
    <script>
        function reloadTable() {
            $('#data-table').DataTable().clear().destroy();
            getList();
        }
    </script>

    <script>
        $(document).ready(function() {
            getList();
        });
    </script>

    <script>
        function getList() {

            console.log("list ditekan");

            let table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('list.pengajuan') }}",
                lengthMenu: [
                    10, 20
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'user.nama',
                        name: 'user.nama'
                    },
                    {
                        data: 'judul',
                        name: 'judul'
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


@endpush
