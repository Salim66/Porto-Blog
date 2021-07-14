@extends('Backend.layout.app')

@section('main-content')
<!-- Container-fluid starts-->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tag Trash List</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>Tag Name</th>
                                        <th>Status</th>
                                        <th>Trash Remove</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tag_trash_table">

{{--                                    @foreach($all_data as $data)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $data->name }}</td>--}}
{{--                                        <td>--}}

{{--                                            <div class="media-body text-center switch-sm">--}}
{{--                                                <label class="switch">--}}
{{--                                                <input type="checkbox" class="tag_status_update" data_id="{{ $data->id }}" @if($data->status == true) checked="" @endif><span class="switch-state"></span>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}

{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <div class="media-body text-center switch-sm">--}}
{{--                                                <label class="switch">--}}
{{--                                                <input type="checkbox" class="tag_trash_update_1" data_id="{{ $data->id }}" @if($data->trash == true) checked="" @endif><span class="switch-state"></span>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <form style="display: inline;" action="{{ route('tags.destroy', $data->id) }}" method="POST">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button delete_id="{{ $data->id }}" type="submit" id="delete" class="btn btn-danger-gradien btn-pill"><i class="fas fa-trash text-white"></i></button>--}}
{{--                                            </form>--}}

{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}

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
