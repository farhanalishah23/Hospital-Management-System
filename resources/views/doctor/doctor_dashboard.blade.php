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
                                <h6>Total Patient All Time</h6>
                                <h3>{{$totalPatients}}</h3>
                            </div>
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
                                <h6>Total Appointments</h6>
                                <h3>{{$totalAppointments}}</h3>
                            </div>
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
                                <h3>${{$totalIncome}}</h3>
                            </div>
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
                            <a href="{{url('my_appointments')}}">
                                <h6 class="mb-0">View All <i class="feather-arrow-right"></i></h6>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <tbody>
                                @foreach($myAppointments as $key=>$myAppointment)
                                <tr>
                                    <td>
                                        <h2 class="table-avatar ">
                                            <a href="#" class="avatar avatar-m me-2">
                                                @if($myAppointment->patient->image)
                                                    <img id="image-preview" src="{{ asset('website') }}/{{ $myAppointment->patient->image }}" alt="Profile Image"  class="avatar-img">
                                                @else
                                                    <img id="image-preview" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" alt="Default Profile Image" class="avatar-img" >
                                                @endif
                                            </a>
                                            <a href="#">{{$myAppointment->patient->name}}<span>#PT0{{++$key}}</span></a>
                                        </h2>
                                    </td>
                                    <td>
                                        <div class="consult-type d-flex flex-column">
                                            <h6 class="mb-0">Online Consultation</h6>
                                            <p class="mb-0"><img src="{{asset('website')}}/assets/img/icons/video-icon-sm.svg" alt=""> Video Call</p>
                                        </div>
                                    </td>
                                    <td class="text-center"><a class="call-status" href="#">Start&nbsp;Call</a></td>
                                    <td class="text-center"><a href="#"><i class="fas fa-chevron-right"></i></a></td>
                                </tr>
                                @endforeach
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
                            <a href="{{url('my_appointments')}}">
                                <h6 class="mb-0">View All<i class="feather-arrow-right"></i></h6>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <tbody>
                                @foreach($myAppointments as $key=>$myAppointment)
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="#" class="avatar avatar-m me-2">
                                                @if($myAppointment->patient->image)
                                                    <img id="image-preview" src="{{ asset('website') }}/{{ $myAppointment->patient->image }}" alt="Profile Image"  class="avatar-img">
                                                @else
                                                    <img id="image-preview" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" alt="Default Profile Image" class="avatar-img" >
                                                @endif
                                            </a>
                                            <a href="#">{{$myAppointment->patient->name}}<span>#P1{{++$key}}</span></a>
                                        </h2>
                                    </td>
                                    <td class="text-center"><a href="#"><i class="fas fa-chevron-right"></i></a></td>
                                </tr>
                                @endforeach
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
                                <h5 class="card-title">My Appointments</h5>
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
@push('js')
    <script>
        $(document).ready(function() {
            fetchChartData();

            function fetchChartData() {
                $.ajax({
                    url: 'get_my_revenue',
                    type: 'GET',
                    success: function(response) {
                        renderCharts(response);
                    },
                    error: function(error) {
                        console.error('Error fetching chart data:', error);
                    }
                });
            }

            function renderCharts(data) {
                var appointmentsData = data.map(item => item.appointments);
                var revenueData = data.map(item => item.revenue);
                var years = data.map(item => item.year);

                var chartOptions = {
                    series: [{
                        name: 'Appointments',
                        data: appointmentsData,
                        type: 'line'
                    }, {
                        name: 'Earnings',
                        data: revenueData,
                        type: 'area'
                    }],
                    chart: {
                        height: 350,
                        type: 'line',
                        toolbar: {
                            show: true,
                            tools: {
                                download: true,
                                selection: true,
                                zoom: true,
                                zoomin: true,
                                zoomout: true,
                                pan: true,
                                reset: true
                            }
                        }
                    },
                    colors: ['#0CE0FF', '#0C4F8A'],
                    stroke: {
                        curve: 'smooth',
                        width: [3, 0]
                    },
                    fill: {
                        type: ['solid', 'gradient'],
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.7,
                            opacityTo: 0.9,
                            stops: [0, 90, 100]
                        }
                    },
                    labels: years,
                    xaxis: {
                        type: 'category',
                        categories: years
                    },
                    yaxis: [
                        {
                            title: {
                                text: 'Number of Appointments'
                            },
                        },
                        {
                            opposite: true,
                            title: {
                                text: 'Revenue ($k)'
                            },
                            labels: {
                                formatter: function (val) {
                                    return "$" + val + "k";
                                }
                            }
                        }
                    ],
                    tooltip: {
                        shared: true,
                        intersect: false,
                        x: {
                            format: 'yyyy'
                        },
                        y: {
                            formatter: function (val, { seriesIndex, series, dataPointIndex }) {
                                return seriesIndex === 1 ? `$${val}k` : val;
                            }
                        }
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'right',
                    },
                };

                var chart = new ApexCharts(document.querySelector("#call-chart"), chartOptions);
                chart.render();
            }
        });

    </script>
@endpush
