<header id="header" class="header header-hide">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="/" class="scrollto"><span>Mock</span><i class="text-danger">Fire</i></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          @if(Request::segment(1) == '')
            <li class="menu-active"><a href="#get-started">Home</a></li>
            <li><a href="#team">Team</a></li>
          @else
            <li class="{{ Request::segment(1) === '' ? 'menu-active' : null }}">
              <a href="{{ url('/') }}">Home</a>
            </li>
          @endif
          @if(!Auth::user())
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
          @else
            <li class="{{ Request::segment(1) === 'project' ? 'menu-active' : null }}">
              <a href="{{ url('project/'.Auth::user()->id.'') }}">Project</a>
            </li>
            <li>
              <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    Logout
                </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
          @endif
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>
