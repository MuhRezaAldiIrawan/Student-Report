<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Enlink - Admin Dashboard Template</title>

    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png')}}">

    <link href="{{asset('css/app.min.css')}}" rel="stylesheet">

</head>

<body>
    @include('sweetalert::alert')

    {{-- Content here --}}
    @yield('content')



    <script src="{{asset('js/vendors.min.js')}}"></script>
    <script src="{{asset('js/app.min.js')}}"></script>

</body>

</html>
