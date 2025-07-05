@extends('backend.layout.master')
@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Profile</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">
            <div class="profile-header">
                <div class="row align-items-center">
                    <div class="col-auto profile-image">
                        <a href="#">
                            @if(Auth::user()->image)
                                <img id="image-preview" src="{{ asset('website') }}/{{ Auth::user()->image }}" alt="Profile Image" class="rounded-circle">
                            @else
                                <img id="image-preview" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" alt="Default Profile Image" class="rounded-circle">
                            @endif
                        </a>
                    </div>
                    <div class="col ml-md-n2 profile-user-info">
                        <h4 class="user-name mb-0">{{Auth::user()->name}}</h4>
                        <h6 class="text-muted"><a href="https://www.templateshub.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6d1f140c03190c1401021f2d0c09000403430e0200">&#160;{{Auth::user()->email}}</a></h6>
                        <div class="about-text">{{Auth::user()->bio}}</div>
                    </div>

                </div>
            </div>
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content profile-tab-cont">

                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="per_details_tab">

                    <!-- Personal Details -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Personal Details</span>
                                        <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
                                    </h5>
                                    <div class="row">
                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                        <p class="col-sm-10">{{Auth::user()->name ?? ''}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Age</p>
                                        <p class="col-sm-10">{{Auth::user()->age ?? ''}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                        <p class="col-sm-10"><a href="https://www.templateshub.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="9af0f5f2f4fef5ffdaffe2fbf7eaf6ffb4f9f5f7">&#160;{{Auth::user()->email}}</a></p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                        <p class="col-sm-10">{{Auth::user()->phone ?? ''}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
                                        <p class="col-sm-10 mb-0">{{Auth::user()->address ?? ''}}<br>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Details Modal -->
                            <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document" >
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Personal Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" enctype="multipart/form-data" action="{{url('update_profile', Auth::user()->id)}}">
                                                @csrf
                                                @method('PUT')
                                                <div class="row form-row">
                                                    <div class="col-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Name *</label>
                                                            <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Email *</label>
                                                            <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Mobile</label>
                                                            <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Address *</label>
                                                            <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Bio</label>
                                                            <textarea class="form-control" name="bio">{{Auth::user()->bio}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Age</label>
                                                            <input type="number" min="20" max="60" name="age" class="form-control" value="{{Auth::user()->age}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Image</label>
                                                            <input type="file" name="image" >
                                                            <img  src="{{ asset('website') }}/{{ Auth::user()->image }}" alt="Profile Image" style="height: 50px">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Edit Details Modal -->

                        </div>


                    </div>
                    <!-- /Personal Details -->

                </div>
                <!-- /Personal Details Tab -->

                <!-- Change Password Tab -->
                <div id="password_tab" class="tab-pane fade">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Change Password</h5>
                            <div class="row">
                                <div class="col-md-10 col-lg-6">
                                    <form>
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Change Password Tab -->

            </div>
        </div>
    </div>
@endsection
