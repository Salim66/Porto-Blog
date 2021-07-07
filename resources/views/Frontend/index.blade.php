@extends('Frontend.layouts.master')


@section('main-content')
<div class="col-lg-9 order-lg-1">
    <div class="blog-posts">
       <div class="row px-3">
          <div class="col-sm-6">
             <article class="post post-medium border-0 pb-0 mb-5">
                <div class="post-image">
                   <a href="blog-post.html">
                   <img src="{{ asset('img/')}}/blog/medium/blog-1.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                   </a>
                </div>
                <div class="post-content">
                   <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="blog-post.html">Amazing Mountain</a></h2>
                   <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                   <div class="post-meta">
                      <span><i class="far fa-user"></i> By <a href="#">Bob Doe</a> </span>
                      <span><i class="far fa-folder"></i> <a href="#">News</a>, <a href="#">Design</a> </span>
                      <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
                      <span class="d-block mt-2"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                   </div>
                </div>
             </article>
          </div>

       </div>
       <div class="row">
          <div class="col">
             <ul class="pagination float-right">
                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
             </ul>
          </div>
       </div>
    </div>
 </div>
@endsection
