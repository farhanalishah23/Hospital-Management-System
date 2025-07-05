<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>HMS</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend')}}/assets/img/favicon.png">
    <link rel="stylesheet" href="{{asset('backend')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('backend')}}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('backend')}}/assets/css/feathericon.min.css">
    <link rel="stylesheet" href="{{asset('backend')}}/assets/css/style.css">

  @stack('css')
</head>
<body>
<div class="main-wrapper">
    <div class="header">

        <!-- Logo -->
        <div class="header-left">
            <a href="{{url('/')}}" class="logo">
                <img src="{{asset('backend')}}/assets/img/logo.png" alt="Logo">
            </a>
            <a href="#" class="logo logo-small">
                <img src="{{asset('backend')}}/assets/img/logo-small.png" alt="Logo" width="30" height="30">
            </a>
        </div>
        <!-- /Logo -->

        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fe fe-text-align-left"></i>
        </a>

        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <!-- Mobile Menu Toggle -->
        <a class="mobile_btn" id="mobile_btn">
            <i class="fa fa-bars"></i>
        </a>
        <!-- /Mobile Menu Toggle -->

        <!-- Header Right Menu -->
        <ul class="nav user-menu">

            <!-- Notifications -->
            <li class="nav-item dropdown noti-dropdown">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifications</span>
                        <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('backend')}}/assets/img/doctors/doctor-thumb-01.jpg">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span> Schedule <span class="noti-title">her appointment</span></p>
                                            <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('backend')}}/assets/img/patients/patient1.jpg">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Charlene Reed</span> has booked her appointment to <span class="noti-title">Dr. Ruby Perrin</span></p>
                                            <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('backend')}}/assets/img/patients/patient2.jpg">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Travis Trimble</span> sent a amount of $210 for his <span class="noti-title">appointment</span></p>
                                            <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('backend')}}/assets/img/patients/patient3.jpg">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Carl Kelly</span> send a message <span class="noti-title"> to his doctor</span></p>
                                            <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="#">View all Notifications</a>
                    </div>
                </div>
            </li>
            <!-- /Notifications -->

            <!-- User Menu -->
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="user-img">
                         @if(Auth::user()->image)
                            <img id="image-preview" src="{{ asset('website') }}/{{ Auth::user()->image }}" alt="Profile Image" width="31">
                        @else
                            <img id="image-preview" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" alt="Default Profile Image" width="31">
                        @endif
                    </span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            @if(Auth::user()->image)
                                <img id="image-preview" src="{{ asset('website') }}/{{ Auth::user()->image }}" alt="Profile Image" class="avatar-img rounded-circle">
                            @else
                                <img id="image-preview" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" alt="Default Profile Image" class="avatar-img rounded-circle">
                            @endif
                        </div>
                        <div class="user-text">
                            <h6>{{Auth::user()->name}}</h6>
                            <p class="text-muted mb-0">{{Auth::user()->role}}</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{url('manage_profile')}}">My Profile</a>
                    <form method="post" action="{{url('logout')}}">
                        @csrf
                    <button class="dropdown-item" type="submit">Logout</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main</span>
                    </li>
                    <li class="{{request()->is('dashboard')=='true'?'active':''}}">
                        <a href="{{url('dashboard')}}"><i class="fe fe-home "></i> <span>Dashboard</span></a>
                    </li>
                    <li class="{{request()->is('specialities')=='true'?'active':''}}">
                        <a href="{{url('specialities')}}"><i class="fe fe-users"></i> <span>Specialities</span></a>
                    </li>
                    <li class="{{request()->is('doctors')=='true'?'active':''}}">
                        <a href="{{url('doctors')}}"><i class="fe fe-users"></i> <span>Doctors</span></a>
                    </li>
                    <li class="{{request()->is('patients')=='true'?'active':''}}">
                        <a href="{{url('patients')}}"><i class="fe fe-users"></i> <span>Patients</span></a>
                    </li>
                    <li class="{{request()->is('appointments')=='true'?'active':''}}">
                        <a href="{{url('appointments')}}"><i class="fe fe-layout"></i> <span>Appointments</span></a>
                    </li>
                    <li class="{{request()->is('logout')=='true'?'active':''}}">
                        <a href="{{url('logout')}}"><i class="fe fe-user-plus"></i> <span>Logout</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">



            <div class="row">
                <div class="col-sm-12">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{asset('backend')}}/assets/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('backend')}}/assets/js/popper.min.js"></script>
<script src="{{asset('backend')}}/assets/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="{{asset('backend')}}/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom JS -->
<script  src="{{asset('backend')}}/assets/js/script.js"></script>

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
