@extends('backend.layout.master')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Patients</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Patient</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($patients as $key=>$patient)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('website')}}/{{$patient->image}}" alt="User Image"></a>
                                            <a href="#">{{$patient->name ?? ''}}</a>
                                        </h2>
                                    </td>
                                    <td>{{$patient->age ?? ''}}</td>
                                    <td>{{$patient->phone ?? ''}}</td>
                                    <td>
                                        <div class="status-toggle">
                                            <input type="checkbox" id="status-{{$patient->id}}" class="check change_status" data-id="{{$patient->id}}" @if($patient->status=='active') checked @endif>
                                            <label for="status-{{$patient->id}}" class="checktoggle"> {{$patient->status ?? ''}}</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <form class="deleteForm" action="{{ url('destroy_patient') }}" method="POST" style="margin-left:5px ">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $patient->id }}">
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
    </div>
@endsection
@push('js')
    <script>
        $(document).on('change','.change_status',function(e){
            e.preventDefault();
            var speciality_id     = $(this).attr('data-id');
            var speciality_status     = $(this).is(':checked')?'active':'inactive';
            $.ajax({
                url: "{{ route('patient_change_status') }}",
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
