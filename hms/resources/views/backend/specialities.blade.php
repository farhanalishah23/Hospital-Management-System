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
                <a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
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
                                @foreach($specialities as $key=>$speciality)
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
                                            <div class="actions">
                                                <a class="btn btn-sm bg-success-light" data-toggle="modal" href="#">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                                <a  data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Add Modal -->
    <div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Speciality</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="{{url('add_speciality')}}">
                        @csrf
                        <div class="row form-row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Image *</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12" >
                                <div class="form-group">
                                    <label class="form-label" for="status">Status *</label>
                                    <select class="form-control " name="status" id="status" required>
                                        <option  value="active" selected>Active</option>
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
    <!-- /ADD Modal -->
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
@endpush
