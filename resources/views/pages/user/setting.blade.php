@extends('layout.main')

@section('content')
    <div class="page-header no-gutters has-tab">
        <h2 class="font-weight-normal">Setting</h2>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tab-account">Account</a>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="tab-content m-t-15">
            <div class="tab-pane fade show active" id="tab-account">
                <form action="{{ route('user-update') }}" method="POST" enctype="multipart/form-data" id="form-validation">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Infomation</h4>
                        </div>
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-image  m-h-10 m-r-15" style="height: 80px; width: 80px">
                                    @if (auth()->user()->avatar)
                                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt=""
                                            class="mb-5 h-24 w-24 rounded-full object-cover">
                                    @else
                                        <img src="{{ asset('images/avatars/user-profile.jpeg') }}" alt=""
                                            class="mb-5 h-24 w-24 rounded-full object-cover">
                                    @endif
                                </div>
                                <div class="m-l-20 m-r-20">
                                    <h5 class="m-b-5 font-size-18">Change Avatar</h5>
                                    <p class="opacity-07 font-size-13 m-b-0">
                                        Recommended Dimensions: <br>
                                        120x120 Max fil size: 5MB
                                    </p>
                                </div>
                            </div>
                              <div class="custom-file mt-4">
                                    <input type="file" class="custom-file-input" id="customFile" name="avatar">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            <hr class="m-v-25">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="font-weight-semibold" for="userName">Nama</label>
                                    <input type="text" class="form-control" id="userName" placeholder="User Name"
                                        value="{{ auth()->user()->nama }}" name="nama">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-semibold" for="gender">Jenis Kelamin</label>
                                    <div class="m-b-15">
                                        <select id="inputGender" class="form-control" name="gender">
                                            <option value="Pria"  {{ auth()->user()->gender !== 'Pria' ?: 'selected' }}>Pria</option>
                                            <option value="Wanita"{{ auth()->user()->gender !== 'Wanita' ?: 'selected' }}>Wanita</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group col-md-12">
                                    <label class="font-weight-semibold" for="role">Status</label>
                                    <select id="inputStatus" class="form-control" name="role">
                                        <option value="Dosen" {{ auth()->user()->role !== 'Dosen' ?: 'selected' }}>Dosen</option>
                                        <option value="Mahasiswa" {{ auth()->user()->role !== 'Mahasiswa' ?: 'selected' }}>Mahasiswa</option>
                                        <option value="Admin" {{ auth()->user()->role !== 'Admin' ?: 'selected' }}>Admin</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Contact Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-semibold" for="fullAddress">Alamat</label>
                                    <input type="text" class="form-control" id="fullAddress" placeholder="Full Address" value="{{ auth()->user()->address }}" name="address">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-semibold" for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="email"
                                        value="{{ auth()->user()->email }}" name="email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-semibold" for="email">Nomor HP</label>
                                    <input type="text" class="form-control" id="phone" placeholder="+62"
                                        value="{{ auth()->user()->phone }}" name="phone">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="{{asset('vendors/jquery-validation/jquery.validate.min.js')}}"></script>

<script>


$( "#form-validation" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        name: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        gender: {
            required: true
        },
        address:{
            required: true
        },
        role:{
            required: true
        },
        phone:{
            required: true
        },

    }
});


</script>
@endpush
