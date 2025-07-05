@extends('patient.layout.master')
@push('css')
    <style>
        .btn {
            width: 130px; /* Define the width of the button */
            height: 30px; /* Define the height of the button */
            display: flex; /* Use flexbox to center content */
            align-items: center; /* Center items vertically */
            justify-content: center; /* Center items horizontally */
            overflow: hidden; /* Hide overflow text */
            white-space: nowrap; /* Prevent text from wrapping */
            line-height: 1; /* Line height for better vertical alignment */
            box-sizing: border-box; /* Include padding and border in element's total width and height */
            margin-right: 10px; /* Add space to the right of each button */
            /*font-size: calc(10px + (130px / 20)); !* Adjust font size relative to button width *!*/
        }
        .btn-blue {
            background-color: #003366; /* Dark blue background color */
            color: white; /* Set text color to white */
        }
    </style>
@endpush
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
                                    <th>Follow Up</th>
                                    <th>Booking Date</th>
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
                                                    @if($myAppointment->doctor->image)
                                                        <img id="image-preview" src="{{ asset('website') }}/{{ $myAppointment->doctor->image }}" alt="Profile Image"  class="avatar-img rounded-circle">
                                                    @else
                                                        <img id="image-preview" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" alt="Default Profile Image" class="avatar-img rounded-circle" >
                                                    @endif
                                                </a>
                                                <a href="#" style="margin-left:3px">Dr.{{$myAppointment->doctor->name }} <span>{{$myAppointment->doctor->speciality->name }} </span></a>
                                            </h2>
                                        </td>
                                        <td>{{$myAppointment->date}} <span class="d-block text-info">{{$myAppointment->time}}</span></td>
                                        <td>{{$myAppointment->created_at->format(env('DATE_FORMAT')) ?? ''}}</td>
                                        <td>${{$myAppointment->doctor->fees}}</td>
                                        <td><span class="badge badge-pill bg-success-light">{{ucfirst($myAppointment->status)}}</span></td>
                                        <td class="text-right">
                                            <div class="table-action">
                                                <div class="container">
                                                @if($myAppointment->status=='pending')
                                                    <a href="{{url('update_patient_appointment',[$myAppointment->id,'cancelled'])}}" class="btn btn-sm bg-primary-light">
                                                        Cancel
                                                    </a>
                                                @elseif($myAppointment->status=='accepted')
                                                    <div class="row">
                                                        <form action="{{ url('payment') }}" method="post">
                                                            @csrf
                                                            <input type="hidden"  value="{{$myAppointment->id}}" name="appointment_id" id="appointment_id">
                                                            <input type="hidden"  value="{{$myAppointment->doctor->name}}" name="doctor_name" id="doctor_name">
                                                            <input type="hidden"  value="{{$myAppointment->doctor->fees}}" name="appointment_fees" id="appointment_fees">
                                                            <button type="submit"  class="btn btn-blue" target="_blank">Pay With Paypal</button>
                                                        </form>
                                                    </div>
{{--                                                    <a href="{{url('payment')}}/{{$myAppointment->id}}" class="btn btn-success" target="_blank">Pay Now With Paypal</a>--}}

                                                    <form method="post" action="{{url('stripe_payment')}}">
                                                        <input type="hidden"  value="{{$myAppointment->id}}" name="appointment_id" id="appointment_id">
                                                        <input type="hidden"  value="{{$myAppointment->doctor->fees}}" name="appointment_fees" id="appointment_fees">
                                                        @csrf
                                                        <script
                                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                            data-key="pk_test_51HOynCAHJVfEXtt47ob0hjbfzpHnLkueWSNmuwaUrgQK06m6hUWSwARxyGKVGVuorAuHNQyH0mAISfB5GcI5Ueej00nNrYSsZp"
                                                            data-image="data:image/png;base64,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"
                                                            data-allow-remember-me="false"
                                                            data-amount="{{$myAppointment->doctor->fees* 100 ?? ''}}"
                                                            data-name="Powered by Stripe"
                                                            data-description="Appointment with: Dr {{ $myAppointment->doctor->name }}"
                                                            data-label="Pay With Stripe">
                                                        </script>
                                                    </form>

                                                    <!-- Button trigger modal -->
{{--                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">--}}
{{--                                                        Pay Now--}}
{{--                                                    </button>--}}



{{--                                                    <form method="post" action="{{url('stripe_payment')}}">--}}
{{--                                                        <input type="hidden"  value="{{$myAppointment->id}}" name="appointment_id" id="appointment_id">--}}
{{--                                                        <input type="hidden"  value="{{$myAppointment->doctor->fees}}" name="appointment_fees" id="appointment_fees">--}}
{{--                                                        @csrf--}}
{{--                                                        <script--}}
{{--                                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"--}}
{{--                                                            data-key="pk_test_51HOynCAHJVfEXtt47ob0hjbfzpHnLkueWSNmuwaUrgQK06m6hUWSwARxyGKVGVuorAuHNQyH0mAISfB5GcI5Ueej00nNrYSsZp"--}}
{{--                                                            data-image="data:image/png;base64,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"--}}
{{--                                                            data-allow-remember-me="false"--}}
{{--                                                            data-amount="{{$myAppointment->doctor->fees ?? ''}}"--}}
{{--                                                            data-name="Powered by Stripe"--}}
{{--                                                            data-description="Appointment with: Dr {{ $myAppointment->doctor->name }}"--}}
{{--                                                            data-label="Pay Now">--}}
{{--                                                        </script>--}}
{{--                                                    </form>--}}
                                                @elseif($myAppointment->status=='cancelled')
                                                    <a href="{{url('update_patient_appointment',[$myAppointment->id,'pending'])}}" class="btn btn-sm bg-success-light">
                                                        Make Appointment
                                                    </a>
                                                @elseif($myAppointment->status=='paid')
                                                    <a href="{{$myAppointment->receipt_url}}" target="_blank" class="btn btn-sm bg-success-light">Show Receipt</a>
                                                @endif
                                            </div>
                                            </div>
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

    <!-- Modal -->
{{--    <div class="modal " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                --}}

{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary">Understood</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
@push('js')
@endpush
