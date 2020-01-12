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
                    {{--<li><a href="{{url('add-new-project')}}"><i class="fa fa-plus"></i> Add New Project</a></li>--}}
                    <li><a href="{{url('current-projects?type=all')}}"><i class="fa fa-list"></i> Show All Projects </a></li>
                    <li><a href="{{url('current-projects?type=in-progress')}}"><i class="fa fa-step-forward"></i> Show In Progress Projects </a></li>
                    <li><a href="{{url('current-projects?type=completed')}}"><i class="fa fa-check"></i> Show Completed Projects </a></li>
                    {{--<li><a href="{{adminUrl('service?type=sub')}}"><i class="fa fa-edit"></i> Show / Edit Sub Service</a></li>--}}
                </ul>
            </li>

            {{--<li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i>
                    <span>Updates On Projects</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    --}}{{--<li><a href="{{url('add-new-update')}}"><i class="fa fa-plus"></i> Add New Update</a></li>--}}{{--
                    <li><a href="{{url('current-updates')}}"><i class="fa fa-eye"></i> Show Updates Progress</a></li>
                    --}}{{--<li><a href="{{adminUrl('service?type=sub')}}"><i class="fa fa-edit"></i> Show / Edit Sub Service</a></li>--}}{{--
                </ul>
            </li>--}}



        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
