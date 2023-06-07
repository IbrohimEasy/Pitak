<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Log In | Adminto - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('public/assets/images/favicon.ico')}}">

    <!-- App css -->

    <link href="{{asset('public/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- icons -->
    <link href="{{asset('public/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body class="loading authentication-bg authentication-bg-pattern">

    @yield('content')
<script src="{{asset('public/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('public/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('public/assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('public/assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('public/assets/libs/feather-icons/feather.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('public/assets/js/app.min.js')}}"></script>

</body>
</html>
