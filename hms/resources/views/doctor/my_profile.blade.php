@extends('doctor.layout.master')
@section('content')
    <div class="col-md-7 col-lg-8 col-xl-9">
        <form id="yourFormId" enctype="multipart/form-data" method="post" action="{{ url('update_doctor_profile') }}">
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
                                            <img id="image-preview" src="{{ asset('website') }}/{{ Auth::user()->image }}" alt="Profile Image" >
                                        @else
                                            <img id="image-preview" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" alt="Default Profile Image" >
                                        @endif
                                    </div>
                                    <div class="upload-img">
                                        <div class="change-photo-btn">
                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                            <input type="file" name="image" class="upload">
                                        </div>
                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" value="{{Auth::user()->name ?? ''}}" name="name" class="form-control" >
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
                                <input type="text" class="form-control" value="{{Auth::user()->phone}}" name="phone">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fees</label>
                                <input type="text" class="form-control" value="{{Auth::user()->fees}}" name="fees">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-0">
                                <label>Age</label>
                                <input type="number" min="20" max="60" name="age" class="form-control" value="{{Auth::user()->age}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-0">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="{{Auth::user()->address}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">About Me</h4>
                    <div class="form-group mb-0">
                        <label>Bio</label>
                        <textarea class="form-control" name="bio" rows="5">{{Auth::user()->bio}}</textarea>
                    </div>
                </div>
            </div>

            <div class="card services-card">
                <div class="card-body">
                    <h4 class="card-title">Services and Specialization</h4>

                    <div class="form-group mb-0">
                        <label>Specialization </label>
                        <input class="input-tags form-control"   type="text" data-role="tagsinput" placeholder="Enter Specialization"  value="{{Auth::user()->speciality->name ?? ''}}" id="specialist" readonly>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Education</h4>
@if(isset($education) && !empty($education))
    @foreach ($education['degree'] as $key => $item)
        <div class="education-info">
            <div class="row form-row education-cont">
                <div class="col-12 col-md-10 col-lg-11">
                    <div class="row form-row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>Degree</label>
                                <input type="text" name="education[degree][]" value="{{ $item }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>College/Institute</label>
                                <input type="text" name="education[collage][]" value="{{ isset($education['collage'][$key]) ? $education['collage'][$key] : '' }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>Year of Completion</label>
                                <input type="date" name="education[year][]" value="{{ isset($education['year'][$key]) ? $education['year'][$key] : '' }}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <!-- Show empty fields -->
    <div class="education-info">
        <div class="row form-row education-cont">
            <div class="col-12 col-md-10 col-lg-11">
                <div class="row form-row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>Degree</label>
                            <input type="text" name="education[degree][]" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>College/Institute</label>
                            <input type="text" name="education[collage][]" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>Year of Completion</label>
                            <input type="date" name="education[year][]" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

                    <div class="add-more">
                        <a href="javascript:void(0);" class="add-education"><i class="fa fa-plus-circle"></i> Add More</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Experience</h4>
                    <div class="experience-info">
                        <div class="row form-row experience-cont">
                            <div class="col-12 col-md-10 col-lg-11">
                                <div class="row form-row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Hospital Name</label>
                                            <input type="text" name="experience[hospital_name][]"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>From</label>
                                            <input type="date"  name="experience[from][]"   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>To</label>
                                            <input type="date" name="experience[to][]"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" name="experience[designation][]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-more">
                        <a href="javascript:void(0);" class="add-experience"><i class="fa fa-plus-circle"></i> Add More</a>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Awards</h4>
                    <div class="awards-info">
                        <div class="row form-row awards-cont">
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Awards</label>
                                    <input type="text" name="award[award_title][]"  class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="date" name="award[award_year][]"  class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-more">
                        <a href="javascript:void(0);" class="add-award"><i class="fa fa-plus-circle"></i> Add More</a>
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
    <script src="{{asset('website')}}/assets/js/profile-settings.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
 <script>
        $(document).ready(function() {
            $('#yourFormId').validate({
                rules: {
                    name: {
                        required: true
                    },
                },
                messages: {
                    name: {
                        required: "Please enter your name"
                    },

                }
            });

            // Image preview
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
