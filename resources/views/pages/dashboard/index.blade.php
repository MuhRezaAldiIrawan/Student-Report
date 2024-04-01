@extends('layout.main')

@section('content')
<div class="page-header no-gutters">
    <div class="d-md-flex align-items-md-center justify-content-between">
        <div class="media m-v-10 align-items-center">
            <div class="avatar avatar-image avatar-lg">
                @if (auth()->user()->avatar)
                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="" class="mb-5 h-24 w-24 rounded-full object-cover">
                @else
                    <img src="{{ asset('images/avatars/user-profile.jpeg')}}" alt=""
                    class="mb-5 h-24 w-24 rounded-full object-cover">
                @endif
            </div>
            <div class="media-body m-l-15">
                <h4 class="m-b-0">Welcome back, {{auth()->user()->nama}}</h4>
                <span class="text-gray">{{auth()->user()->role ?? 'User role not set'}}</span>
            </div>
        </div>
        <div class="d-md-flex align-items-center d-none">
            <div class="media align-items-center m-r-40 m-v-5">
                <div class="font-size-27">
                    <i class="text-primary anticon anticon-profile"></i>
                </div>
                <div class="d-flex align-items-center m-l-10">
                    <h2 class="m-b-0 m-r-5">78</h2>
                    <span class="text-gray">Tasks</span>
                </div>
            </div>
            <div class="media align-items-center m-r-40 m-v-5">
                <div class="font-size-27">
                    <i class="text-success  anticon anticon-appstore"></i>
                </div>
                <div class="d-flex align-items-center m-l-10">
                    <h2 class="m-b-0 m-r-5">21</h2>
                    <span class="text-gray">Projects</span>
                </div>
            </div>
            <div class="media align-items-center m-v-5">
                <div class="font-size-27">
                    <i class="text-danger anticon anticon-team"></i>
                </div>
                <div class="d-flex align-items-center m-l-10">
                    <h2 class="m-b-0 m-r-5">39</h2>
                    <span class="text-gray">Members</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
