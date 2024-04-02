@extends('layout.main')

@section('content')
    @component('components.add_user.add_user', ['idform' => $idform])@endcomponent
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('vendors/jquery-validation/jquery.validate.min.js')}}"></script>
<script>
    $(document).on('submit', '#addmahasiswa', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        let url = "{{ route('mahasiswa.store') }}";
        let home = "/mahasiswa";
        $('#saveform').html("Uploading");
        $('#saveform').prop("disabled", true);
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
                    $('#saveform').prop("disabled", false);
                    $('#saveform').html('Save');

                }
            },
            error: function(error) {
                console.error(error);
                $('#savefile').prop("disabled", false);
                $('#savefile').html('<button class="btn btn-primary" id="saveform"> <i class="anticon anticon-save"></i> <span>Save</span> </button>');
            }
        })
    })
</script>
@endpush
