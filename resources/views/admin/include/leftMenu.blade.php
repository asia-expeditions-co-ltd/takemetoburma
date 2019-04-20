<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            <img src="/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{Auth::user()->fullname}} </p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="@yield('event') treeview">
            <a href="#">
              <i class="fa fa-newspaper-o"></i>
              <span>Events</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('createCreate')}}"><i class="fa fa-circle-o"></i>Create Events</a></li>
              <li><a href="{{route('eventList')}}"><i class="fa fa-circle-o"></i>Events List</a></li>
            </ul>
        </li>
        <li class="@yield('program') treeview">
            <a href="#">
              <i class="fa fa-map-pin"></i><span>Program</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('tourCreate')}}"><i class="fa fa-circle-o"></i>Create Program</a></li>
              <li><a href="{{route('tourList')}}"><i class="fa fa-circle-o"></i>Program List</a></li>
              <li><a href="{{route('categoryList')}}"><i class="fa fa-circle-o"></i>Category</a></li>
            </ul>
        </li>
        <li class="@yield('destination') treeview">
          <a href="#">
              <i class="fa fa-rebel"></i>
              <span>Location</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{route('countryList')}}"><i class="fa fa-circle-o"></i>Country List </a></li>
              <li><a href="{{route('provinceList')}}"><i class="fa fa-circle-o"></i>Province List </a></li>
          </ul>
        </li>
        <li class="@yield('slide') treeview">
            <a href="#">
              <i class="fa fa-sticky-note"></i>
              <span>Slide Show</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('slideForm')}}"><i class="fa fa-circle-o"></i>Create Slide</a></li>
              <li><a href="{{route('getSlide')}}"><i class="fa fa-circle-o"></i>Slide List</a></li>
            </ul>
        </li>
        <li class="@yield('users')  treeview">
            <a href="javascript:void(0)">
              <i class="ion ion-person-add"></i>
              <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('getUser')}}"><i class="fa fa-circle-o"></i>User List</a></li>
            </ul>
        </li>
          <li class="@yield('subscribe')  treeview">
            <a href="javascript:void(0)">
              <i class="ion ion-person-add"></i>
              <span>Subscribe</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('getsubcribe')}}"><i class="fa fa-circle-o"></i>Subscribe List</a></li>
            </ul>
        </li>
          <li class="@yield('countview')  treeview">
            <a href="javascript:void(0)">
              <i class="ion ion-eye"></i>
              <span>Count of Viewer</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('getcount')}}"><i class="fa fa-circle-o"></i>View List</a></li>
            </ul>
        </li>
<!-- 
          <li class="@yield('logo')  treeview">
            <a href="javascript:void(0)">
              <i class="ion ion-person-add"></i>
              <span>Logo</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('getlogo')}}"><i class="fa fa-circle-o"></i>Logo List</a></li>
            </ul>
        </li> -->
        
      </ul>
    </section>
</aside>
