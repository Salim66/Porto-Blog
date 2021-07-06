@php

    $total_user_trash = App\Models\User::where('trash', true)->get()->count();
    $total_category_trash = App\Models\Category::where('trash', true)->get()->count();
    $total_tag_trash = App\Models\Tag::where('trash', true)->get()->count();
    $total_post_trash = App\Models\Post::where('trash', true)->get()->count();

@endphp
<!-- Page Sidebar Start-->
<div class="iconsidebar-menu">
    <div class="sidebar">
      <ul class="iconMenu-bar custom-scrollbar">
        <li><a class="bar-icons" href="javascript:void(0)"><i class="fas fa-tachometer-alt"></i><span>Home</span></a>
          <ul class="iconbar-mainmenu custom-scrollbar">
            <li class="iconbar-header">Dashboard</li>
            <li><a href="index.html">Default</a></li>
          </ul>
        </li>
        @if(Auth::user()->user_type == 'Admin')
        <li><a class="bar-icons" href="javascript:void(0)"><i class="fas fa-users"></i><span>Users Manage</span></a>
          <ul class="iconbar-mainmenu custom-scrollbar">
            <li class="iconbar-header">Users</li>
            <li><a href="{{ route('index') }}">User List</a></li>
            <li><a href="{{ route('create') }}">User Add</a></li>
            <li><a href="{{ route('users.trash') }}">Trash List <span class="text-danger">({{ $total_user_trash }})</span></a></li>
          </ul>
        </li>
        @endif
        <li><a class="bar-icons" href="javascript:void(0)"><i class="fas fa-user"></i><span>User Profile</span></a>
          <ul class="iconbar-mainmenu custom-scrollbar">
            <li class="iconbar-header">Profile</li>
            <li><a href="{{ route('profile.view') }}">View Profile</a></li>
            <li><a href="{{ route('user.change.password') }}">Change Password</a></li>
          </ul>
        </li>
        <li><a class="bar-icons" href="javascript:void(0)"><i class="fab fa-cuttlefish"></i><span>Categories</span></a>
          <ul class="iconbar-mainmenu custom-scrollbar">
            <li class="iconbar-header">Categories</li>
            <li><a href="{{ route('categories.view') }}">Category List</a></li>
            <li><a href="{{ route('categories.add') }}">Add Category</a></li>
            <li><a href="{{ route('categories.trash') }}">Trash List <span class="text-danger">({{ $total_category_trash }})</span></a></li>
          </ul>
        </li>
        <li><a class="bar-icons" href="javascript:void(0)"><i class="fas fa-tags"></i><span>Tags</span></a>
          <ul class="iconbar-mainmenu custom-scrollbar">
            <li class="iconbar-header">Tags</li>
            <li><a href="{{ route('tags.view') }}">Tag List</a></li>
            <li><a href="{{ route('tags.add') }}">Add Tag</a></li>
            <li><a href="{{ route('tags.trash') }}">Trash List <span class="text-danger">({{ $total_tag_trash }})</span></a></li>
          </ul>
        </li>
        <li><a class="bar-icons" href="javascript:void(0)"><i class="fas fa-tags"></i><span>Posts</span></a>
          <ul class="iconbar-mainmenu custom-scrollbar">
            <li class="iconbar-header">Posts</li>
            <li><a href="{{ route('posts.view') }}">Post List</a></li>
            <li><a href="{{ route('posts.add') }}">Add Post</a></li>
            <li><a href="{{ route('posts.trash') }}">Trash List <span class="text-danger">({{ $total_post_trash }})</span></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- Page Sidebar Ends-->
