<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{assetPath('dashboard/img/be.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Be Group Management <br> System </p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> <span>Statistics</span></a></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>Projects</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('/project/create')}}"><i class="fa fa-plus"></i> Add New Project</a></li>
                    <li><a href="{{adminUrl('/project')}}"><i class="fa fa-edit"></i> Show / Edit Projects</a></li>
                    {{--<li><a href="{{adminUrl('service?type=sub')}}"><i class="fa fa-edit"></i> Show / Edit Sub Service</a></li>--}}
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-group"></i>
                    <span>Teams</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('/team/create')}}"><i class="fa fa-plus"></i> Add New Team</a></li>
                    <li><a href="{{adminUrl('/team')}}"><i class="fa fa-edit"></i> Show / Edit Teams</a></li>
                    {{--<li><a href="{{adminUrl('service?type=sub')}}"><i class="fa fa-edit"></i> Show / Edit Sub Service</a></li>--}}
                </ul>
            </li>

            {{--<li class="treeview">
                <a href="#">
                    <i class="fa fa-group"></i>
                    <span>Positions</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('/position/create')}}"><i class="fa fa-plus"></i> Add New Position</a></li>
                    <li><a href="{{adminUrl('/position')}}"><i class="fa fa-edit"></i> Show / Edit Teams</a></li>
                    --}}{{--<li><a href="{{adminUrl('service?type=sub')}}"><i class="fa fa-edit"></i> Show / Edit Sub Service</a></li>--}}{{--
                </ul>
            </li>--}}

           {{-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-suitcase"></i>
                    <span>Sales Team</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('gallery/create')}}"><i class="fa fa-upload"></i> Add New Member</a></li>
                    <li><a href="{{adminUrl('appointment')}}"><i class="fa fa-edit"></i> Show / Edit Appointment</a></li>
                </ul>
            </li>--}}

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Clients</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('/client/create')}}"><i class="fa fa-upload"></i> Add New Client</a></li>
                    <li><a href="{{adminUrl('/client')}}"><i class="fa fa-edit"></i> Show / Edit Clients</a></li>
                </ul>
            </li>

            {{--<li class="treeview">
                <a href="#">
                    <i class="fa fa-code"></i>
                    <span>Development Team</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('gallery/create')}}"><i class="fa fa-upload"></i> Add New Member</a></li>
                    <li><a href="{{adminUrl('appointment')}}"><i class="fa fa-edit"></i> Show / Edit Appointment</a></li>
                </ul>
            </li>--}}

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-building"></i>
                    <span>Branches</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('/branch/create')}}"><i class="fa fa-upload"></i> Add New Branch</a></li>
                    <li><a href="{{adminUrl('/branch')}}"><i class="fa fa-edit"></i> Show / Edit Branches</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Members</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('/member/create')}}"><i class="fa fa-upload"></i> Add New Member</a></li>
                    <li><a href="{{adminUrl('/member')}}"><i class="fa fa-edit"></i> Show / Edit Members</a></li>
                </ul>
            </li>

            {{--<li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Reports</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('gallery/create')}}"><i class="fa fa-upload"></i> Add New Member</a></li>
                    <li><a href="{{adminUrl('gallery')}}"><i class="fa fa-edit"></i> Show / Edit Members</a></li>
                </ul>
            </li>--}}

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list-alt"></i>
                    <span>My Projects List</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('/my-projects')}}"><i class="fa fa-edit"></i> Show / Edit Projects</a></li>
                </ul>
            </li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
