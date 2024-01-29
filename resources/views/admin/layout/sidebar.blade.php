<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{URL::to('/')}}" class="brand-link">
      <img src="{{URL::to('/public')}}/Icon-White.png" alt="Proware" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">roware</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{URL::to('/public')}}/user-placeholder.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
          <span class="text-white">{{Auth::user()->type == '1' ? 'Sales Manager' : 'Sales Man'}}</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{URL::to('/')}}" class="nav-link {{$menu == 'dashboard' ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('/inquiries')}}" class="nav-link {{$menu == 'inquiries' ? 'active' : ''}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Inquiries
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('/orders')}}" class="nav-link {{$menu == 'orders' ? 'active' : ''}}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Orders
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('customers')}}" class="nav-link {{$menu == 'customers' ? 'active' : ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Customers
              </p>
            </a>
          </li>
          <li class="nav-item {{$menu == 'categories' || $menu == 'brands' || $menu == 'products' ? 'menu-open' : ''}}">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon ion ion-bag"></i>
              <p>
                Products
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/products')}}" class="nav-link {{$menu == 'products' ? 'active' : ''}}">
                  <i class="fas fa-minus nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('products.categories')}}" class="nav-link {{$menu == 'categories' ? 'active' : ''}}">
                  <i class="fas fa-minus nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/products/brands')}}" class="nav-link {{$menu == 'brands' ? 'active' : ''}}">
                  <i class="fas fa-minus nav-icon"></i>
                  <p>Brands</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('salesmen')}}" class="nav-link {{$menu == 'salesmen' ? 'active' : ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Sales-Men
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon ion ion-stats-bars"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-minus nav-icon"></i>
                  <p>Coming Soon..</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-minus nav-icon"></i>
                  <p>Coming Soon..</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-minus nav-icon"></i>
                  <p>Coming Soon..</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('profile')}}" class="nav-link {{$menu == 'profile' ? 'active' : ''}}">
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