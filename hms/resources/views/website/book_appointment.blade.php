@extends('website.layouts.master')
@section('content')
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Booking</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Booking</h2>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="booking-doc-info">
                            <a href="#" class="booking-doc-img">
                                <img src="{{ asset('website/' . $doctor->image) }}" alt="User Image">
                            </a>
                            <div class="booking-info">
                                <h4><a href="#">Dr.{{ $doctor->name }}</a></h4>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">35</span>
                                </div>
                                <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> {{ $doctor->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4 col-md-6">
                        <h4 class="mb-1">{{ $formattedCurrentDate }}</h4>
                        <p class="text-muted">{{ $formattedCurrentDay }}</p>
                    </div>
                    <div class="col-12 col-sm-8 col-md-6 text-sm-end">
                        <div class="bookingrange btn btn-white btn-sm mb-3">
                            <i class="far fa-calendar-alt me-2"></i>
                            <span></span>
                            <i class="fas fa-chevron-down ms-2"></i>
                        </div>
                    </div>
                </div>
                <div class="card booking-schedule schedule-widget">
                    <div class="schedule-header">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="day-slot">
                                    <ul>
                                        <li class="left-arrow">
                                            <a href="#">
                                                <i class="fa fa-chevron-left"></i>
                                            </a>
                                        </li>
                                        @foreach ($upcomingDays as $day)
                                            <li>
                                                <span>{{ $day['day'] }}</span>
                                                <span class="slot-date">{{ $day['date'] }} <small class="slot-year">{{ $day['year'] }}</small></span>
                                            </li>
                                        @endforeach
                                        <li class="right-arrow">
                                            <a href="#">
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="schedule-cont">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Time Slot -->
                                <div class="time-slot">
                                    <ul class="clearfix">
                                        @foreach ($upcomingDays as $day)
                                            <li>
                                                @foreach ($timeSlots as $time)
                                                    <a class="timing @if ($time == $selectedTime && $day['date'] == $selectedDate) active @endif" href="#" data-date="{{ $day['date'] }}" data-time="{{ $time }}">
                                                        <span>{{ $time }}</span>
                                                    </a>
                                                @endforeach
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="submit-section proceed-btn text-end">
                    <form id="appointmentForm" method="POST" action="{{ url('make_appointment') }}">
                        @csrf
                        <input type="hidden" name="date" id="selectedDate" value="{{ $selectedDate }}">
                        <input type="hidden" name="time" id="selectedTime" value="{{ $selectedTime }}">
                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                        <button type="submit" class="btn btn-primary submit-btn">Proceed to Pay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const timeSlots = document.querySelectorAll('.timing');

        timeSlots.forEach(function(slot) {
            slot.addEventListener('click', function(event) {
                event.preventDefault();
                const selectedDate = slot.dataset.date;
                const selectedTime = slot.dataset.time;
                document.getElementById('selectedDate').value = selectedDate;
                document.getElementById('selectedTime').value = selectedTime;
                timeSlots.forEach(function(slot) {
                    slot.classList.remove('active');
                });
                slot.classList.add('active');
            });
        });
    });
</script>
@endpush
