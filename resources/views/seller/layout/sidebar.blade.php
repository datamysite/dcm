<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{URL::to('/')}}" class="brand-link">
      <img src="{{URL::to('/public')}}/Icon-White.png" alt="Proware" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"> DCM - Seller</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{URL::to('/public/storage/retailers/'.Auth::guard('seller')->user()->retailer->logo)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="javascript:void(0)" class="d-block">{{Auth::guard('seller')->user()->username}}</a>
          <span class="text-white text-underline"><a href="{{route('brand', Auth::guard('seller')->user()->retailer->slug)}}" target="_blank">Website &nbsp;<i class="fas fa-link"></i></span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('seller.dashboard')}}" class="nav-link {{$menu == 'dashboard' ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          
          <!-- <li class="nav-item">
            <a href="" class="nav-link {{$menu == 'profile' ? 'active' : ''}}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Profile Settings
              </p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>