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
                                <div class="d-flex align-items-center justify-content-between m-b-30">
                                    <img class="img-fluid" alt="" src="{{asset('images/logo/logo.png')}}">
                                    <h2 class="m-b-0">Sign In</h2>
                                </div>

                                @if (session()->has('loginError'))
                                    <div class="alert alert-danger">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <span class="alert-icon">
                                                <i class="anticon anticon-close-o"></i>
                                            </span>
                                            <span>{{ session('loginError') }}</span>
                                        </div>
                                    </div>
                                @endif

                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="email">Email</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon anticon anticon-user"></i>
                                            <input type="text" class="form-control" id="email" placeholder="email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="password">Password:</label>
                                        <a class="float-right font-size-13 text-muted" href="{{route('forget-password')}}">Forget Password?</a>
                                        <div class="input-affix m-b-10">
                                            <i class="prefix-icon anticon anticon-lock"></i>
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="font-size-13 text-muted">
                                                Don't have an account?
                                                <a class="small" href="{{ route('register') }}"> Signup</a>
                                            </span>
                                            <button class="btn btn-primary" type="submit">Sign In</button>
                                        </div>
                                    </div>


                                    <div class="relative my-7 text-center md:mb-9">
                                        <span
                                            class="absolute inset-x-0 top-1/2 h-px w-full -translate-y-1/2 bg-white-light dark:bg-white-dark"></span>
                                        <span
                                            class="relative bg-white px-2 font-bold uppercase text-white-dark dark:bg-dark dark:text-white-light">or</span>
                                    </div>
                                    <div class="mb-10 md:mb-[60px] mt-3">
                                        <a href="/auth/google">
                                            <button type="button" class="login-with-google-btn" >
                                                Sign in with Google
                                            </button>
                                        </a>

                                        <a href="/auth/github">
                                            <button type="button" class="login-with-github-btn">
                                                <img src="{{asset('images/logo/github.svg')}}" alt="" style="width: 20px; height: 20px; margin-right: 6px;">
                                                Sign in with Github
                                            </button>
                                        </a>
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
