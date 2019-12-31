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
            Projects
            <small>Edit Project</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/project')}}">Project</a></li>
            <li class="active">Edit Project</li>
        </ol>
    </section>


    <section class="content">
        @include('dashboard.layouts.messages')
        <form role="form" action="{{route('project.update', $project->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="created_by">
            <div class="row">
                <!-- English Side -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Project Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Project Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Project" value="{{$project->name}}">
                                    <p class="help-block">Enter Project Name</p>
                                </div>

                                {{--<div class="col-lg-4">
                                    <label for="exampleInputEmail1">Client Name</label>
                                    <input type="text" class="form-control" name="client_name" id="exampleInputEmail1" placeholder="Enter Client" value="{{$project}}">
                                    <p class="help-block">Enter Client Name of Project</p>
                                </div>--}}

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Sales Team</label>
                                    <select name="team_id" id="sales_team" class="form-control">
                                        <option value="0">Choose Sales Team</option>
                                        @foreach($salesTeams as $team)
                                            <option value="{{$team->id}}" {{$team->id == $project->member->team_id ? 'selected' : ''}}>{{$team->name}}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block">Select Team</p>
                                </div>


                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Sales Man</label>
                                    <select name="sales_man" id="sales_man" class="form-control">
                                        <option value="0">Choose Sales Man</option>
                                        @foreach($members as $member)
                                            <option value="{{$member->id}}" {{$member->id == $project->sales_man_id ? 'selected' : ''}}>{{$member->username}}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block">Select Sales Man</p>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Status</label>
                                    <select name="status" id="sales_man" class="form-control">
                                        <option value="0">Choose Project Status</option>
                                        @foreach($status as $item)
                                            <option value="{{$item->id}}" {{$item->id == $project->status_id ? 'selected' : ''}}>{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block">Select Project Status</p>
                                </div>

                                {{--<div class="col-lg-4">
                                    <label for="exampleInputEmail1">Priority</label>
                                    <select name="priority" id="sales_man" class="form-control">
                                        <option value="">Choose Project Priority</option>
                                        <option value="1">High</option>
                                        <option value="2">Normal</option>
                                    </select>
                                    <p class="help-block">Select Project Priority</p>
                                </div>--}}



                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Domain</label>
                                    <input type="url" class="form-control" name="domain" id="exampleInputEmail1" placeholder="Enter Client" value="{{$project->domain}}">
                                    <p class="help-block">Enter Domain Of Project</p>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> LOGO</label>
                                    <input type="file" class="form-control" name="image_id" id="exampleInputEmail1" placeholder="Enter Service text">
                                    <p class="help-block"> Upload Company Logo </p>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> Contract Image</label>
                                    <input type="file" class="form-control" name="contract" id="exampleInputEmail1" placeholder="Enter Service text">
                                    <p class="help-block"> Upload Contract of Project </p>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> Content of Website</label>
                                    <input type="file" class="form-control" name="content" id="exampleInputEmail1" placeholder="Enter Service text">
                                    <p class="help-block"> Upload <strong>Zip File</strong> with all content and images of website</p>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Project Notes</label>
                                    <textarea  class="form-control" name="description" placeholder="Enter Service Description" rows="6">{{$project->description}}</textarea>
                                    <p class="help-block">Enter Project Notes</p>
                                </div>
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Project Type</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="project_type" value="Mobile" {{$project->project_type == 'Mobile' ? 'checked' : ''}}>
                                            Mobile
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="project_type" value="Web" {{$project->project_type == 'Web' ? 'checked' : ''}}>
                                            Web
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="project_type" value="Web & Mobile" {{$project->project_type == 'Web & Mobile' ? 'checked' : ''}}>
                                            Both
                                        </label>
                                    </div>
                                    <p class="help-block">Choose Project Type</p>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection
