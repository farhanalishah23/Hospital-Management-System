@extends('patient.layout.master')
@section('content')
    <div class="col-md-7 col-lg-8 col-xl-9">
        <form id="yourFormId" enctype="multipart/form-data" method="post" action="{{ url('update_patient_profile') }}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Basic Information</h4>
                    <div class="row form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="change-avatar">
                                    <div class="profile-img">
                                        @if(Auth::user()->image)
                                            <img id="image-preview" src="{{ asset('website') }}/{{ Auth::user()->image }}" alt="Profile Image">
                                        @else
                                            <img id="image-preview" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" alt="Default Profile Image">
                                        @endif
                                    </div>
                                    <div class="upload">
                                        <div class="change-photo-btn">
                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                            <input type="file" name="image" class="upload"> <!-- Changed class name -->
                                        </div>
                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" value="{{Auth::user()->name ?? ''}}" name="name" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" value="{{Auth::user()->email ?? ''}}"  name="email" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" value="{{Auth::user()->phone}}" name="phone" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-0">
                                <label>Age</label>
                                <input type="number" min="20" max="60" name="age" class="form-control" value="{{Auth::user()->age}}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-0">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="{{Auth::user()->address}}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="submit-section submit-btn-bottom">
                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.upload').change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image-preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endpush
