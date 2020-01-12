<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projects List</title>
    <!-- =================font icon================= -->
    <link rel="stylesheet" href="{{assetPath('website/css/all.css')}}">
    <!-- =================font icon================= -->

    <!-- =================animate================= -->
    <!-- =================animate================= -->

    <!-- =================font icon================= -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <!-- =================font icon================= -->

    <!-- =================bootstrap================= -->
    <!-- <link rel="stylesheet" href="./css/bootstrap-rtl.css"> -->
    <link rel="stylesheet" href="{{assetPath('website/css/bootstrap.css')}}">
    <!-- =================bootstrap================= -->

    <!-- =================file css================= -->
    <link rel="stylesheet" href="{{assetPath('website/css/style.css')}}">
    <!-- =================file css================= -->

    <link rel="shortcut icon" href="{{asset('website/images/be.png')}}" type="image/png" sizes="16x16 32x32">
</head>

<body>
<!-- =========== start navbar =========== -->
<div class="top-head">
    <div class="container-fluid">
        <div class="center-logo">
            <img src="{{assetPath('website/images/be.png')}}" alt="">
        </div>
    </div>
</div>

<div class="nots">
    <div class="container-fluid">
        <div class="dot-color">
            <ul>
                <li class="re"><span></span>  <p>data not completed</p></li>
                <li class="or"><span></span>  <p>Waiting for programming</p></li>
                <li class="gr"><span></span>  <p>Finish</p></li>

            </ul>
        </div>
    </div>
</div>

<div class="tproject">
    <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">Sales Man</th>
                <th scope="col">Data  </th>
                <th scope="col">Status</th>
                <th scope="col">Contract Date</th>
                <th scope="col">Design Started</th>
                <th scope="col">Design Finish</th>
                <th scope="col">Development Start</th>
                <th scope="col">Development end</th>
                <th scope="col">Deployed</th>
            </tr>
            </thead>
            <tbody>

            @if($projects)
                @foreach($projects as $project)
                    <tr
                        @if($project->status_id == 12)
                            style="background-color: #04c703 ; color: white;"
                            @elseif($project->status_id == 13)
                            style="background-color: #ec7a08 ; color: white;"
                            @elseif($project->status_id == 14)
                            style="background-color: #b50c25 ; color: white;"
                        @endif
                    >
                        <th scope="row">{{$project->id}} </th>
                        <td>{{$project->name}}</td>
                        <td>{{$project->member->username}} ({{$project->member->team->member->username}})</td>
                        <td><i class="fas {{!empty($project->content_id) ? 'fa-check text-success' : 'fa-times text-danger'}}" style="font-size: 25px"></i></td>
                        <td>{{$project->status->title}}</td>
                        <td>{{$project->contract_date ? $project->contract_date->format('d M Y') : ''}}</td>
                        <td>{{$project->projectTimeline->design_start ? $project->projectTimeline->design_start->format('d M Y') : ''}}</td>
                        <td>{{$project->projectTimeline->design_finish ? $project->projectTimeline->design_finish->format('d M Y') : ''}}</td>
                        <td>{{$project->projectTimeline->development_start ? $project->projectTimeline->development_start->format('d M Y') : ''}}</td>
                        <td>{{$project->projectTimeline->development_finish ? $project->projectTimeline->development_finish->format('d M Y') : ''}}</td>
                        <td><i class="fas {{$project->deployed ? 'fa-check text-success' : 'fa-times text-danger'}}" style="font-size: 25px"></i></td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
    </div>
</div>
<!-- =====start copy===== -->
<div class="copy">
    Copyright 2020 Be Group
</div>
<!-- =====end copy===== -->

<script src="{{assetPath('website/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{assetPath('website/js/popper.js')}}"></script>
<script src="{{assetPath('website/js/bootstrap.min.js')}}"></script>

</body>

</html>















