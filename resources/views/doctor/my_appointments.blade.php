@extends('doctor.layout.master')
@section('content')
    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="card-title">My Appointments</h3>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <div class="card card-table mb-0">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Email</th>
                                    <th>Follow Up</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($myAppointments as $myAppointment)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="#" class="avatar avatar-sm mr-2">
                                                    @if($myAppointment->patient->image)
                                                        <img id="image-preview" src="{{ asset('website') }}/{{ $myAppointment->patient->image }}" alt="Profile Image"  class="avatar-img rounded-circle">
                                                    @else
                                                        <img id="image-preview" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" alt="Default Profile Image" class="avatar-img rounded-circle" >
                                                    @endif
                                                </a>
                                                <a href="#" style="margin-left:3px">{{ $myAppointment->patient->name }}</a>
                                            </h2>
                                        </td>
                                        <td>{{ $myAppointment->patient->email ?? '' }}</td>
                                        <td>{{ $myAppointment->date }} <span class="d-block text-info">{{ $myAppointment->time }}</span></td>
                                        <td>${{ $myAppointment->doctor->fees }}</td>
                                        <td><span class="badge badge-pill bg-success-light">{{ucfirst($myAppointment->status)  }}</span></td>
                                        <td>
                                            @if($myAppointment->status == 'pending')
                                                <a href="{{ url('update_appointment_status',[$myAppointment->id,'accepted']) }}" class="btn btn-sm bg-success-light">Accept</a>
                                                <a href="{{ url('update_appointment_status',[$myAppointment->id,'cancelled']) }}" class="btn btn-sm bg-danger-light">Cancel</a>
                                            @elseif($myAppointment->status == 'accepted')
                                                <a class="btn btn-sm bg-info-light ">Accepted</a>
                                            @elseif($myAppointment->status == 'paid')
                                                <a href="{{$myAppointment->receipt_url}}" target="_blank" class="btn btn-sm bg-success-light">Show Receipt</a>
                                            @elseif($myAppointment->status == 'cancelled')
                                                <a class="btn btn-sm bg-danger-light ">Cancelled</a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" align="center">No Data Available</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal_form" class="modal fade custom-modal" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="#" enctype="multipart/form-data" autocomplete="off" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Add new member</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label mb-10"> Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10">Relationship </label>
                            <input type="text" name="relationship" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10">Gender </label>
                            <select class="form-select form-control" name="gender">
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10">DOB </label>
                            <input type="text" name="dob" id="dob" value="" readonly="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10">Photo </label>
                            <input type="file" name="profile_image" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
