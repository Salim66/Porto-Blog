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
                                        <th>Post Type</th>
                                        <th>views</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                        <th>Trash</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($all_data as $data)
                                    @php
                                        $featured_info = json_decode($data->featured);
                                    @endphp
                                    <tr>
                                        <td>
                                            @if($featured_info -> post_image != NULL)
                                            <img width="50"
                                                src="{{ URL::to('/') }}/uploads/posts/{{ $featured_info -> post_image }}"
                                                alt="">
                                            @elseif($featured_info -> post_gallery != NULL)
                                            <img width="50"
                                                src="{{ URL::to('/') }}/uploads/posts/{{ $featured_info -> post_gallery[0] }}"
                                                alt="">
                                            @elseif($featured_info->post_video != NULL)
                                            <iframe width="50" height="50" src="{{ $featured_info->post_video }}"
                                                frameborder="0"></iframe>
                                            @elseif($featured_info->post_audio != NULL)
                                            <iframe width="50" height="50" src="{{ $featured_info->post_audio }}"
                                                frameborder="0"></iframe>
                                            @endif
                                        </td>
                                        <td>
                                            @foreach ($data->categories as $category)
                                                {{ $category->name }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($data->tags as $tag)
                                                {{ $tag->name }}
                                            @endforeach
                                        </td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $featured_info->post_type }}</td>
                                        <td>{{ $data->views }}</td>
                                        <td>{{ $data->user->name }}</td>
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
                                            <a title="Edit Post" edit_id="{{ $data->id }}" class="btn btn-info-gradien btn-pill edit_post"><i class="fas fa-edit text-white"></i></a>

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

<style>
    .modal-open .select2-container--open { z-index: 999999 !important; }
    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
        width:400px !important;
    }
</style>
  <!-- Container-fluid Ends-->
  <div id="edit_post" class="modal fade" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
              <div class="modal-title py-3">
                  <h5 class="d-inline float-left ml-3">Edit Post</h5>
                  <button class="close d-inline float-right mr-3" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form class="needs-validation" id="post_edit" novalidate="">
                    <div class="form-row">

                        <input type="hidden" name="id" class="edit_id">

                        <div class="col-md-12 mb-3">
                            <label for="">Post Format</label>
                            <select name="post_type" id="post_format" class="form-control p_type">
                                <option value="">--Select--</option>
                                <option value="Image">Image</option>
                                <option value="Gallery">Gallery</option>
                                <option value="Audio">Audio</option>
                                <option value="Video">Video</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01" style="display: block;">Category</label>
                            <select name="category_id[]" class="form-control js-example-placeholder-multiple category_id  p_cat" id="category_id" multiple="multiple">

                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01"  style="display: block;">Tag</label>
                            <select name="tag_id[]" class="form-control tag_id js-example-placeholder-multiple  p_tag" id="tag_id" multiple="multiple">

                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                          <label for="validationCustom01">Post Title</label>
                          <input
                            class="form-control p_title"
                            id="validationCustom01"
                            type="text"
                            name="title"
                            placeholder="Post Title"
                            required=""
                          />
                        </div>
                        <div class="form-group col-md-12 post_image">
                            <img id="post_image_load" class="post_image" style="width: 400px;" src="" class="d-block" alt=""><br>
                            <label for="post_image"><img style="width: 100px; cursor: pointer;" src="{{ URL::to('/') }}/backend/assets/images/image-file.png" alt=""></label>
                            <input type="file" name="post_image" class="form-control d-none" id="post_image">
                        </div>
                        <div class="form-group col-md-12 post_image_g">
                            <div class="post_gallery_image"></div>
                            <br>
                            <br>
                            <label for="post_image_g"><img style="width: 100px; cursor: pointer;" src="{{ URL::to('/') }}/backend/assets/images/image-file.png" alt=""></label>
                            <input type="file" name="post_gallery_image[]" class="form-control d-none" id="post_image_g" multiple>
                        </div>
                        <div class="form-group col-md-12 post_image_a">
                            <label for="">Post Audio Link</label>
                            <input type="text" name="post_audio" class="form-control post_audio">
                        </div>
                        <div class="form-group col-md-12 post_image_v">
                            <label for="">Post Video Link</label>
                            <input type="text" name="post_video" class="form-control post_video">
                        </div>
                        <div class="col-md-12 mb-3">
                          <textarea name="content" id="content" rows="2" class="content p_content form-control"></textarea>
                        </div>

                        <button class="btn btn-primary" type="submit">
                        Update post
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
<script>

</script>
@endsection