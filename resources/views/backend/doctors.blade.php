@extends('backend.layout.master')
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-sm-7 col-auto">
            <h3 class="page-title">Doctors</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Doctor</li>
            </ul>
        </div>
        <div class="col-sm-5 col">
            <a href="{{url('add_doctor')}}"  class="btn btn-primary float-right mt-2">Add</a>
        </div>
    </div>

</div>
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
                            <th>Speciality</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($doctors as $key=>$doctor)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('website')}}/{{$doctor->image}}" alt="User Image"></a>
                                    <a href="#">{{$doctor->name ?? ''}}</a>
                                </h2>
                            </td>
                            <td>{{$doctor->speciality->name ?? ''}}</td>
                            <td>{{$doctor->created_at->format(env('DATE_FORMAT')) ?? ''}}</td>
                            <td>
                                <div class="status-toggle">
                                    <input type="checkbox" id="status-{{$doctor->id}}" class="check change_status" data-id="{{$doctor->id}}" @if($doctor->status=='active') checked @endif>
                                    <label for="status-{{$doctor->id}}" class="checktoggle"> {{$doctor->status ?? ''}}</label>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-sm bg-success-light" href="{{url('show_doctor' , $doctor->id)}}">
                                        <i class="fe fe-pencil"></i> Edit
                                    </a>
                                    <form class="deleteForm" action="{{ url('destroy_doctor') }}" method="POST" style="margin-left:5px ">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $doctor->id }}">
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
@endsection

@push('js')
    <script>
        $(document).on('change','.change_status',function(e){
            e.preventDefault();
            var speciality_id     = $(this).attr('data-id');
            var speciality_status     = $(this).is(':checked')?'active':'inactive';
            $.ajax({
                url: "{{ route('doctor_change_status') }}",
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
