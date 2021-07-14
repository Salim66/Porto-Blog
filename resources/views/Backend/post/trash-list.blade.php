@extends('Backend.layout.app')

@section('main-content')
<!-- Container-fluid starts-->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Post Trash List</h5>
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
                                        <th>Post Type</th>
                                        <th>views</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                        <th>Trash Remove</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="post_trash_table">


{{--                                    @foreach($all_data as $data)--}}
{{--                                    @php--}}
{{--                                        $featured_info = json_decode($data->featured);--}}
{{--                                    @endphp--}}
{{--                                    <tr  class="{{ $data->id }}">--}}
{{--                                        <td>--}}
{{--                                            @if($featured_info -> post_image != NULL)--}}
{{--                                            <img width="50"--}}
{{--                                                src="{{ URL::to('/') }}/uploads/posts/{{ $featured_info -> post_image }}"--}}
{{--                                                alt="">--}}
{{--                                            @elseif($featured_info -> post_gallery != NULL)--}}
{{--                                            <img width="50"--}}
{{--                                                src="{{ URL::to('/') }}/uploads/posts/{{ $featured_info -> post_gallery[0] }}"--}}
{{--                                                alt="">--}}
{{--                                            @elseif($featured_info->post_video != NULL)--}}
{{--                                            <iframe width="50" height="50" src="{{ $featured_info->post_video }}"--}}
{{--                                                frameborder="0"></iframe>--}}
{{--                                            @elseif($featured_info->post_audio != NULL)--}}
{{--                                            <iframe width="50" height="50" src="{{ $featured_info->post_audio }}"--}}
{{--                                                frameborder="0"></iframe>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @foreach ($data->categories as $category)--}}
{{--                                                {{ $category->name }}--}}
{{--                                            @endforeach--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @foreach ($data->tags as $tag)--}}
{{--                                                {{ $tag->name }}--}}
{{--                                            @endforeach--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $data->title }}</td>--}}
{{--                                        <td>{{ $featured_info->post_type }}</td>--}}
{{--                                        <td>{{ $data->views }}</td>--}}
{{--                                        <td>{{ $data->user->name }}</td>--}}
{{--                                        <td>--}}

{{--                                            <div class="media-body text-center switch-sm">--}}
{{--                                                <label class="switch">--}}
{{--                                                <input type="checkbox" class="post_status_update" data_id="{{ $data->id }}" @if($data->status == true) checked="" @endif><span class="switch-state"></span>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}

{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <div class="media-body text-center switch-sm">--}}
{{--                                                <label class="switch">--}}
{{--                                                <input type="checkbox" class="post_trash_update_1" data_id="{{ $data->id }}" @if($data->trash == true) checked="" @endif><span class="switch-state"></span>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <form style="display: inline;" action="{{ route('posts.destroy', $data->id) }}" method="POST">--}}
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
