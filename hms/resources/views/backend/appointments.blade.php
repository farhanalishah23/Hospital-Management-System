@extends('backend.layout.master')
@section('content')

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Appointments</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Appointments</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="datatable table table-hover table-center mb-0">
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
                        @foreach($appointments as $appointment)
                    <tr>
                        <td>
                            <h2 class="table-avatar">
                                 @if($appointment->doctor->image)
                                <a href="#" class="avatar avatar-sm mr-2">  <img id="image-preview" src="{{ asset('website') }}/{{ $appointment->doctor->image }}" alt="Profile Image"  class="avatar-img rounded-circle"></a>
                                @else
                                <a href="#" class="avatar avatar-sm mr-2">   <img id="image-preview" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" alt="Default Profile Image" class="avatar-img rounded-circle" ></a>
                                @endif
                                <a href="#">Dr. {{$appointment->doctor->name}}</a>
                            </h2>
                        </td>
                        <td>{{$appointment->doctor->speciality->name}}</td>
                        <td>
                            <h2 class="table-avatar">
                                @if($appointment->patient->image)
                                <a href="#" class="avatar avatar-sm mr-2">  <img id="image-preview" src="{{ asset('website') }}/{{ $appointment->patient->image }}" alt="Profile Image"  class="avatar-img rounded-circle"></a>
                                @else
                                <a href="#" class="avatar avatar-sm mr-2">   <img id="image-preview" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" alt="Default Profile Image" class="avatar-img rounded-circle" ></a>
                                @endif
                                <a href="#">{{$appointment->patient->name}} </a>
                            </h2>
                        </td>
                        <td>{{$appointment->date}}<span class="text-primary d-block">{{$appointment->time}}</span></td>
                        <td>
                            <div class="status-toggle">
                                <input type="checkbox" id="status_1" class="check" checked>
                                <label for="status_1" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td class="text-right">
                            {{$appointment->fees}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
