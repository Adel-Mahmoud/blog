<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('assets/images/samples/1280x768/1.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Blog</span>
  </a>
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{asset('assets/images/faces-clipart/pic-1.png')}}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">
        @if(Auth::check())
            {{ Auth::user()->name }}
        @endif
      </a>
    </div>
  </div>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item {{ $open = Route::is('dashboard.*') ? 'menu-open' : '' }}">
          <a href="{{ route('dashboard.index') }}" class="nav-link {{ $active = Route::is('dashboard.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item {{ $open = Route::is('categories.*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ $active = Route::is('categories.*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-folder"></i>
            <p>
              Categories
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('categories.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Categories</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('categories.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Category</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{ $open = Route::is('posts.*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ $active = Route::is('posts.*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-file-alt"></i>
            <p>
              Posts
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('posts.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Posts</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('posts.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Post</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{ $open = Route::is('tags.*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ $active = Route::is('tags.*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-tags"></i>
            <p>
              Tags
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('tags.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Tags</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tags.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Tag</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{ $open = Route::is('comments.*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ $active = Route::is('comments.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-comments"></i>
            <p>
              Comments
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('comments.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Comments</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{ $open = Route::is('users.*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ $active = Route::is('users.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Users
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('users.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('users.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add User</p>
              </a>
            </li>
          </ul>
        </li>
        {{--
        <li class="nav-item {{ $open = Route::is('users2.*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ $active = Route::is('users2.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Users 2
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('users2.test') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Users</p>
              </a>
            </li>
          </ul>
        </li>
        --}}
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Log out 
            </p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<!-- /main Sidebar Container -->