{{--
@extends('website.layouts.layouts')
@section('title', 'Dashboard')
<!-- Drop Your Customized Style Here -->
@section('customizedStyle')
    <link rel="stylesheet" href="{{assetPath('dashboard/plugins/fullcalendar/main.min.css')}}">
    --}}
{{--<link rel="stylesheet" href="{{assetPath('dashboard/plugins/fullcalendar-interaction/main.min.css')}}">--}}{{--

    <link rel="stylesheet" href="{{assetPath('dashboard/plugins/fullcalendar-daygrid/main.min.css')}}">
    <link rel="stylesheet" href="{{assetPath('dashboard/plugins/fullcalendar-timegrid/main.min.css')}}">
    <link rel="stylesheet" href="{{assetPath('dashboard/plugins/fullcalendar-bootstrap/main.min.css')}}">
@endsection
<!-- Drop Your Customized Scripts Here -->
@section('customizedScript')
    <script src="{{assetPath('dashboard/plugins/moment/moment.min.js')}}"></script>
    <script src="{{assetPath('dashboard/plugins/fullcalendar/main.min.js')}}"></script>
    <script src="{{assetPath('dashboard/plugins/fullcalendar-daygrid/main.min.js')}}"></script>
    <script src="{{assetPath('dashboard/plugins/fullcalendar-timegrid/main.min.js')}}"></script>
    --}}
{{--<script src="{{assetPath('dashboard/plugins/fullcalendar-interaction/main.min.js')}}"></script>--}}{{--

    <script src="{{assetPath('dashboard/plugins/fullcalendar-bootstrap/main.min.js')}}"></script>


    --}}
{{--<script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
                header    : {
                    left  : 'prev,next today',
                    center: 'title',
                    right : 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                weekends: true,
                //Random default events
                /*events    : [
                    {
                        title: 'Example',
                        start: '2019-01-01',
                        end: '2019-01-02',
                        color: '#ff0000',
                    },
                ],*/
            });

            calendar.render();

            $('#calendar').fullCalendar('renderEvent', {
                title : eventTitle,
                allDay : true,
                start: '2019-01-01',
                stick : true,
            });
        });

    </script>--}}{{--

@endsection
<!-- Start of content section -->
@section('content')
    <!-- Main content -->






    <!-- Main content -->
    <section class="content container-fluid">
        <div class="rgs-wrapper">
            <!-- start stats section -->
            <div class="stats-section">
                <div class="section-heading">
                    <i class="ion-stats-bars"></i>
                    <p>
                        Statistics
                    </p>
                </div>
                <div class="section-body">
                    <ul>
                        <li>
                            <a href="#">
                                <div class="li-left">
                                    <div class="counter">
                                        <p>
                                            {{$projects}}
                                        </p>
                                    </div>
                                    <div class="title">
                                        <p>
                                            Projects
                                        </p>
                                    </div>
                                </div>
                                <div class="li-right">
                                    <i class="ion ion-document-text"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="li-left">
                                    <div class="counter">
                                        <p>
                                            {{$inProgressProjects}}
                                        </p>
                                    </div>
                                    <div class="title">
                                        <p>
                                           In Progress Projects
                                        </p>
                                    </div>
                                </div>
                                <div class="li-right">
                                    <i class="ion ion-document-text"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="li-left">
                                    <div class="counter">
                                        <p>
                                            {{$completedProjects}}
                                        </p>
                                    </div>
                                    <div class="title">
                                        <p>
                                            Completed Projects
                                        </p>
                                    </div>
                                </div>
                                <div class="li-right">
                                    <i class="ion ion-document-text"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="li-left">
                                    <div class="counter">
                                        <p>
                                            {{$waitingProjects}}
                                        </p>
                                    </div>
                                    <div class="title">
                                        <p>
                                            Waiting List
                                        </p>
                                    </div>
                                </div>
                                <div class="li-right">
                                    <i class="ion ion-document-text"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end stats section -->

            <div class="tables-section">
                <div class="today-calls-table table-section">
                    <div class="section-heading">
                        <p>
                            Latest Projects
                        </p>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Project</th>
                            <th scope="col">Sales Man</th>
                            <th scope="col">Domain</th>
                            <th scope="col">Project Type</th>
                            <th scope="col">Added In</th>
                            <th scope="col">Will Finish in</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projectTimelines as $projectTimeline)
                            <tr>
                                <td>{{$projectTimeline->project->id}}</td>
                                <td>{{$projectTimeline->project->name}}</td>
                                <td>{{$projectTimeline->project->member->username}}</td>
                                <td>{{$projectTimeline->project->domain}}</td>
                                <td>{{$projectTimeline->project->project_type}}</td>
                                <td>{{$projectTimeline->project->created_at->format('d M Y')}}</td>
                                <td>{{$projectTimeline->development_finish ? $projectTimeline->development_finish->format('d M Y') : ''}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            --}}
{{--<!-- start shortcuts section -->
            <div class="shortcuts-section">
                <div class="section-heading">
                    <i class="ion-shuffle"></i>
                    <p>
                        Shortcuts
                    </p>
                </div>
                <div class="section-body">
                    <ul>
                        <li>
                            <a href="{{adminUrl('contact/edit')}}">
                                <div class="li-img">
                                    <img src="{{asset('dashboard/img/shortcuts/phone-call.png')}}" alt="img">
                                </div>
                                <div class="li-title">
                                    <p>
                                        Edit Contact Info
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{adminUrl('service/create')}}">
                                <div class="li-img">
                                    <img src="{{asset('dashboard/img/welcome/setting.png')}}" alt="img">
                                </div>
                                <div class="li-title">
                                    <p>
                                        Add Service
                                    </p>
                                </div>
                            </a>
                        </li>
                        --}}{{--
--}}
{{--<li>
                            <a href="{{adminUrl('video/create')}}">
                                <div class="li-img">
                                    <img src="{{asset('dashboard/img/welcome/video.png')}}" alt="img">
                                </div>
                                <div class="li-title">
                                    <p>
                                        Add Video
                                    </p>
                                </div>
                            </a>
                        </li>--}}{{--
--}}
{{--
                        <li>
                            <a href="{{adminUrl('slider/create')}}">
                                <div class="li-img">
                                    <img src="{{asset('dashboard/img/welcome/slider.png')}}" alt="img">
                                </div>
                                <div class="li-title">
                                    <p>
                                        Add Slide
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{adminUrl('album/create')}}">
                                <div class="li-img">
                                    <img src="{{asset('dashboard/img/welcome/upload.png')}}" alt="img">
                                </div>
                                <div class="li-title">
                                    <p>
                                        Add Album
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{adminUrl('setting/edit')}}">
                                <div class="li-img">
                                    <img src="{{asset('dashboard/img/welcome/settings.png')}}" alt="img">
                                </div>
                                <div class="li-title">
                                    <p>
                                       Edit Setting
                                    </p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end shortcuts section -->--}}{{--



        </div>
    </section>
    <!-- /.content -->


@endsection
--}}
