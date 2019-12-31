@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
<!-- Drop Your Customized Style Here -->
@section('customizedStyle')
@endsection
<!-- Drop Your Customized Scripts Here -->
@section('customizedScript')
@endsection
<!-- Start of content section -->
@section('content')


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

                                        </p>
                                    </div>
                                    <div class="title">
                                        <p>
                                            Services
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

                                        </p>
                                    </div>
                                    <div class="title">
                                        <p>
                                           Videos
                                        </p>
                                    </div>
                                </div>
                                <div class="li-right">
                                    <i class="ion ion-videocamera"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="li-left">
                                    <div class="counter">
                                        <p>

                                        </p>
                                    </div>
                                    <div class="title">
                                        <p>
                                            Images
                                        </p>
                                    </div>
                                </div>
                                <div class="li-right">
                                    <i class="ion-ios-albums-outline"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="li-left">
                                    <div class="counter">
                                        <p>

                                        </p>
                                    </div>
                                    <div class="title">
                                        <p>
                                           Messages
                                        </p>
                                    </div>
                                </div>
                                <div class="li-right">
                                    <i class="ion-ios-email-outline"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end stats section -->


            <!-- start shortcuts section -->
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
                        </li>--}}
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
            <!-- end shortcuts section -->


        </div>
    </section>
    <!-- /.content -->


@endsection
