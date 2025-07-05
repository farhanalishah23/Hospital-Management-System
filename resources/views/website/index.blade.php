@extends('website.layouts.master')
@section('content')
    <section class="home-section-five">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="banner-wrapper-five aos" data-aos="">
                        <div class="section-search-five text-center">
                            <span>World's Largest </span>
                            <h2>Search Doctor, Make an Appointment</h2>
                            <p>Discover the best doctors, clinic & hospital the city nearest to you.</p>
                            <div class="search-box-five">
                                <form action="{{ url('search') }}" method="GET">
                                    <div class="search-input-five line-five">
                                        <i class="feather-user-check bficon"></i>
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control search-ortho" name="search" placeholder="Search Doctor">
                                        </div>
                                    </div>
                                    <div class="search-btn-five">
                                        <button class="btn search_service" type="submit">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="looking-section-five">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header section-header-five text-center aos" data-aos="">
                        <h2 class="title-five">What are you looking for?</h2>
                    </div>
                </div>
            </div>
            <div class="looking-bg-five">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex aos" data-aos="">
                        <div class="looking-grid-five looking-grid-blue w-100">
                            <div class="looking-icon-five">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <div class="looking-info-five">
                                <a href="#">Visit a Doctor</a>
                                <p>We hire the best specialists to deliver top-notch diagnostic services for you.</p>
                            </div>
                            <div class="looking-info-btn">
                                <a href="#" class="btn btn-five">Book Now <i class="feather-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex aos" data-aos="">
                        <div class="looking-grid-five looking-grid-green w-100">
                            <div class="looking-icon-five">
                                <i class="fas fa-tablets"></i>
                            </div>
                            <div class="looking-info-five">
                                <a href="#">Find a Pharmacy</a>
                                <p>We provide the a wide range of medical services, so every person could have the opportunity.</p>
                            </div>
                            <div class="looking-info-btn">
                                <a href="#" class="btn btn-five">Find Now <i class="feather-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex aos" data-aos="">
                        <div class="looking-grid-five looking-grid-orange w-100">
                            <div class="looking-icon-five">
                                <i class="fas fa-vial"></i>
                            </div>
                            <div class="looking-info-five">
                                <a href="#">Find a Lab</a>
                                <p>We use the first-class medical equipment for timely diagnostics of various diseases timely diagnostics of various diseases diseases timely diagnostics of various diseases.</p>
                            </div>
                            <div class="looking-info-btn">
                                <a href="#" class="btn btn-five">Book Now <i class="feather-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="clinic-section-five">
        <div class="container">
            <div class="row">
                @if($specialityExist)
                <div class="col-md-12">
                    <div class="section-header section-header-five text-center aos" data-aos="">
                        <h2 class="title-five">Clinic and Specialities</h2>
                    </div>
                </div>
                @endif
            </div>
            <div class="row justify-content-center">
                @forelse($ourSpecialities as $ourSpeciality)
                <div class="col-lg-2 col-md-4 d-flex aos" data-aos="">
                    <div class="clinic-grid-five w-100 hvr-bounce-to-bottom">
                        <div class="clinic-grid-img">
                            <div class="clinic-img-five">
                                <img src="{{asset('website')}}/{{$ourSpeciality->image}}" alt="">
                            </div>
                        </div>
                        <div class="clinic-grid-info">
                            <p>{{$ourSpeciality->name}}</p>
                            <div class="clinic-five-btn">
                                <a href="#" class="btn">Consult Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div colspan="6" align="center">No Speciality Available</div>
                @endforelse
            </div>
            {{$ourSpecialities->links()}}
        </div>
    </section>
    <section class="doctor-section-five">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex aos" data-aos="">
                    <div class="doctor-grid-five w-100">
                        <div class="doctor-details">
                            <h4>ARE YOU A DOCTOR?</h4>
                            <p>The service allows you to get maximum visibility online and to manage appointments and contacts coming from the site, in a simple and fast way.</p>
                            <a href="#" class="btn">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 doctor-img2 aos" data-aos="">
                    <div class="doctor-grid-five w-100">
                        <img src="{{asset('website')}}/assets/img/doctors/doctor-img2.png" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex aos" data-aos="">
                    <div class="doctor-grid-five w-100">
                        <div class="doctor-details doctor-details-one">
                            <h4>ARE YOU A PATIENT?</h4>
                            <p>The service allows you to get maximum visibility online and to manage appointments and contacts coming from the site, in a simple and fast way.</p>
                            <a href="#" class="btn">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="browse-section-five">
        <div class="container">
            <div class="row">
                @if($specialityExist)
                <div class="col-md-12">
                    <div class="section-header section-header-five text-center aos" data-aos="">
                        <h2 class="title-five">Browse by Specialities</h2>
                    </div>
                </div>
                @endif
            </div>
            <div class="row">
                @forelse($ourSpecialities as $ourSpeciality)
                <div class="col-lg-3 col-md-6 aos" data-aos="">
                    <div class="specialist-card-five d-flex hvr-bounce-to-right">
                        <div class="specialist-img-five">
                            <img src="{{asset('website')}}/{{$ourSpeciality->image}}" alt="" class="img-fluid">
                        </div>
                        <div class="specialist-info">
                            <a href="#">{{$ourSpeciality->name}}</a>
                        </div>
                        <div class="specialist-nav-five ms-auto">
                            <a href="#"><i class="feather-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @empty
                    <div colspan="6" align="center">No Speciality Available</div>
                @endforelse
                    {{$ourSpecialities->links()}}
            </div>
        </div>
    </section>

    <section class="best-section-five">
        <div class="container">
            @if($doctorsExist)
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header section-header-five text-center aos" data-aos="">
                        <h2 class="title-five">Book Our Best Doctor</h2>
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                @forelse($doctors as $doctor)
                <div class="col-lg-3 col-md-6 d-flex aos" >
                    <div class="doctors-grid-five w-100">
                        <div class="doctors-img-five" style="width: 320px; height: 320px;">
                            <a href="#">
                                <img src="{{ asset('website') }}/{{ $doctor->image }}" alt="" style="width: 90%; height: 100%; object-fit: cover;" class="img-fluid">
                            </a>
                        </div>

                        <div class="best-doctors-info">
                            <h3><a href="#">Dr.{{$doctor->name}}</a></h3>
                            <p class="doctor-posting">{{$doctor->speciality->name}}</p>
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star"></i>
                                <span class="d-inline-block average-rating">4.9 ( 82 )</span>
                            </div>
                            <div class="doctors-btn-five">
                                <a href="{{url('book_appointment', $doctor->id)}}" class="btn w-100">Book Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                        <div colspan="6" align="center">No Doctor Available</div>
                @endforelse
            </div>
                {{$doctors->links()}}
        </div>
    </section>

    <section class="clinic-section-five">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header section-header-five text-center aos" data-aos="">
                        <h2 class="title-five">Available Features in Our Clinic</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-2 col-md-4 d-flex aos" data-aos="">
                    <div class="clinic-grid-five w-100 hvr-bounce-to-bottom pb-0">
                        <div class="clinic-grid-img">
                            <div class="clinic-img-five clinic-img-five1">
                                <img src="{{asset('website')}}/assets/img/services/features-01.svg" alt="">
                            </div>
                        </div>
                        <div class="clinic-grid-info">
                            <p>Operation</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 d-flex aos" data-aos="">
                    <div class="clinic-grid-five w-100 hvr-bounce-to-bottom pb-0">
                        <div class="clinic-grid-img">
                            <div class="clinic-img-five clinic-img-five1">
                                <img src="{{asset('website')}}/assets/img/services/features-02.svg" alt="">
                            </div>
                        </div>
                        <div class="clinic-grid-info">
                            <p>Medical</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 d-flex aos" data-aos="">
                    <div class="clinic-grid-five w-100 hvr-bounce-to-bottom pb-0">
                        <div class="clinic-grid-img">
                            <div class="clinic-img-five clinic-img-five1">
                                <img src="{{asset('website')}}/assets/img/services/features-03.svg" alt="">
                            </div>
                        </div>
                        <div class="clinic-grid-info">
                            <p>Patient Ward</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 d-flex aos" data-aos="">
                    <div class="clinic-grid-five w-100 hvr-bounce-to-bottom pb-0">
                        <div class="clinic-grid-img">
                            <div class="clinic-img-five clinic-img-five1">
                                <img src="{{asset('website')}}/assets/img/services/features-04.svg" alt="">
                            </div>
                        </div>
                        <div class="clinic-grid-info">
                            <p>Test Room</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 d-flex aos" data-aos="">
                    <div class="clinic-grid-five w-100 hvr-bounce-to-bottom pb-0">
                        <div class="clinic-grid-img">
                            <div class="clinic-img-five clinic-img-five1">
                                <img src="{{asset('website')}}/assets/img/services/features-05.svg" alt="">
                            </div>
                        </div>
                        <div class="clinic-grid-info">
                            <p>ICU</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 d-flex aos" data-aos="">
                    <div class="clinic-grid-five hvr-bounce-to-bottom w-100 pb-0">
                        <div class="clinic-grid-img">
                            <div class="clinic-img-five clinic-img-five1">
                                <img src="{{asset('website')}}/assets/img/services/features-06.svg" alt="">
                            </div>
                        </div>
                        <div class="clinic-grid-info">
                            <p>Laboratory</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="news-letter-five">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="news-five">
                        <div class="news-five-head aos" data-aos="">
                            <h2>Grab Our Newsletter</h2>
                            <p>To receive latest offers and discounts from the shop.</p>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-md-12">
                                <div class="news-five-form aos" data-aos="">
                                    <form method="post" action="{{url('subcribe')}}">
                                        @csrf
                                        <div class="form-group mb-0">
                                            <input type="text" name="email" class="form-control" placeholder="Enter Your Email Address">
                                            <button type="submit" class="btn">Subscribe</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-section-five">
    </section>
@endsection
