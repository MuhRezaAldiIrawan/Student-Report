<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Enlink - Admin Dashboard Template</title>


    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png')}}">

    <link href="{{asset('css/app.min.css')}}" rel="stylesheet">


    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>



    @stack('css')

</head>

<body>
    @include('sweetalert::alert')
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            @include('layout.header')
            <!-- Header END -->

            <!-- Side Nav START -->
            @include('layout.sidebar')
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <!-- Content goes Here -->
                    @yield('content')
                    <!-- Content goes END -->
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                @include('layout.footer')
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->
        </div>
    </div>
    <script src="{{asset('js/vendors.min.js')}}"></script>
    <script src="{{asset('js/app.min.js')}}"></script>

    @stack('js')

</body>

</html>
