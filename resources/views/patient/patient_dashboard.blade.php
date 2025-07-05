@extends('patient.layout.master')
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
                                <h6>Total Doctor All Time</h6>
                                <h3>{{$totalDoctors}}</h3>
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
                                <h6>Your Appointments</h6>
                                <h3>{{$myAppointments->count('id')}}</h3>
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
                                <h6>Your Total Payments</h6>
                                <h3>{{$myAppointments->sum('fees')}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 patient-dashboard-top">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="{{asset('website')}}/assets/img/specialities/pt-dashboard-01.png" alt="" width="55">
                        </div>
                        <h5>Heart Rate</h5>
                        <h6>12 <sub>bpm</sub></h6>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 patient-dashboard-top">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="{{asset('website')}}/assets/img/specialities/pt-dashboard-02.png" alt="" width="55">
                        </div>
                        <h5>Body Temperature</h5>
                        <h6>18 <sub>C</sub></h6>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 patient-dashboard-top">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="{{asset('website')}}/assets/img/specialities/pt-dashboard-03.png" alt="" width="55">
                        </div>
                        <h5>Glucose Level</h5>
                        <h6>70 - 90</h6>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 patient-dashboard-top">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="{{asset('website')}}/assets/img/specialities/pt-dashboard-04.png" alt="" width="55">
                        </div>
                        <h5>Blood Pressure</h5>
                        <h6>202/90 <sub>mg/dl</sub></h6>
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
                    url: 'get_my_appointment',
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
                        name: 'Paid',
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
