@extends('doctor.layout.master')
@section('content')
    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Schedule Timings</h4>
                        <div class="profile-box">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="h3 text-center book-btn2 mt-3 px-5 py-1 mx-3 rounded">Avalible Timings</h3>
                                    <div class="text-center mt-3">
                                        <h4 class="h4 mb-2">Start Time </h4>
                                        <span class="h4 btn btn-outline-primary"><b> 09:00 AM</b></span>
                                    </div>
                                    <form method="post" action="{{ url('store_timings') }}">
                                        @csrf
                                        <div class="token-slot mt-2">
                                            @foreach ($timeSlots as $time)
                                                <div class="form-check-inline visits me-0">
                                                    <label class="visit-btns">
                                                        <input type="checkbox" name="time[]" value="{{ $time }}" class="form-check-input"
                                                            {{ $selectedTimes->contains('time', $time) ? 'checked' : '' }}>
                                                        <span class="visit-rsn" title="time">{{ $time }}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            var selectedTimes = {!! json_encode($selectedTimes) !!};
            $('input[type="checkbox"]').each(function() {
                var time = $(this).val();
                if ($.inArray(time, selectedTimes) !== -1) {
                    $(this).prop('checked', true);
                }
            });
        });
    </script>
@endpush
