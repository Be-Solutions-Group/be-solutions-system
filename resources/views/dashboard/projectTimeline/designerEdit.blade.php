@extends('dashboard.layouts.layouts')
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
            CKEDITOR.replace('editor3');
            CKEDITOR.replace('editor4');
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
            Timeline of <strong>{{$project->name}}</strong>
            <small>Edit Project Timeline</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/project-timeline')}}">Project</a></li>
            <li class="active">Edit Project</li>
        </ol>
    </section>


    <section class="content">
        <div class="alert alert-circled alert-warning">
            <strong>Note:</strong> Last Project Design Will Be Finished <strong>{{$lastProjectDesign->design_finish ? $lastProjectDesign->design_finish->format('d M Y') : ''}}</strong>
        </div>
        @include('dashboard.layouts.messages')
        <form role="form" action="{{route('project-timeline.update', $project->projectTimeline->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="created_by">
            <div class="row">
                <!-- English Side -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Project Timeline Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Design Started:</label>
                                        <input type="date" class="form-control pull-right" name="design_start" value="{{$project->projectTimeline->design_start ? $project->projectTimeline->design_start->format('Y-m-d') : ''}}">
                                        <!-- /.input group -->
                                    </div>
                                    <p class="help-block">Design Started In</p>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Design Finish:</label>
                                        <input type="date" class="form-control pull-right" name="design_finish" value="{{$project->projectTimeline->design_finish ? $project->projectTimeline->design_finish->format('Y-m-d') : ''}}">
                                        <!-- /.input group -->
                                    </div>
                                    <p class="help-block">Enter Expected Date To Finish Design</p>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Design Approved:</label>
                                        <input type="date" class="form-control pull-right" name="design_approved">
                                        <!-- /.input group -->
                                    </div>
                                    <p class="help-block">Design Approved In: </p>
                                </div>


                                <div class="col-lg-3">
                                    <label for="exampleInputEmail1">Designer</label>
                                    <select name="designer" id="sales_team" class="form-control">
                                        <option value="">Choose Designer</option>
                                        @foreach($designers as $designer)
                                            <option value="{{$designer->id}}" {{$designer->id == $project->projectTimeline->designer ? 'selected' : ''}}>{{$designer->username}}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block">Select Developer</p>
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> Project Notes</label>
                                    <textarea  class="form-control" name="notes" placeholder="Enter Service Description" rows="1">{{$project->projectTimeline->notes}}</textarea>
                                    <p class="help-block">Enter Project Notes</p>
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleInputEmail1">Status</label>
                                    <select name="status" id="sales_man" class="form-control">
                                        <option value="">Choose Project Status</option>
                                        @foreach($status as $item)
                                            <option value="{{$item->id}}" {{$item->id == $project->status_id ? 'selected' : ''}}>{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block">Select Project Status</p>
                                </div>


                                <div class="col-lg-3">
                                    <label for="exampleInputEmail1">Project Finalization</label>
                                    <div class="form-group">

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="data_filled" {{$project->projectTimeline->data_filled == 1 ? 'checked' : ''}}>
                                                Data Filled
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="approved" {{$project->projectTimeline->approved == 1 ? 'checked' : ''}}>
                                                Approved From Client
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="col-lg-12">
                                <h3 class="box-title">Project Deployment Info</h3>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Domain</label>
                                        <input type="text" class="form-control pull-right" name="domain" placeholder="Website Domain" disabled value="{{$project->projectDeploymentInfo->domain}}">
                                        <!-- /.input group -->
                                    </div>
                                    <p class="help-block">Enter Website Domain</p>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>cPanel Url</label>
                                        <input type="url" class="form-control pull-right" name="cpanel_url" placeholder="cpanel Url" disabled value="{{$project->projectDeploymentInfo->cpanel_url}}">
                                        <!-- /.input group -->
                                    </div>
                                    <p class="help-block">Enter cPanel Url</p>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>cPanel Username</label>
                                        <input type="text" class="form-control pull-right" name="cpanel_username" placeholder="cPanel Username" disabled value="{{$project->projectDeploymentInfo->cpanel_username}}">
                                        <!-- /.input group -->
                                    </div>
                                    <p class="help-block">Enter cPanel Username</p>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>cPanel Password</label>
                                        <input type="text" class="form-control pull-right" name="cpanel_password" placeholder="cPanel Password" disabled value="{{$project->projectDeploymentInfo->cpanel_password}}">
                                        <!-- /.input group -->
                                    </div>
                                    <p class="help-block">Enter cPanel Password</p>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Dashboard Url</label>
                                        <input type="url" class="form-control pull-right" name="dashboard_url" placeholder="Dashboard Url" disabled value="{{$project->projectDeploymentInfo->dashboard_url}}">
                                        <!-- /.input group -->
                                    </div>
                                    <p class="help-block">Enter Dashboard Url</p>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Dashboard Username</label>
                                        <input type="text" class="form-control pull-right" name="dashboard_username" placeholder="Dashboard Username" disabled value="{{$project->projectDeploymentInfo->dashboard_username}}">
                                        <!-- /.input group -->
                                    </div>
                                    <p class="help-block">Enter Dashboard Username</p>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Dashboard Password</label>
                                        <input type="text" class="form-control pull-right" name="dashboard_password" placeholder="Dashboard Password" disabled value="{{$project->projectDeploymentInfo->dashboard_password}}">
                                        <!-- /.input group -->
                                    </div>
                                    <p class="help-block">Enter Dashboard Password</p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection
