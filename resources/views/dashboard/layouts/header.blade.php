<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{adminUrl('/')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <!-- <span class="logo-mini"><b>A</b>LT</span> -->
        <!-- logo for regular state and mobile devices -->
        <!-- <span class="logo-lg"><b>Admin</b>LTE</span> -->
        <img src="{{assetPath('dashboard/img/logo.png')}}" alt="logo">
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="{{adminUrl('message')}}" class="dropdown-toggle">
                        <i class="fa fa-envelope-o"></i>
                    </a>
                </li>
                <!-- /.messages-menu -->

                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="{{adminUrl('setting/edit')}}" class="dropdown-toggle">
                        <i class="fa fa-cogs"></i>
                    </a>
                </li>

                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{assetPath('dashboard/img/logo.png')}}" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">Be Solutions Project Management System</span>
                    </a>

                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{assetPath('dashboard/img/logo.png')}}" class="img-circle" alt="User Image">

                            <p>
                               {{Auth::user()->name}} - {{Auth::user()->member->position->title}}
                                <small>Member since September. 2019</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                           {{-- <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>
                            <!-- /.--}}
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                {{--<a href="#" class="btn btn-default btn-flat">Profile</a>--}}
                            </div>
                            <div class="pull-right">
                                <form method="post" action="{{route('logout')}}">
                                    @csrf
                                    <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
