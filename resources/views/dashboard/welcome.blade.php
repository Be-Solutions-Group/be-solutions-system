@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
<!-- Drop Your Customized Style Here -->
@section('customizedStyle')
    <link rel="stylesheet" href="{{assetPath('dashboard/plugins/fullcalendar/main.min.css')}}">
    {{--<link rel="stylesheet" href="{{assetPath('dashboard/plugins/fullcalendar-interaction/main.min.css')}}">--}}
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
    {{--<script src="{{assetPath('dashboard/plugins/fullcalendar-interaction/main.min.js')}}"></script>--}}
    <script src="{{assetPath('dashboard/plugins/fullcalendar-bootstrap/main.min.js')}}"></script>


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

    </script>--}}
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
                            <th scope="col">Will Finish in</th>
                            {{--<th scope="col">Date</th>
                            <th scope="col">Action</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projectTimelines as $projectTimeline)
                            <tr>
                                <td>{{$projectTimeline->project->id}}</td>
                                <td>{{$projectTimeline->project->name}}</td>
                                <td>{{$projectTimeline->project->member->username}}</td>
                                <td>{{$projectTimeline->project->domain}}</td>
                                <td>{{$projectTimeline->development_finish ? $projectTimeline->development_finish->format('d M Y') : ''}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


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
                        --}}{{--<li>
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
            <!-- end shortcuts section -->--}}


        </div>
    </section>
    <!-- /.content -->


@endsection
