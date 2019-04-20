  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('admin')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>TM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{config('app.title')}}</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/img/avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->fullname}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/img/avatar.png" class="img-circle" alt="User Image">
                <p>
                  <span style="text-transform: capitalize; "></span> {{Auth::user()->fullname}}
                  <small>Member since {{ date('M, Y', strtotime(Auth::user()->created_at)) }}</small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
               
                <div class="pull-right">
                  <form action="{{route('signout')}}" method="get" >
                      {{ csrf_field() }}
                      <input class="btn btn-default" type="submit" value="Sign out">
                  </form>
                  
                </div>

              </li>
            </ul>
          </li>
        
        </ul>
      </div>
    </nav>
  </header>