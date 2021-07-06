@extends('Backend.layout.app')

@section('main-content')
<!-- Container-fluid starts-->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Post List</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>Photos</th>
                                        <th>Cat Name</th>
                                        <th>Tag Name</th>
                                        <th>Post Name</th>
                                        <th>views</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                        <th>Trash</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($all_data as $data)
                                    <tr>
                                        <td>
                                            <img style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid #9900ff" src="{{ URL::to('') }}/uploads/users/{{ $data->featured_image }}" alt="User Image" onerror="this.src='uploads/users/avatar3.png'">
                                        </td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->views }}</td>
                                        <td>{{ $data->user_id }}</td>
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
                                                <input type="checkbox" class="category_trash_update" data_id="{{ $data->id }}" @if($data->trash == false) checked="" @endif><span class="switch-state"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <a title="Edit Category" edit_id="{{ $data->id }}" class="btn btn-info-gradien btn-pill edit_category"><i class="fas fa-user-edit text-white"></i></a>

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
  <div id="edit_category" class="modal fade">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-title py-3">
                  <h5 class="d-inline float-left ml-3">Edit Category</h5>
                  <button class="close d-inline float-right mr-3" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form class="needs-validation" id="category_edit" novalidate="">
                    <div class="form-row">

                        <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Category Name</label>
                        <input type="hidden" name="id" class="edit_id">
                        <input
                            class="form-control c_name"
                            id="validationCustom01"
                            type="text"
                            name="name"
                            placeholder="Category name"
                            required=""
                        />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Parent Category</label>
                            <select name="parent_id" class="form-control parent_id" id="validationCustom01">
                                <option value="0">Select Category</option>
                                @foreach($all_data as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit">
                        Update category
                        </button>
                    </div>
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
