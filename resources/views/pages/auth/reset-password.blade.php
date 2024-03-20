@extends('layout.auth')

@section('content')
<div class="app">
    <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('{{ url('images/others/login-3.png')}}')">
        <div class="d-flex flex-column justify-content-between w-100">
            <div class="container d-flex h-100">
                <div class="row align-items-center w-100">
                    <div class="col-md-7 col-lg-5 m-h-auto">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between m-b-30">
                                    <img class="img-fluid" alt="" src="{{asset('images/logo/logo.png')}}">
                                    <h2 class="m-b-0">Sign In</h2>
                                </div>
                                <form action="{{ route('password.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group" hidden>
                                        <label class="font-weight-semibold" for="name">Token:</label>
                                        <input type="hidden" name="token" value="{{ $token }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ $email }}">
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="password">Password:</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                        @if ($errors->has('password'))
                                            <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="password">Confirm Passowrd:</label>
                                        <input type="password" class="form-control" id="password_confirmation" placeholder="password_confirmation" name="password_confirmation">
                                        @if ($errors->has('password_confirmation'))
                                            <div class="alert alert-danger">{{ $errors->first('password_confirmation') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between p-t-15">
                                            <button class="btn btn-primary" type="submit">Sign In</button>
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
@endsection
