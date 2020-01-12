@extends('website.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedStyle')
@endsection
{{--Drop Your Customized Scripts Codes Here--}}
@section('customizedScript')
    <script src="{{assetPath('dashboard/bower_components/ckeditor/ckeditor.js')}}"></script>

    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor10');
            CKEDITOR.replace('editor12');
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>

    <script>
        //Initialize Select2 Elements
        $('.select2').select2()
    </script>
@endsection
{{-- Start of page Content --}}
@section('content')

    <section class="content-header">
        <h1>
            Projects
            <small>Project Details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/project')}}">Projects</a></li>
            <li class="active">Project Details</li>
        </ol>
    </section>


    <section class="content">
        <div class="rgs-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <div class="tables-section">
                        <!-- start todaty calls table -->
                        <div class="today-calls-table table-section">
                            <div class="section-heading">
                                <p>
                                    Project Details
                                </p>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Attribute </th>
                                    <th scope="col">Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Project Name</td>
                                    <td>{{$project->name}}</td>
                                </tr>
                                <tr>
                                    <td>Project Description</td>
                                    <td> {{$project->description}}</td>
                                </tr>
                                <tr>
                                    <td>Domain</td>
                                    <td><a href="{{$project->projectDeploymentInfo->domain}}">{{$project->projectDeploymentInfo->domain}}</a></td>
                                </tr>
                                <tr>
                                    <td>Sales Man</td>
                                    <td>{{$project->member->username}}</td>
                                </tr>
                                <tr>
                                    <td>Sales Man Team Leader</td>
                                    <td>{{$project->member->team->member->username}}</td>
                                </tr>
                                <tr>
                                    <td>Branch</td>
                                    <td>{{$project->member->branch->title}}</td>
                                </tr>
                                <tr>
                                    <td>Client</td>
                                    <td>{{$project->client->name}}</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>{{$project->project_type}}</td>
                                </tr>
                                <tr>
                                    <td>Is Content Existed</td>
                                    <td><i class="fa {{$project->content_id ? 'fa-check text-success' : 'fa-close text-danger'}}" style="font-size: 25px"></i> </td>
                                </tr>
                                <tr>
                                    <td>Created At</td>
                                    <td>{{$project->created_at->diffForHumans()}}</td>
                                </tr>
                                <tr>
                                    <td>Last Update</td>
                                    <td>{{$project->projectTimeline->updated_at->diffForHumans()}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end todaty calls table -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tables-section">
                        <!-- start todaty calls table -->
                        <div class="today-calls-table table-section">
                            <div class="section-heading">
                                <p>
                                    Project Progress
                                </p>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Attribute </th>
                                    <th scope="col">Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Design Started </td>
                                    <td>{{$project->projectTimeline->design_start ? $project->projectTimeline->design_start->format('d M Y') : ''}}</td>
                                </tr>
                                <tr>
                                    <td>Design Will Finish In</td>
                                    <td>{{$project->projectTimeline->design_finish ? $project->projectTimeline->design_finish->format('d M Y') : ''}}</td>
                                </tr>
                                <tr>
                                    <td>Design Approved</td>
                                    <td> {{$project->projectTimeline->design_approved ? $project->projectTimeline->design_approved->format('d M Y') : ''}} </td>
                                </tr>
                                <tr>
                                    <td>Development Start</td>
                                    <td>{{$project->projectTimeline->development_start ? $project->projectTimeline->development_start->format('d M Y') : ''}}</td>
                                </tr>
                                <tr>
                                    <td>Development Will Finish</td>
                                    <td>{{$project->projectTimeline->development_finish ? $project->projectTimeline->development_finish->format('d M Y') : ''}}</td>
                                </tr>
                                {{--<tr>
                                    <td>Designer</td>
                                    <td>{{$project->projectTimeline->designerMember->username}}</td>
                                </tr>
                                <tr>
                                    <td>Developer</td>
                                    <td>{{$project->projectTimeline->developerMember->username}}</td>
                                </tr>--}}
                                <tr>
                                    <td>Status</td>
                                    <td>{{$project->status->title}}</td>
                                </tr>
                                <tr>
                                    <td>Notes</td>
                                    <td>{{$project->projectTimeline->notes}}</td>
                                </tr>
                                <tr>
                                    <td>Tested</td>
                                    <td><i class="fa {{$project->projectTimeline->tested == 1 ? 'fa-check text-success' : 'fa-close text-danger'}}" style="font-size: 25px"></i></td>
                                </tr>
                                <tr>
                                    <td>Deployed (Uploaded On Server)</td>
                                    <td><i class="fa {{$project->projectTimeline->deployed == 1 ? 'fa-check text-success' : 'fa-close text-danger'}}" style="font-size: 25px"></i></td>
                                </tr>
                                <tr>
                                    <td>Data Filled</td>
                                    <td><i class="fa {{$project->projectTimeline->data_filled == 1 ? 'fa-check text-success' : 'fa-close text-danger'}}" style="font-size: 25px"></i></td>
                                </tr>
                                <tr>
                                    <td>Approved</td>
                                    <td><i class="fa {{$project->projectTimeline->approved == 1 ? 'fa-check text-success' : 'fa-close text-danger'}}" style="font-size: 25px"></i></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end todaty calls table -->
                    </div>
                </div>

                <div class="col-lg-12" style="margin-top: 20px">
                    <div class="tables-section">
                        <!-- start todaty calls table -->
                        <div class="today-calls-table table-section">
                            <div class="section-heading">
                                <p>
                                    Deployment Info (Uploading On Server)
                                </p>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Attribute </th>
                                    <th scope="col">Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Domain </td>
                                    <td>{{$project->projectDeploymentInfo->domain}}</td>
                                </tr>
                                <tr>
                                    <td>cPanel Url </td>
                                    <td>{{$project->projectDeploymentInfo->cpanel_url}}</td>
                                </tr>
                                <tr>
                                    <td>cPanel Username </td>
                                    <td>{{$project->projectDeploymentInfo->cpanel_username}}</td>
                                </tr>
                                <tr>
                                    <td>cPanel Password</td>
                                    <td>{{$project->projectDeploymentInfo->cpanel_password}}</td>
                                </tr>
                                <tr>
                                    <td>Dashboard Url</td>
                                    <td>{{$project->projectDeploymentInfo->dashboard_url}}</td>
                                </tr>
                                <tr>
                                    <td>Dashboard Username</td>
                                    <td>{{$project->projectDeploymentInfo->dashboard_username}}</td>
                                </tr>
                                <tr>
                                    <td>Dashboard Password</td>
                                    <td>{{$project->projectDeploymentInfo->dashboard_password}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end todaty calls table -->
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
