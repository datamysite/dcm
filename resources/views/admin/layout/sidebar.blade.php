<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{URL::to('/')}}" class="brand-link">
      <img src="{{URL::to('/public')}}/Icon-White.png" alt="Proware" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"> DCM - Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{URL::to('/public')}}/user-placeholder.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::guard('admin')->user()->fullname}}</a>
          <span class="text-white">{{Auth::guard('admin')->user()->designation}}</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{$menu == 'dashboard' ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                CMS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>About</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Contact</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Footer</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.retailer')}}" class="nav-link {{$menu == 'retailers' ? 'active' : ''}}">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Retailers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.blog')}}" class="nav-link {{$menu == 'blogs' ? 'active' : ''}}">
              <i class="nav-icon fa fa-pen"></i>
              <p>
                Blogs
              </p>
            </a>
          </li>
          <li class="nav-item {{$menu == 'seo.meta' || $menu == 'seo.snippet' ? 'menu-open' : ''}}">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                SEO Tools
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.seo.meta')}}" class="nav-link {{$menu == 'seo.meta' ? 'active' : ''}}">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Meta Tags</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.seo.snippet')}}" class="nav-link {{$menu == 'seo.snippet' ? 'active' : ''}}">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Snippet Code</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link {{$menu == 'users' ? 'active' : ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Administrator
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-minus nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link {{$menu == 'profile' ? 'active' : ''}}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Profile Settings
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>