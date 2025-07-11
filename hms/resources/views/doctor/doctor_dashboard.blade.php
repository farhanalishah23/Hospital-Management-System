@extends('doctor.layout.master')
@section('content')
    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card dash-cards">
                    <div class="card-body">
                        <div class="dash-top-content">
                            <div class="circle-bar circle-bar1">
                                <div class="circle-graph1" data-percent="75">
                                    <img src="{{asset('website')}}/assets/img/icon-01.png" class="img-fluid" alt="patient">
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6>Total Patient All time</h6>
                                <h3>1500</h3>
                            </div>
                        </div>
                        <div class="dash-bottom-content">
                            <h6> <span> <i class="fas fa-caret-up"></i> 9.5%</span> last Week</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card dash-cards">
                    <div class="card-body">
                        <div class="dash-top-content">
                            <div class="circle-bar circle-bar2">
                                <div class="circle-graph2" data-percent="75">
                                    <img src="{{asset('website')}}/assets/img/icon-03.png" class="img-fluid" alt="patient">
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6>Total Appointements</h6>
                                <h3>4587</h3>
                            </div>
                        </div>
                        <div class="dash-bottom-content">
                            <h6> <span> <i class="fas fa-caret-up"></i> 5.5%</span> last Week</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card dash-cards">
                    <div class="card-body">
                        <div class="dash-top-content">
                            <div class="circle-bar circle-bar3">
                                <div class="circle-graph3" data-percent="50">
                                    <img src="{{asset('website')}}/assets/img/icon-4.png" class="img-fluid" alt="patient">
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6>Today’s Income</h6>
                                <h3>€1454</h3>
                            </div>
                        </div>
                        <div class="dash-bottom-content low-percent">
                            <h6> <span> <i class="fas fa-caret-down"></i> 5.5%</span> Yesterday</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card dash-cards">
                    <div class="card-header">
                        <div class="today-appointment-title">
                            <h5 class="mb-0">Today’s Appointments</h5>
                            <a href="appointments.html">
                                <h6 class="mb-0">View All <i class="feather-arrow-right"></i></h6>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <tbody>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar ">
                                            <a href="patient-profile.html" class="avatar avatar-m me-2"><img class="avatar-img" src="{{asset('website')}}/assets/img/patients/patient.jpg" alt="User Image"></a>
                                            <a href="patient-profile.html">Richard<span>#PT0016</span></a>
                                        </h2>
                                    </td>
                                    <td>
                                        <div class="consult-type d-flex flex-column">
                                            <h6 class="mb-0">Online Consultation</h6>
                                            <p class="mb-0"><img src="{{asset('website')}}/assets/img/icons/video-icon-sm.svg" alt=""> Video Call</p>
                                        </div>
                                    </td>
                                    <td class="text-center"><a class="call-status" href="video-call.html">Start&nbsp;Call</a></td>
                                    <td class="text-center"><a href="patient-profile.html"><i class="fas fa-chevron-right"></i></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="patient-profile.html" class="avatar avatar-m me-2"><img class="avatar-img" src="{{asset('website')}}/assets/img/patients/patient2.jpg" alt="User Image"></a>
                                            <a href="patient-profile.html">Wilson <span>#PT0016</span></a>
                                        </h2>
                                    </td>
                                    <td>
                                        <div class="consult-type d-flex flex-column">
                                            <h6 class="mb-0">Online Consultation</h6>
                                            <p class="mb-0"><img src="{{asset('website')}}/assets/img/icons/video-icon-sm.svg" alt=""> Video Call</p>
                                        </div>
                                    </td>
                                    <td class="text-center"><a class="call-status" href="video-call.html">Join Call</a></td>
                                    <td class="text-center"><a href="patient-profile.html"><i class="fas fa-chevron-right"></i></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="patient-profile.html" class="avatar avatar-m me-2"><img class="avatar-img" src="{{asset('website')}}/assets/img/patients/patient3.jpg" alt="User Image"></a>
                                            <a href="patient-profile.html">James <span>#PT0016</span></a>
                                        </h2>
                                    </td>
                                    <td>
                                        <div class="consult-type d-flex flex-column">
                                            <h6 class="mb-0">Online Consultation</h6>
                                            <p class="mb-0"><img src="{{asset('website')}}/assets/img/icons/audio-icon-sm.svg" alt="">Audio Call</p>
                                        </div>
                                    </td>
                                    <td class="text-center"><a class="call-status" href="voice-call.html">Join Call</a></td>
                                    <td class="text-center"><a href="patient-profile.html"><i class="fas fa-chevron-right"></i></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="patient-profile.html" class="avatar avatar-m me-2"><img class="avatar-img" src="{{asset('website')}}/assets/img/patients/patient4.jpg" alt="User Image"></a>
                                            <a href="patient-profile.html">Hendry <span>#PT0016</span></a>
                                        </h2>
                                    </td>
                                    <td>
                                        <div class="consult-type d-flex flex-column">
                                            <h6 class="mb-0">Online Consultation</h6>
                                            <p class="mb-0"><img src="{{asset('website')}}/assets/img/icons/chat-sm.svg" alt=""> Chat</p>
                                        </div>
                                    </td>
                                    <td class="text-center"><a class="call-status" href="chat.html">Ongoing</a></td>
                                    <td class="text-center"><a href="patient-profile.html"><i class="fas fa-chevron-right"></i></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card dash-cards">
                    <div class="card-header">
                        <div class="today-appointment-title">
                            <h5 class="mb-0">Patients</h5>
                            <a href="my-patients.html">
                                <h6 class="mb-0">View All<i class="feather-arrow-right"></i></h6>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <tbody>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="patient-profile.html" class="avatar avatar-m me-2"><img class="avatar-img" src="{{asset('website')}}/assets/img/patients/patient.jpg" alt="User Image"></a>
                                            <a href="patient-profile.html">Richard<span>#PT0016</span></a>
                                        </h2>
                                    </td>
                                    <td class="text-center"><a href="patient-profile.html"><i class="fas fa-chevron-right"></i></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="patient-profile.html" class="avatar avatar-m me-2"><img class="avatar-img" src="{{asset('website')}}/assets/img/patients/patient2.jpg" alt="User Image"></a>
                                            <a href="patient-profile.html">Wilson<span>#PT0016</span></a>
                                        </h2>
                                    </td>
                                    <td class="text-center"><a href="patient-profile.html"><i class="fas fa-chevron-right"></i></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="patient-profile.html" class="avatar avatar-m me-2"><img class="avatar-img" src="{{asset('website')}}/assets/img/patients/patient3.jpg" alt="User Image"></a>
                                            <a href="patient-profile.html">James <span>#PT0016</span></a>
                                        </h2>
                                    </td>
                                    <td class="text-center"><a href="patient-profile.html"><i class="fas fa-chevron-right"></i></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="patient-profile.html" class="avatar avatar-m me-2"><img class="avatar-img" src="{{asset('website')}}/assets/img/patients/patient4.jpg" alt="User Image"></a>
                                            <a href="patient-profile.html">Hendry<span>#PT0016</span></a>
                                        </h2>
                                    </td>
                                    <td class="text-center"><a href="patient-profile.html"><i class="fas fa-chevron-right"></i></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card dash-cards xyz">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title">Appointments</h5>
                            </div>
                            <div class="col-auto chart-select d-flex">
                                <div class="me-2">
                                    <select class="select">
                                        <option>All Calls</option>
                                        <option>Video</option>
                                        <option>Audio</option>
                                        <option>Chat</option>
                                    </select>
                                </div>
                                <select class="select">
                                    <option>2022</option>
                                    <option>2022</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="call-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
