@extends('Backend.layout.app')

@section('main-content')
<!-- Container-fluid starts-->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Category Trash List</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>Parent Id</th>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Trash</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($all_data as $data)
                                    <tr>
                                        <td>{{ $data->parent_id }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>

                                            <div class="media-body text-center switch-sm">
                                                <label class="switch">
                                                <input type="checkbox" class="category_status_update" data_id="{{ $data->id }}" @if($data->status == true) checked="" @endif><span class="switch-state"></span>
                                                </label>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="media-body text-center switch-sm">
                                                <label class="switch">
                                                <input type="checkbox" class="category_trash_update_1" data_id="{{ $data->id }}" @if($data->trash == true) checked="" @endif><span class="switch-state"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            {{-- <a title="Delete Category" delete_id="{{ $data->id }}" class="btn btn-danger-gradien btn-pill delete_category"><i class="fas fa-trash text-white"></i></a> --}}

                                            <form style="display: inline;" action="{{ route('categories.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button delete_id="{{ $data->id }}" type="submit" id="delete" class="btn btn-danger-gradien btn-pill"><i class="fas fa-trash text-white"></i></button>
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
  <div id="edit_users" class="modal fade">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-title py-3">
                  <h5 class="d-inline float-left ml-3">Edit User</h5>
                  <button class="close d-inline float-right mr-3" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form class="needs-validation" id="uase_edit" novalidate="">
                    <div class="form-row">

                      <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Full name</label>
                        <input type="hidden" name="id" class="id">
                        <input
                          class="form-control f_name"
                          id="validationCustom01"
                          type="text"
                          name="name"
                          placeholder="First name"
                          required=""
                        />
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="validationCustom02">Email</label>
                        <input
                          class="form-control f_email"
                          id="validationCustom02"
                          type="email"
                          name="email"
                          placeholder="Last name"
                          required=""
                        />
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="validationCustom01">User Type</label>
                        <select name="user_type" class="form-control user_type" id="validationCustom01">
                            <option selected>Select Type</option>
                            <option value="Admin">Admin</option>
                            <option value="Modaretor">Modaretor</option>
                            <option value="User">User</option>
                        </select>
                        </div>

                    <button class="btn btn-primary" type="submit">
                      Update user
                    </button>
                  </form>
              </div>
              <div></div>
          </div>
      </div>
  </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

@endsection
