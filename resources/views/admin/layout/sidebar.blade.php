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

        <li class="nav-item {{$menu == 'home.stores'  || $menu == 'home.slider' || $menu == 'admin.about' || $menu == 'admin.footer' || $menu == 'admin.contact' ? 'menu-is-opening menu-open' : ''}} ">

          <a href="javascript:void(0)" class="nav-link {{$menu == 'home.stores' ? 'active' : ''}} menu-open">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              CMS
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item {{$menu == 'home.slider' || $menu == 'home.stores' ? 'menu-open' : ''}}">
              <a href="javascript:void(0)" class="nav-link">

                <p>
                  -- Home
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="{{route('admin.home.slider')}}" class="nav-link {{$menu == 'home.slider' ? 'active' : '' }}">

                    <p>- - - Sliders</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{route('admin.home.stores')}}" class="nav-link {{$menu == 'home.stores' ? 'active' : '' }}">

                    <p>- - - Stores</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.about')}}" class="nav-link {{$menu == 'admin.about' ? 'active' : ''}}">

                <p>-- About-Us</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.footer')}}" class="nav-link {{$menu == 'admin.footer' ? 'active' : ''}}">

                <p>-- Footer</p>
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

        <!-- Careers Menu Start Here -->
        <li class="nav-item">
          <a href="{{route('admin.careers')}}" class="nav-link {{$menu == 'careers.add'  || $menu == 'careers.applied'  ? 'active' : ''}}">
            <i class="nav-icon fas fa-briefcase"></i>
            <p>
              Careers
            </p>
          </a>
        </li>
        <!-- Careers Menu End Here -->

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


        <!-- DCM Contest Start Here -->

        <li class="nav-item {{ $menu == 'invoices' || $menu == 'scanned_qr' ? 'menu-is-opening menu-open' : ''}} ">

          <a href="javascript:void(0)" class="nav-link {{$menu == 'invoices'  ? 'active' : ''}} menu-open">
            <i class="nav-icon fas fa-tags"></i>
            <p>
              DCM Contest
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.invoices')}}" class="nav-link {{$menu == 'invoices' ? 'active' : ''}}">

                <p>-- Contested Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.invoices.scanned_qr')}}" class="nav-link {{$menu == 'scanned_qr' ? 'active' : ''}}">

                <p>-- Scanned QR </p>
              </a>
            </li>
          </ul>
        </li>

        <!-- DCM Contest End Here -->

        <li class="nav-item  {{$menu == 'web.users' || $menu == 'web.users.withdraw' || $menu == 'web.users.genie-wish' ? 'menu-open' : ''}}">
          <a href="javascript:void(0)" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Users
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.webUsers')}}" class="nav-link {{$menu == 'web.users' ? 'active' : ''}}">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Users List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.users.withdraw')}}" class="nav-link {{$menu == 'web.users.withdraw' ? 'active' : ''}}">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Withdraw Requests</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.users.geniewish')}}" class="nav-link {{$menu == 'web.users.genie-wish' ? 'active' : ''}}">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Genie Wish Requests</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.newsletter')}}" class="nav-link {{$menu == 'newsletter' ? 'active' : ''}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Newsletter
            </p>
          </a>
        </li>
        <li class="nav-item  {{$menu == 'categories' || $menu == 'countries' || $menu == 'users' || $menu == 'settings.loyalty' ? 'menu-open' : ''}}">
          <a href="javascript:void(0)" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Administrator
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.loyalty.settings')}}" class="nav-link {{$menu == 'settings.loyalty' ? 'active' : ''}}">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Loyalty Program</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.categories')}}" class="nav-link {{$menu == 'categories' ? 'active' : ''}}">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Caterogies</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.countries')}}" class="nav-link {{$menu == 'countries' ? 'active' : ''}}">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Countries</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.users')}}" class="nav-link {{$menu == 'users' ? 'active' : ''}}">
                <i class="fas fa-angle-right nav-icon"></i>
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