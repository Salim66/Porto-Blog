@extends('Frontend.layouts.master')

@section('title', $data->title)
@section('breadcamb', 'Single Blog')

@section('main-content')
<div class="col-lg-9 order-lg-1">
    <div class="blog-posts single-post">

        @php
        $featured_info = json_decode($data->featured);
        @endphp
        <article class="post post-large blog-single-post border-0 m-0 p-0">
            <div class="post-image ms-0">
                <a href="blog-post.html">
                    @if($featured_info->post_type == 'Image')
                    <img style="height: auto; width: 100%;" src="{{ URL::to('') }}/uploads/posts/{{ $featured_info->post_image }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                   @endif

                   @if($featured_info->post_type == 'Gallery')
                    <img style="height: auto; width: 100%;" src="{{ URL::to('') }}/uploads/posts/{{ $featured_info->post_gallery[1] }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                   @endif


                   @if($featured_info->post_type == 'Video')
                    <iframe style="height: 380px; width: 100%;" src="{{ $featured_info->post_video }}" frameborder="0"></iframe>
                   @endif


                   @if($featured_info->post_type == 'Audio')
                    <iframe style="height: 380px; width: 100%;" src="{{ $featured_info->post_audio }}" frameborder="0"></iframe>
                   @endif
                </a>
            </div>

            <div class="post-date ms-0">
                <span class="day">{{ date('d', strtotime($data->created_at)) }}</span>
                <span class="month">{{ date('M', strtotime($data->created_at)) }}</span>
            </div>

            <div class="post-content ms-0">

                <h2 class="font-weight-semi-bold"><a href="{{ route('single.blog.page', $data->slug) }}">{{ $data->title }}</a></h2>

                <div class="post-meta">
                    <span><i class="far fa-user"></i> By <a href="{{ route('single.user.blog', $data->user->slug) }}">{{ $data->user->name }}</a> </span>
                    <span><i class="fab fa-cuttlefish"></i>
                        @foreach($data->categories as $category)
                        <a href="{{ route('categroy.wise.blog', $category->slug) }}">{{ $category->name }}</a>,
                        @endforeach
                      </span>

                      <span><i class="fas fa-tags"></i>
                        @foreach($data->tags as $tag)
                        <a href="{{ route('tag.wise.blog', $tag->slug) }}">{{ $tag->name }}</a>,
                        @endforeach
                       </span>
                    <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
                    <span><i class="far fa-eye"></i> <a href="#">{{ $data->views }} Views</a></span>
                </div>

                <p>{!! htmlspecialchars_decode($data->content) !!}</p>



                <div class="post-block mt-5 post-share">
                    <h4 class="mb-3">Share this Post</h4>

                    <!-- AddThis Button BEGIN -->
                    <div class="addthis_toolbox addthis_default_style ">
                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                        <a class="addthis_button_tweet"></a>
                        <a class="addthis_button_pinterest_pinit"></a>
                        <a class="addthis_counter addthis_pill_style"></a>
                    </div>
                    <script type="text/javascript" src="../../../../s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
                    <!-- AddThis Button END -->

                </div>

                <div class="post-block mt-4 pt-2 post-author">
                    <h4 class="mb-3">Author</h4>
                    <div class="img-thumbnail img-thumbnail-no-borders d-block pb-3">
                        <a href="blog-post.html">
                            <img src="img/avatars/avatar.jpg" alt="">
                        </a>
                    </div>
                    <p><strong class="name"><a href="#" class="text-4 pb-2 pt-2 d-block">John Doe</a></strong></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui. </p>
                </div>



                <div id="comments" class="post-block mt-5 post-comments">
                    <h4 class="mb-3">Comments (3)</h4>

                    @php
                        $comments = App\Models\Comment::latest()->get();

                        // dd($comments);
                    @endphp

                    <ul class="comments" id="showComments">


                    </ul>

                </div>





                <div class="post-block mt-5 post-leave-comment">
                    <h4 class="mb-3">Leave a comment</h4>

                    <form class="contact-form p-4 rounded bg-color-grey" id="comment_store" action="" method="POST">
                        <div class="p-2">
                            <div class="row">
                                <div class="form-group col">
                                    <input type="hidden" name="post_id" id="post_id" value="{{ $data->id }}">
                                    <label class="form-label required font-weight-bold text-dark">Comment</label>
                                    <textarea maxlength="5000" data-msg-required="Please enter your comment." rows="8" class="form-control" id="text" name="text" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col mb-0">
                                    <input type="submit" value="Post Comment" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </article>

    </div>
</div>

@endsection
