<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
    <img src="{{ asset('backend_assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
       style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <div class="sidebar">
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
             <img src="{{ asset('backend_assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
             <a href="#" class="d-block">Alexander Pierce</a>
          </div>
       </div>
       <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
             data-accordion="false">
             <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                      Dashboard
                   </p>
                </a>
             </li>
             <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Masters
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav">
                  <li class="nav-item">
                    <a href="{{route('states.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>States</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('districts.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Districts</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('subdistricts.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sub Districts</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('categories.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Categories</p>
                    </a>
                  </li>
                  {{-- <li class="nav-item">
                    <a href="{{route('city.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Cities</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('city.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pincodes</p>
                    </a>
                  </li> --}}
                </ul>
              </li>
          </ul>
       </nav>
    </div>
 </aside>
