@extends('layout.auth')

@section('content')

<div class="app">
    <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex"  style="background-image: url({{ url('images/others/login-3.png') }})">
        <div class="d-flex flex-column justify-content-between w-100">
            <div class="container d-flex h-100">
                <div class="row align-items-center w-100">
                    <div class="col-md-7 col-lg-5 m-h-auto">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between m-b-10">
                                    <img class="img-fluid" alt="" src="{{asset('images/logo/logo.png')}}">
                                </div>
                                <p class="m-b-20">Enter your email to recover your ID</p>
                                <form action="{{ route('password.email') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="email">Email</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon anticon anticon-user"></i>
                                            <input type="text" class="form-control" id="email" placeholder="email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-groudp">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <button class="btn btn-primary" type="submit">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-none d-md-flex p-h-40 justify-content-between">
                <span class="">© 2019 ThemeNate</span>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-dark text-link" href="">Legal</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-dark text-link" href="">Privacy</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endSection
