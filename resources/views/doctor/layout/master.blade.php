<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Dec 2022 22:13:03 GMT -->
<head>
    <meta charset="utf-8">
    <title>Doccure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link href="{{asset('website')}}/assets/img/favicon.png" rel="icon">

    <link rel="stylesheet" href="{{asset('website')}}/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('website')}}/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{asset('website')}}/assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="{{asset('website')}}/assets/css/feather.css">

    <link rel="stylesheet" href="{{asset('website')}}/assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="{{asset('website')}}/assets/css/owl.carousel.min.css">

    <link rel="stylesheet" href="{{asset('website')}}/assets/plugins/apex/apexcharts.css">

    <link rel="stylesheet" href="{{asset('website')}}/assets/css/style.css">
    @stack('css')
</head>
<body>

<div class="main-wrapper">

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                    <div class="profile-sidebar">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="{{url('/')}}" class="booking-doc-img">
                                    @if(Auth::user()->image ?? '')
                                        <img  src="{{ asset('website') }}/{{ Auth::user()->image }}" alt="Profile Image" >
                                    @else
                                        <img  src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" alt="Default Profile Image" >
                                    @endif
                                </a>
                                <div class="profile-det-info">
                                    <h3>Dr. {{ucfirst(Auth::user()->name?? '')}}</h3>
                                    <div class="patient-details">
                                        <h5 class="mb-0">{{ucfirst(Auth::user()->speciality->name ?? '')}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li class="{{request()->is('doctor_dashboard')=='true'?'active':''}}">
                                        <a href="{{url('doctor_dashboard')}}">
                                            <i class="fas fa-columns"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="{{request()->is('my_appointments')=='true'?'active':''}}" >
                                        <a href="{{url('my_appointments')}}">
                                            <i class="fas fa-calendar-check"></i>
                                            <span>My Appointments</span>
                                        </a>
                                    </li>
{{--                                    <li class="{{request()->is('available_timings')=='true'?'active':''}}">--}}
{{--                                        <a href="{{url('available_timings')}}">--}}
{{--                                            <i class="fas fa-clock"></i>--}}
{{--                                            <span>Available Timings</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
                                    <li class="{{request()->is('my_profile')=='true'?'active':''}}">
                                        <a href="{{url('my_profile')}}">
                                            <i class="fas fa-user-cog"></i>
                                            <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('logout')}}">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="{{asset('website')}}/assets/js/jquery-3.6.0.min.js"></script>

<script src="{{asset('website')}}/assets/js/bootstrap.bundle.min.js"></script>

<script src="{{asset('website')}}/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="{{asset('website')}}/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

<script src="{{asset('website')}}/assets/js/circle-progress.min.js"></script>

<script src="{{asset('website')}}/assets/js/feather.min.js"></script>

<script src="{{asset('website')}}/assets/plugins/select2/js/select2.min.js"></script>

<script src="{{asset('website')}}/assets/js/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>

<script src="{{asset('website')}}/assets/plugins/apex/apexcharts.min.js"></script>

<script src="{{asset('website')}}/assets/plugins/apex/chart-data.js"></script>

<script src="{{asset('website')}}/assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    @if(Session::has('message'))
    Swal.fire({
        title: "{{Session::get('title')}}",
        text: "{{Session::get('message')}}",
        icon: "{{Session::get('type')}}",
        showConfirmButton: false,
        timer: 4000
    });
    @endif

</script>
<script>
    $(document).ready(function() {
        $('.deleteButton').click(function() {
            var form = $(this).closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: 'Once deleted, you will not be able to recover this category!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {
                    form.submit();
                }
            });
        });
    });
</script>
@stack('js')
</body>

</html>
