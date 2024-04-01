@extends('layout.main')

@section('content')
    @component('components.add_user.add_user', ['idform' => $idform])@endcomponent
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('vendors/jquery-validation/jquery.validate.min.js')}}"></script>
<script>
    $(document).on('submit', '#adddosen', function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        let url = "{{ route('dosen.store') }}";
        const home = "/dosen";
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
