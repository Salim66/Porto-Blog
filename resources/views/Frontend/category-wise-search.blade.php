@extends('Frontend.layouts.master')


@section('main-content')
<div class="col-lg-9 order-lg-1">
    <div class="blog-posts">
       <div class="row px-3">

        @foreach($category->posts as $data)
            @php
            $featured_info = json_decode($data->featured);
            @endphp
          <div class="col-sm-6">
             <article class="post post-medium border-0 pb-0 mb-5">
                <div class="post-image">
                   <a href="blog-post.html">

                       @if($featured_info->post_type == 'Image')
                        <img style="height: 270px; width: 380px;" src="{{ URL::to('') }}/uploads/posts/{{ $featured_info->post_image }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                       @endif

                       @if($featured_info->post_type == 'Gallery')
                        <img style="height: 270px; width: 380px;" src="{{ URL::to('') }}/uploads/posts/{{ $featured_info->post_gallery[1] }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                       @endif


                       @if($featured_info->post_type == 'Video')
                        <iframe style="height: 270px; width: 380px;" src="{{ $featured_info->post_video }}" frameborder="0"></iframe>
                       @endif


                       @if($featured_info->post_type == 'Audio')
                        <iframe style="height: 270px; width: 380px;" src="{{ $featured_info->post_audio }}" frameborder="0"></iframe>
                       @endif



                    </a>
                </div>
                <div class="post-content">
                   <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="{{ route('single.blog.page', $data->slug) }}">{{ $data->title }}</a></h2>
                   <p>{!! Str::of(htmlspecialchars_decode($data->content))->words('5', '<span style="color:red;">>>></span>') !!}</p>
                   <div class="post-meta">
                      <span><i class="far fa-user"></i> By <a href="{{ route('single.user.blog', $data->user->slug) }}">{{ $data->user->name }}</a> </span>
                      <span><i class="fab fa-cuttlefish"></i>
                        @foreach($data->categories as $category)
                        <a href="{{ route('categroy.wise.blog', $category->slug) }}">{{ $category->name }}</a>,
                        @endforeach
                      </span>

                      <span><i class="fas fa-tags"></i>
                        @foreach($data->tags as $tag)
                        <a href="#">{{ $tag->name }}</a>,
                        @endforeach
                       </span>
                      <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
                      <span><i class="far fa-eye"></i> <a href="#">{{ $data->views }} Views</a></span>
                      <span class="d-block mt-2"><a href="{{ route('single.blog.page', $data->slug) }}" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                   </div>
                </div>
             </article>
          </div>
        @endforeach

       </div>



    </div>
 </div>
@endsection
