@extends('backend.layout.master')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-sm-7 col-auto">
                <h3 class="page-title">Update Doctor</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Doctor</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Update Doctor</h4>
        </div>
        <div class="card-body">
            <form id="doctor_form" method="post" enctype="multipart/form-data" action="{{url('update_doctor', $doctor->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="form-label" for="speciality_id">Select Speciality <span class="text-danger">*</span></label>
                    <select class="form-control" name="speciality_id" id="speciality_id">
                        @if($specialities->isEmpty())
                            <option value="" selected disabled>No speciality available</option>
                        @else
                            <option value="" selected disabled>Select Speciality</option>
                            @foreach($specialities as $speciality)
                                <option value="{{ $speciality->id }}"  @if($speciality->id == $doctor->speciality_id) selected @endif>{{ $speciality->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{$doctor->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email Address <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" value="{{$doctor->email}}" class="form-control">
                    <div id="email_error" class="alert alert-danger" style="display: none;"></div>
                </div>
                <div class="form-group">
                    <label>Password </label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Fees <span class="text-danger">*</span></label>
                    <input type="number" min="100" max="5000" name="fees" value="{{$doctor->fees}}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Image </label>
                    <input type="file" name="image"  class="form-control">
                    <img  src="{{ asset('website') }}/{{ $doctor->image }}" alt="Profile Image" style="height: 80px">
                </div>
                <div class="text-right">
                    <a href="{{url('doctors')}}" class="btn btn-light">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#doctor_form").validate({
                rules: {
                    speciality_id: {
                        required: true
                    },
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    },
                    fees: {
                        required: true
                    },
                    status:{
                        required: true
                    }

                },
                messages: {
                    speciality_id: {
                        required: '<span class="text-danger">Please select speciality.</span>'
                    },
                    name: {
                        required: '<span class="text-danger">Please enter a name.</span>'
                    },
                    email: {
                        required: '<span class="text-danger">Please enter a email.</span>',
                        email:'<span class="text-danger">Please enter a valid email address.</span>',
                    },
                    password: {
                        required: '<span class="text-danger">Please enter a password.</span>'
                    },
                    fees: {
                        required: '<span class="text-danger">Please enter fee amount.</span>'
                    },
                    status: {
                        required: '<span class="text-danger">Please select a status.</span>'
                    }
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                }
            });
            $('#email').blur(function () {
                var email = $(this).val();

                $.ajax({
                    url: "{{ route('check_email') }}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        email: email
                    },
                    success: function (response) {
                        if (!response.available) {
                            $('#email_error').text('This email has already been taken.').show();
                        } else {
                            $('#email_error').text('').hide();
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
