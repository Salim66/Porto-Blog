
<div class="col-lg-3 order-lg-2">
    <aside class="sidebar">
        <form action="{{ route('search.post') }}" method="POST">
            @csrf
            <div class="input-group mb-3 pb-1">
                <input class="form-control text-1" placeholder="Search..." name="search" id="s" type="text">
                <button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
            </div>
        </form>
        <h5 class="font-weight-semi-bold pt-4">Categories</h5>
        <ul class="nav nav-list flex-column mb-5">

            @php

                $categories = App\Models\Category::withCount('posts')->where('status', true)->where('trash', false)->where('parent_id', 0)->latest()->get();
                // dd($categories);
            @endphp
            @foreach($categories as $category)
                @if($category->posts_count > 0)
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('categroy.wise.blog', $category->slug) }}">{{ $category->name }} ({{ $category->posts_count }})</a>

                        <ul>
                            @foreach($category->categories as $sub_category)
                            <li class="nav-item"><a class="nav-link" href="{{ route('categroy.wise.blog', $sub_category->slug) }}">{{ $sub_category->name }}</a></li>
                            @endforeach
                        </ul>

                    </li>
                @endif
            @endforeach

        </ul>
        <div class="tabs tabs-dark mb-4 pb-2">
            <ul class="nav nav-tabs">
                <li class="nav-item"><button class="nav-link show active text-1 font-weight-bold text-uppercase" data-filter=".popular">Popular</button></li>
                <li class="nav-item"><button class="nav-link text-1 font-weight-bold text-uppercase" data-filter=".recent">Recent</button></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane popular active" id="popularPosts">
                    <ul class="simple-post-list">

                        @php

                            $posts = App\Models\Post::where('views', '>=', 5)->take(3)->get();

                        @endphp
                        @foreach($posts as $data)
                            @php
                            $featured_info = json_decode($data->featured);
                            @endphp
                        <li>
                            <div class="post-image">
                                <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                    <a href="blog-post.html">
                                        @if($featured_info->post_type == 'Image')
                                        <img style="height: 40px; width: 40px;" src="{{ URL::to('') }}/uploads/posts/{{ $featured_info->post_image }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                       @endif

                                       @if($featured_info->post_type == 'Gallery')
                                        <img style="height: 40px; width: 40px;" src="{{ URL::to('') }}/uploads/posts/{{ $featured_info->post_gallery[1] }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                       @endif


                                       @if($featured_info->post_type == 'Video')
                                        <iframe style="height: 40px; width: 40px;" src="{{ $featured_info->post_video }}" frameborder="0"></iframe>
                                       @endif


                                       @if($featured_info->post_type == 'Audio')
                                        <iframe style="height: 40px; width: 40px;" src="{{ $featured_info->post_audio }}" frameborder="0"></iframe>
                                       @endif
                                    </a>
                                </div>
                            </div>
                            <div class="post-info">
                                <a href="blog-post.html">{{ Str::words($data->title, 3, '...') }}</a>
                                <div class="post-meta">
                                     {{ date('M d, Y', strtotime($data->created_at)) }}
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
                <div class="tab-pane recent" id="recentPosts">
                    <ul class="simple-post-list">
                        @php

                        $posts = App\Models\Post::take(3)->latest()->get();

                    @endphp
                    @foreach($posts as $data)
                        @php
                        $featured_info = json_decode($data->featured);
                        @endphp
                    <li>
                        <div class="post-image">
                            <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                <a href="blog-post.html">
                                    @if($featured_info->post_type == 'Image')
                                    <img style="height: 40px; width: 40px;" src="{{ URL::to('') }}/uploads/posts/{{ $featured_info->post_image }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                   @endif

                                   @if($featured_info->post_type == 'Gallery')
                                    <img style="height: 40px; width: 40px;" src="{{ URL::to('') }}/uploads/posts/{{ $featured_info->post_gallery[1] }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                   @endif


                                   @if($featured_info->post_type == 'Video')
                                    <iframe style="height: 40px; width: 40px;" src="{{ $featured_info->post_video }}" frameborder="0"></iframe>
                                   @endif


                                   @if($featured_info->post_type == 'Audio')
                                    <iframe style="height: 40px; width: 40px;" src="{{ $featured_info->post_audio }}" frameborder="0"></iframe>
                                   @endif
                                </a>
                            </div>
                        </div>
                        <div class="post-info">
                            <a href="blog-post.html">{{ Str::words($data->title, 3, '...') }}</a>
                            <div class="post-meta">
                                 {{ date('M d, Y', strtotime($data->created_at)) }}
                            </div>
                        </div>
                    </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <h5 class="font-weight-semi-bold pt-4">About Us</h5>
        <p>Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Nulla nunc dui, tristique in semper vel. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. </p>
        <h5 class="font-weight-semi-bold pt-4">Latest from Twitter</h5>
        <div id="tweet" class="twitter mb-4" data-plugin-tweets data-plugin-options="{'username': 'oklerthemes', 'count': 2}">
            <p>Please wait...</p>
        </div>
        <h5 class="font-weight-semi-bold pt-4">Photos from Instagram</h5>
        <div class="instagram-feed" data-type="nomargins" class="mb-4 pb-1"></div>
        <h5 class="font-weight-semi-bold pt-4 mb-2">Tags</h5>
        <div class="mb-3 pb-1">
            @php

                $tags = App\Models\Tag::withCount('posts')->where('status', true)->where('trash', false)->latest()->get();
                // dd($categories);
            @endphp
            @foreach($tags as $tag)
                @if($tag->posts_count > 0)
                    <a href="{{ route('tag.wise.blog', $tag->slug) }}"><span class="badge badge-dark badge-sm rounded-pill text-uppercase px-2 py-1 me-1">{{ $tag->name }} ({{ $tag->posts_count }})</span></a>
                @endif
            @endforeach


        </div>
        <h5 class="font-weight-semi-bold pt-4">Find us on Facebook</h5>
        <div class="fb-page" data-href="https://www.facebook.com/OklerThemes/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/OklerThemes/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/OklerThemes/">Okler Themes</a></blockquote></div>
    </aside>
</div>
