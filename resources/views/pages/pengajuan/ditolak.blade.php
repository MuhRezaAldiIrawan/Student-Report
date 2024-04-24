@extends('layout.main')

@section('content')
@component('components.table.pengajuan', ['title' => $title])@endcomponent
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

            let table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('list.pengajuan.ditolak') }}",
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
