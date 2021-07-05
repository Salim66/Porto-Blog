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
        <li><a class="bar-icons" href="javascript:void(0)"><i class="fas fa-users"></i><span>Users Manage</span></a>
          <ul class="iconbar-mainmenu custom-scrollbar">
            <li class="iconbar-header">Users</li>
            <li><a href="{{ route('index') }}">User List</a></li>
            <li><a href="{{ route('create') }}">User Add</a></li>
            <li><a class="user_trash_list" href="{{ route('users.trash') }}">Trash List</a></li>
          </ul>
        </li>
        <li><a class="bar-icons" href="javascript:void(0)"><i class="fas fa-user"></i><span>User Profile</span></a>
          <ul class="iconbar-mainmenu custom-scrollbar">
            <li class="iconbar-header">Profile</li>
            <li><a href="index.html">View Profile</a></li>
            <li><a href="index.html">Change Password</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- Page Sidebar Ends-->
