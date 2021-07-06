@extends('Backend.layout.app')

@section('main-content')
<!-- Container-fluid starts-->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12">
            <div class="card">
            <div class="card-header">
                <h5>Post Add</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" id="post_add" novalidate="" enctype="multipart/form-data">
                    <div class="form-row">

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
                        <label for="validationCustom01">Category</label>
                        <select name="category_id[]" class="form-control category_id js-example-placeholder-multiple p_cat" id="validationCustom01" multiple="multiple">
                            <option value="0">Select Category</option>
                            @foreach($all_category as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">Tag</label>
                        <select name="tag_id[]" class="form-control tag_id js-example-placeholder-multiple p_tag" id="validationCustom01" multiple="multiple">
                            <option value="0">Select Tag</option>
                            @foreach($all_tag as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
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
                        <img id="post_image_load" style="width: 400px;" src="" class="d-block" alt="">
                        <label for="post_image"><img style="width: 100px; cursor: pointer;" src="{{ URL::to('/') }}/backend/assets/images/image-file.png" alt=""></label>
                        <input type="file" name="post_image" class="form-control d-none" id="post_image">
                    </div>
                    <div class="form-group col-md-12 post_image_g">
                        {{-- <div class="post_gallery_image"></div>
                        <br>
                        <br>
                        <label for="post_image_g"><img style="width: 100px; cursor: pointer;" src="{{ URL::to('/') }}/backend/assets/images/image-file.png" alt=""></label>
                        <input type="file" name="post_gallery_image[]" class="form-control d-none" id="post_image_g" multiple> --}}


                    </div>
                    <div class="form-group col-md-12 post_image_a">
                        <label for="">Post Audio Link</label>
                        <input type="text" name="post_audio" class="form-control">
                        <font style="color: red;">{{ ($errors->has('post_audio'))? $errors->first('post_audio') : '' }}</font>
                    </div>
                    <div class="form-group col-md-12 post_image_v">
                        <label for="">Post Video Link</label>
                        <input type="text" name="post_video" class="form-control">
                        <font style="color: red;">{{ ($errors->has('post_video'))? $errors->first('post_video') : '' }}</font>
                    </div>
                    <div class="col-md-12 mb-3">
                      <textarea name="content" id="content" rows="2" class="content p_content form-control"></textarea>
                    </div>

                    <button class="btn btn-primary" type="submit">
                        Add post
                    </button>
                  </div>
                </form>
              </div>
            </div>
        </div>
        <!-- DOM / jQuery  Ends-->
        </div>
    </div>
</div>
  <!-- Container-fluid Ends-->
  <br>
  <br>

@endsection
