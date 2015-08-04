
<header class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}" class="logo"><b>S.I</b>Etudiant</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{  asset('/users_photos/photo_'.\Illuminate\Support\Facades\Auth::user()->cin.'.jpg') }}" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{  asset('/users_photos/photo_'.\Illuminate\Support\Facades\Auth::user()->cin.'.jpg')}}" class="img-circle" alt="Ma photo" />
                            <p>
                                {{ Auth::user()->name }} - Etudiant
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ url('/profile') }}" class="btn btn-default btn-flat">Mon profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">Se déconnecter</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>