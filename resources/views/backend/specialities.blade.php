@extends('backend.layout.master')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-sm-7 col-auto">
                <h3 class="page-title">Specialities</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Specialities</li>
                </ul>
            </div>
            <div class="col-sm-5 col">
                <a href="#add_specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($specialities as $key=>$speciality)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="#" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img" src="{{asset('website')}}/{{$speciality->image}}" alt="Speciality">
                                                </a>
                                                <a >{{$speciality->name}}</a>
                                            </h2>
                                        </td>
                                        <td>
                                            <div class="status-toggle">
                                                <input type="checkbox" id="status-{{$speciality->id}}" class="check change_status" data-id="{{$speciality->id}}" @if($speciality->status=='active') checked @endif>
                                                <label for="status-{{$speciality->id}}" class="checktoggle"> {{$speciality->status}}</label>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a class="btn btn-sm bg-success-light"  href="#edit_specialities_details" data-toggle="modal" data-speciality_id="{{$speciality->id}}" data-speciality_name="{{$speciality->name}}" data-speciality_image="{{ asset('website/' . $speciality->image) }}">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>

                                                <form class="deleteForm" action="{{ url('destroy_speciality') }}" method="POST" style="margin-left:5px ">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{ $speciality->id }}">
                                                    <button class="btn btn-sm bg-danger-light deleteButton"  type="button"><i class="fe fe-trash"></i>Delete</button>
                                                </form>
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
    <!-- Add Modal -->
    <div class="modal fade" id="add_specialities_details" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Speciality</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addSpeciality" method="post" enctype="multipart/form-data" action="{{url('add_speciality')}}">
                        @csrf
                        <div class="row form-row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Name <span style="color: red;">*</span></label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Image <span style="color: red;">*</span></label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12" >
                                <div class="form-group">
                                    <label class="form-label" for="status">Status <span style="color: red;">*</span></label>
                                    <select class="form-control " name="status" id="status">
                                        <option  value="" disabled selected>Select Status</option>
                                        <option  value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ADD Modal -->
    <!-- Edit Modal -->
    <div class="modal fade" id="edit_specialities_details" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Speciality</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="{{url('update_speciality')}}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_speciality_id" name="speciality_id" class="form-control">
                        <div class="row form-row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Name <span style="color: red;">*</span></label>
                                    <input type="text" name="name" id="edit_speciality_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Image </label>
                                    <input type="file" name="image" id="edit_speciality_image" class="form-control" >
                                    @if ($speciality->image)
                                        <img id="modal_speciality_image" src="" alt="Speciality Image" style="height: 50px;">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal -->
@endsection
@push('js')
    <script>
        $(document).on('change','.change_status',function(e){
            e.preventDefault();
            var speciality_id     = $(this).attr('data-id');
            var speciality_status     = $(this).is(':checked')?'active':'inactive';
            $.ajax({
                url: "{{ route('change_status') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    speciality_id : speciality_id,
                    speciality_status  : speciality_status
                },
                success: function (response) {
                    Swal.fire({
                        title: "Done",
                        text: "Status updated successfully",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 800
                    });
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        title: "Fail",
                        text: "Unable to update speciality",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 800
                    });
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '[data-toggle="modal"]', function(e) {
            e.preventDefault();
            var speciality_id = $(this).data('speciality_id');
            var speciality_name = $(this).data('speciality_name');
            var speciality_image = $(this).data('speciality_image');
            $('#edit_speciality_id').val(speciality_id);
            $('#edit_speciality_name').val(speciality_name);
            $('#modal_speciality_image').attr('src', speciality_image);
            $('#Edit_Specialities_details').modal('show');
        });
        $(document).on('click', '.close', function(e){
            e.preventDefault();
            $('#Edit_Specialities_details').modal('hide');
        });
    </script>
    <script>
        $(document).ready(function (){
            $('#addSpeciality').validate({
                rules : {
                    name:{
                        required: true,
                    },
                    image:{
                        required:true,
                    },
                    status: {
                        required: true,
                    }
                },
                messages : {
                    name: {
                        required: '<span class="text-danger">Please Enter Name.</span>',
                    },
                    image: {
                        required: '<span class="text-danger">Please Upload Image.</span>',
                    },
                    status: {
                        required: '<span class="text-danger">Please Select Status.</span>',
                    }
                }
            });
        });
    </script>
@endpush
