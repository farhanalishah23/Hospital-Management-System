@extends('backend.layout.master')
@push('css')
    <link rel="stylesheet" href="{{asset('backend')}}/assets/plugins/morris/morris.css">
@endpush
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Dashboard</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
					<span class="dash-widget-icon text-primary border-primary">
							<i class="fe fe-users"></i>
					</span>
                        <div class="dash-count">
                            <h3>{{$doctors->count()}}</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">
                        <h6 class="text-muted">Doctors</h6>
                        @php
                            $totalCount = 100;
                            $count = $doctors->count();
                            $percentage = ($count / $totalCount) * 100;
                        @endphp
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$percentage}}%;" aria-valuenow="{{$count}}" aria-valuemin="0" aria-valuemax="{{$totalCount}}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
					<span class="dash-widget-icon text-success">
								<i class="fe fe-credit-card"></i>
					</span>
                        <div class="dash-count">
                            <h3>{{$patients->count()}}</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">
                        <h6 class="text-muted">Patients</h6>
                        @php
                            $totalCount = 100;
                            $count = $patients->count();
                            $percentage = ($count / $totalCount) * 100;
                        @endphp
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{$percentage}}%;" aria-valuenow="{{$count}}" aria-valuemin="0" aria-valuemax="{{$totalCount}}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-money"></i>
										</span>
                        <div class="dash-count">
                            <h3>{{$totalAppointments->count()}}</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">

                        <h6 class="text-muted">Appointment</h6>
                        @php
                            $totalCount = 100;
                            $count = $totalAppointments->count();
                            $percentage = ($count / $totalCount) * 100;
                        @endphp
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{$percentage}}%;" aria-valuenow="{{$count}}" aria-valuemin="0" aria-valuemax="{{$totalCount}}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
										<span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
                        <div class="dash-count">
                            <h3>${{$revenue}}</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">

                        <h6 class="text-muted">Revenue</h6>
                        @php
                            $totalCount = 100000;
                            $count = $revenue;
                            $percentage = ($count / $totalCount) * 100;
                        @endphp
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{$percentage}}%;" aria-valuenow="{{$count}}" aria-valuemin="0" aria-valuemax="{{$totalCount}}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-6">

            <!-- Sales Chart -->
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="card-title">Revenue</h4>
                </div>
                <div class="card-body">
                    <div id="morrisArea"></div>
                </div>
            </div>
            <!-- /Sales Chart -->

        </div>
        <div class="col-md-12 col-lg-6">

            <!-- Invoice Chart -->
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="card-title">Status</h4>
                </div>
                <div class="card-body">
                    <div id="morrisLine"></div>
                </div>
            </div>
            <!-- /Invoice Chart -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-flex">
            <!-- Recent Orders -->
            <div class="card card-table flex-fill">
                <div class="card-header">
                    <h4 class="card-title">Doctors List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>Doctor Name</th>
                                <th>Speciality</th>
                                <th>Earned</th>
                                <th>Reviews</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($doctors as $doctor)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="#" class="avatar avatar-sm mr-2">
                                            @if($doctor->image ?? '')
                                                <img class="avatar-img rounded-circle"  src="{{ asset('website') }}/{{ $doctor->image }}" alt="Profile Image" >
                                            @else
                                                <img  src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" class="avatar-img rounded-circle" alt="Default Profile Image" >
                                            @endif
                                        </a>
                                        <a href="#">Dr.{{$doctor->name ?? ''}}</a>
                                    </h2>
                                </td>
                                <td>{{$doctor->speciality->name ?? ''}}</td>
                                <td>${{ number_format($doctor->earning ?? '') }}</td>
                                <td>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star text-warning"></i>
                                    <i class="fe fe-star-o text-secondary"></i>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex">

            <div class="card  card-table flex-fill">
                <div class="card-header">
                    <h4 class="card-title">Patients List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>Patient Name</th>
                                <th>Created Date</th>
                                <th>Paid</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($patients as $patient)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="#" class="avatar avatar-sm mr-2">
                                            @if($patient->image ?? '')
                                                <img class="avatar-img rounded-circle"  src="{{ asset('website') }}/{{ $patient->image }}" alt="Profile Image" >
                                            @else
                                                <img  src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" class="avatar-img rounded-circle" alt="Default Profile Image" >
                                            @endif
                                        </a>
                                        <a href="#">{{$patient->name ?? ''}}</a>
                                    </h2>
                                </td>
                                <td>{{$patient->created_at->format(env('DATE_FORMAT'))}}</td>
                                <td class="text-right">${{ number_format($patient->totalFeesPaid ?? '') }}</td>
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
        <div class="col-md-12">
            <!-- Recent Orders -->
            <div class="card card-table">
                <div class="card-header">
                    <h4 class="card-title">Appointment List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>Doctor Name</th>
                                <th>Speciality</th>
                                <th>Patient Name</th>
                                <th>Apointment Time</th>
                                <th>Status</th>
                                <th class="text-right">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($totalAppointments as $totalAppointment)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="#" class="avatar avatar-sm mr-2">
                                            @if($totalAppointment->doctor->image ?? '')
                                                <img class="avatar-img rounded-circle"  src="{{ asset('website') }}/{{ $totalAppointment->doctor->image  }}" alt="Profile Image" >
                                            @else
                                                <img  src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" class="avatar-img rounded-circle" alt="Default Profile Image" >
                                            @endif
                                        </a>
                                        <a href="#">Dr.{{$totalAppointment->doctor->name ?? ''}}</a>
                                    </h2>
                                </td>
                                <td>{{$totalAppointment->doctor->speciality->name ?? ''}}</td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="#" class="avatar avatar-sm mr-2">
                                            @if($totalAppointment->patient->image ?? '')
                                                <img class="avatar-img rounded-circle"  src="{{ asset('website') }}/{{ $totalAppointment->patient->image  }}" alt="Profile Image" >
                                            @else
                                                <img  src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" class="avatar-img rounded-circle" alt="Default Profile Image" >
                                            @endif
                                        </a>
                                        <a href="#">{{$totalAppointment->patient->name ?? ''}}</a>
                                    </h2>
                                </td>
                                <td>{{$totalAppointment->date ?? ''}} <span class="text-primary d-block">{{$totalAppointment->time ?? ''}}</span></td>
                                <td><span class="badge badge-pill bg-success-light">{{ucfirst($totalAppointment->status ?? '')}}</span></td>
                                <td class="text-right">
                                    ${{$totalAppointment->fees ?? ''}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('backend')}}/assets/plugins/raphael/raphael.min.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/morris/morris.min.js"></script>
    <script src="{{asset('backend')}}/assets/js/chart.morris.js"></script>
    <script>
        $(function(){
            window.mA = Morris.Area({
                element: 'morrisArea',
                data: {!! json_encode($revenueByYear) !!},
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Revenue'],
                lineColors: ['#1b5a90'],
                lineWidth: 2,
                fillOpacity: 0.5,
                gridTextSize: 10,
                hideHover: 'auto',
                resize: true,
                redraw: true
            });
        });
        window.mL = Morris.Line({
            element: 'morrisLine',
            data: {!! json_encode($revenueByYear) !!},
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Doctors', 'Patients'],
            lineColors: ['#1b5a90','#ff9d00'],
            lineWidth: 1,
            gridTextSize: 10,
            hideHover: 'auto',
            resize: true,
            redraw: true
        });
        $(window).on("resize", function(){
            mA.redraw();
            mL.redraw();
        });

    </script>
@endpush


