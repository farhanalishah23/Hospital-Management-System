@extends('backend.layout.master')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-sm-7 col-auto">
                <h3 class="page-title">Add Doctor</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Doctor</li>
                </ul>
            </div>
        </div>

    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Doctor</h4>
        </div>
        <div class="card-body">
            <form  method="post" enctype="multipart/form-data" action="{{url('store_doctor')}}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="speciality_id">Select Speciality *</label>
                    <select class="form-control" name="speciality_id" id="speciality_id">
                        @if($specialities->isEmpty())
                            <option value="" selected disabled>No speciality available</option>
                        @else
                            <option value="" selected disabled>Select Speciality</option>
                            @foreach($specialities as $speciality)
                                <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label>Name *</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email Address *</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password *</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Image *</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                        <label class="form-label" for="status">Status *</label>
                        <select class="form-control " name="status" id="status" required>
                            <option  value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                </div>
                <div class="text-right">
                    <a href="{{url('doctors')}}" class="btn btn-light">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
