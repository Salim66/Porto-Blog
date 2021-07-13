@extends('Backend.layout.app')

@section('main-content')
<!-- Container-fluid starts-->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Users Trash List</h5>
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
                                        <th>Trash Remove</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="user_trash_list">


                                    @foreach($all_data as $data)
                                    <tr>
                                        <td>
                                            <img style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid #9900ff" src="{{ URL::to('') }}/uploads/users/{{ $data->photo }}" alt="User Image" onerror="this.src='{{ asset("/uploads/users/avatar3.png") }}'">
                                        </td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->user_type }}</td>
                                        <td>

                                            <div class="media-body text-center switch-sm">
                                                <label class="switch">
                                                <input type="checkbox" class="user_status_update" data_id="{{ $data->id }}" @if($data->status == true) checked="" @endif><span class="switch-state"></span>
                                                </label>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="media-body text-center switch-sm">
                                                <label class="switch">
                                                <input type="checkbox" class="user_trash_update_1" data_id="{{ $data->id }}" @if($data->trash == true) checked="" @endif><span class="switch-state"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <form style="display: inline;" action="{{ route('users.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button title="User Delete" delete_id="{{ $data->id }}" type="submit" id="delete" class="btn btn-danger-gradien btn-pill"><i class="fas fa-trash text-white"></i></button>
                                            </form>

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
