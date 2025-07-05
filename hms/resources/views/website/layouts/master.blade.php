<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from doccure-html.dreamguystech.com/template/index-fourteen.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Dec 2022 22:18:10 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure</title>
    <link type="image/x-icon" href="{{asset('website')}}/assets/img/favicon.png" rel="icon">
    <link rel="stylesheet" href="{{asset('website')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('website')}}/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{asset('website')}}/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{asset('website')}}/assets/css/feather.css">
    <link rel="stylesheet" href="{{asset('website')}}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('website')}}/assets/css/aos.css">
    <link rel="stylesheet" href="{{asset('website')}}/assets/css/style.css">
    @stack('js')
</head>
<body class="home-five">
<div class="main-wrapper">
    <header class="header">
        <div class="container">
            <div class="nav-bg-five">
                <nav class="navbar navbar-expand-lg header-nav nav-transparent">
                    <div class="navbar-header">
                        <a id="mobile_btn" href="javascript:void(0);"> <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                        </span>
                        </a>
                        <a href="#" class="navbar-brand logo">
                            <img src="{{asset('website')}}/assets/img/logo.png" class="img-fluid" alt="Logo">
                        </a>
                    </div>
                    <div class="main-menu-wrapper">
                        <div class="menu-header">
                            <a href="#" class="menu-logo">
                                <img src="{{asset('website')}}/assets/img/logo.png" class="img-fluid" alt="Logo">
                            </a>
                            <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i>
                            </a>
                        </div>
                        <ul class="main-nav black-font">
                            <li class="has-submenu">
                                <a href="{{url('/')}}" class="{{request()->is('/')=='true'?'active':''}}">Home </a>
                            </li>
                            <li> <a href="admin/#" target="_blank">Admin</a></li>
                            <li > <a href="{{url('register')}}">Login / Signup</a></li>
                        </ul>
                    </div>
                    <ul class="nav header-navbar-rht">
                        <li class="nav-item contact-item">
                            <div class="header-contact-img">
                                <i class="feather-phone"></i>
                            </div>
                            <div class="header-contact-detail">
                                <p class="contact-info-header">+1 315 369 5943</p>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-five" href="{{url('login')}}">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-five-light" href="{{url('register')}}">Sign Up</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
     @yield('content')
    <footer class="footer footer-five">
        <div class="footer-top aos" data-aos="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget footer-about">
                            <div class="footer-logo">
                                <img src="{{asset('website')}}/assets/img/footer-logo.png" alt="logo">
                            </div>
                            <div class="footer-about-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div class="footer-widget footer-menu footer-menu-five">
                                <ul>
                                    <li><a href="#" target="_blank"><i class="fab fa-facebook"></i> Facebook</a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i> Linkedin</a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-instagram"></i> Instagram</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget footer-contact">
                            <h2 class="footer-title">Contact Us</h2>
                            <div class="footer-contact-info">
                                <div class="footer-address">
                                    <span><i class="feather-map-pin"></i></span>
                                    <p>3556 Beech Street, San Francisco,
                                        <br>California, CA <br>94108
                                    </p>
                                </div>
                                <p><i class="feather-phone"></i>
                                    +1 315 369 5943
                                </p>
                                <p class="mb-0"><i class="feather-mail"></i>
                                    <a href="https://doccure-html.dreamguystech.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="771318141402051237120f161a071b125914181a">[email&#160;protected]</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget footer-menu">
                            <h2 class="footer-title">For Patients</h2>
                            <ul>
                                <li><a href="#">Login</a></li>
                                <li><a href="#">Register</a></li>
                                <li><a href="#">Booking</a></li>
                                <li><a href="#">Patient Dashboard</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget footer-menu">
                            <h2 class="footer-title">For Doctors</h2>
                            <ul>
                                <li><a href="#">Appointments</a></li>
                                <li><a href="#">Chat</a></li>
                                <li><a href="#">Login</a></li>
                                <li><a href="#">Register</a></li>
                                <li><a href="#">Doctor Dashboard</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="copyright-text">
                                <p class="mb-0">&copy; 2022 Doccure. All rights reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="copyright-menu">
                                <ul class="policy-menu">
                                    <li><a href="#">Terms and Conditions</a></li>
                                    <li><a href="#">Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
</script><script src="{{asset('website')}}/assets/js/jquery-3.6.0.min.js"></script>
<script src="{{asset('website')}}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('website')}}/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('website')}}/assets/js/slick.js"></script>
<script src="{{asset('website')}}/assets/js/feather.min.js"></script>
<script src="{{asset('website')}}/assets/js/aos.js"></script>
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
<!-- Mirrored from doccure-html.dreamguystech.com/template/index-fourteen.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Dec 2022 22:18:19 GMT -->
</html>
