@extends('Backend.layout.app')

@section('main-content')
<!-- Container-fluid starts-->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12">
            <div class="card">
            <div class="card-header">
                <h5>Users List</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="display" id="advance-1">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>User Name</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Trash</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($all_data as $data)
                    <tr>
                        <td>
                            <img style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid #9900ff" src="{{ URL::to('') }}/uploads/users/{{ $data->photo }}" alt="User Image" onerror="this.src='uploads/users/avatar3.png'">
                        </td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->user_type }}</td>
                        <td>{{ $data->status }}</td>
                        <td>{{ $data->trash }}</td>
                        <td>
                            <a title="Edit User" href="" class="btn btn-info-gradien btn-pill"><i class="fas fa-user-edit"></i></a>
                            {{-- <a href="" class="btn btn-danger-gradien btn-pill"><i class="fas fa-trash-alt"></i></a> --}}
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        <!-- DOM / jQuery  Ends-->
        </div>
    </div>
</div>
  <!-- Container-fluid Ends-->
@endsection
