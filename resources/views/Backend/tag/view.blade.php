@extends('Backend.layout.app')

@section('main-content')
<!-- Container-fluid starts-->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tags List</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>Tag Name</th>
                                        <th>Status</th>
                                        <th>Trash</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($all_data as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>

                                            <div class="media-body text-center switch-sm">
                                                <label class="switch">
                                                <input type="checkbox" class="tag_status_update" data_id="{{ $data->id }}" @if($data->status == true) checked="" @endif><span class="switch-state"></span>
                                                </label>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="media-body text-center switch-sm">
                                                <label class="switch">
                                                <input type="checkbox" class="tag_trash_update" data_id="{{ $data->id }}" @if($data->trash == false) checked="" @endif><span class="switch-state"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <a title="Edit Tag" edit_id="{{ $data->id }}" class="btn btn-info-gradien btn-pill edit_tag"><i class="fas fa-edit text-white"></i></a>

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
  <div id="edit_tag" class="modal fade">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-title py-3">
                  <h5 class="d-inline float-left ml-3">Edit Tag</h5>
                  <button class="close d-inline float-right mr-3" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form class="needs-validation" id="tag_edit" novalidate="">
                    <div class="form-row">

                        <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Tag Name</label>
                        <input type="hidden" name="id" class="edit_id">
                        <input
                            class="form-control t_name"
                            id="validationCustom01"
                            type="text"
                            name="name"
                            placeholder="Tag name"
                            required=""
                        />
                        </div>
                        <button class="btn btn-primary" type="submit">
                        Update tag
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
