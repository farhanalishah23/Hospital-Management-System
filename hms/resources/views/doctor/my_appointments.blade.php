@extends('doctor.layout.master')

@section('content')
<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="appointments">
        @foreach($myAppointments as $myAppointment)
        <!-- Appointment List -->
        <div class="appointment-list">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                     @if($myAppointment->patient->image)
                     <img id="image-preview" src="{{ asset('website') }}/{{ $myAppointment->patient->image }}" alt="Profile Image"  class="avatar-img rounded-circle">
                     @else
                     <img id="image-preview" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" alt="Default Profile Image" class="avatar-img rounded-circle" >
                     @endif
                </a>
                <div class="profile-det-info">
                    <h3><a href="patient-profile.html">{{$myAppointment->patient->name}}</a></h3>
                    <div class="patient-details">
                        <h5><i class="far fa-clock"></i> {{$myAppointment->date}}, {{$myAppointment->time}}</h5>
                        <h5><i class="fas fa-map-marker-alt"></i>{{$myAppointment->patient->address}}</h5>
                        <h5><i class="fas fa-envelope"></i> {{$myAppointment->patient->email}}</h5>
                        <h5 class="mb-0"><i class="fas fa-phone"></i>{{$myAppointment->patient->phone}}</h5>
                    </div>
                </div>
            </div>
            <div class="appointment-action">
                <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
                    <i class="far fa-eye"></i> View
                </a>
                <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                    <i class="fas fa-check"></i> Accept
                </a>
                <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="modal fade" id="appt_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Appointment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="info-details">
                    <li>
                        <div class="details-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="title">#APT0001</span>
                                    <span class="text">21 Oct 2019 10:00 AM</span>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-right">
                                        <button type="button" class="btn bg-success-light btn-sm" id="topup_status">Completed</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <span class="title">Status:</span>
                        <span class="text">Completed</span>
                    </li>
                    <li>
                        <span class="title">Confirm Date:</span>
                        <span class="text">29 Jun 2019</span>
                    </li>
                    <li>
                        <span class="title">Paid Amount</span>
                        <span class="text">$450</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
