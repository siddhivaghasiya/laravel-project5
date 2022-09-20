 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->





          <li class="nav-item">
            <a href="{{route('blog.listing')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
               Blog
              </p>
            </a>

              <ul>
               <li >
                   <a href="{{route('categories.listing')}}">Categories</a>
                </li>
                 <li >
                   <a href="{{route('tag.listing')}}">Tags</a>
                </li>
              </ul>

          </li>

          <li class="nav-item">
            <a href="{{route('department.listing')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                 Department
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="{{route('doctors.listing')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                 Doctors
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="{{route('service.listing')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                 Service
              </p>
            </a>
          </li>

            <li class="nav-item">
            <a href="{{route('contact.listing')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                 contact
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('pages.listing')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                 Pages
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('social.listing')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                 Social Media
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('newslater.listing')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Newslater
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('appointment.listing')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Appointment
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('achievement.listing')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Achievement
              </p>
            </a>
          </li>







        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
