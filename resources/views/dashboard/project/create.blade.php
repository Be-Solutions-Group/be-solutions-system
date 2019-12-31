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
            <small>All Projects</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/project')}}">Projects</a></li>
            <li class="active">All Projects</li>
        </ol>
    </section>


    <section class="content">
        <div class="alert alert-circled alert-warning">
            <strong>Note:</strong> Last Web Project Will Be Finished On 21 Jan 2019
        </div>

        @include('dashboard.layouts.messages')
        <form role="form" action="{{route('project.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('post')
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
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Project" value="{{old('name')}}">
                                <p class="help-block">Enter Project Name</p>
                            </div>

                            <div class="col-lg-4">
                                <label for="exampleInputEmail1">Client Name</label>
                                <input type="text" class="form-control" name="client_name" id="exampleInputEmail1" placeholder="Enter Client" value="{{old('client_name')}}">
                                <p class="help-block">Enter Client Name of Project</p>
                            </div>


                            <div class="col-lg-4">
                                <label for="exampleInputEmail1">Sales Team</label>
                                <select name="team_id" id="sales_team" class="form-control">
                                    <option value="0">Choose Sales Team</option>
                                    @foreach($salesTeams as $team)
                                        <option value="{{$team->id}}">{{$team->name}}</option>
                                    @endforeach
                                </select>
                                <p class="help-block">Select Team</p>
                            </div>

                            <div class="col-lg-4">
                                <label for="exampleInputEmail1">Sales Man</label>
                                <select name="sales_man" id="sales_man" class="form-control">
                                    <option value="0">Choose Sales Man</option>
                                    @foreach($members as $member)
                                        <option value="{{$member->id}}">{{$member->username}}</option>
                                    @endforeach
                                </select>
                                <p class="help-block">Select Sales Man</p>
                            </div>

                            <div class="col-lg-4">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" id="sales_man" class="form-control">
                                    <option value="0">Choose Project Status</option>
                                    @foreach($status as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
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
                                <input type="url" class="form-control" name="domain" id="exampleInputEmail1" placeholder="Enter Client" value="{{old('domain')}}">
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
                                <textarea  class="form-control" name="description" placeholder="Enter Service Description" rows="6">{{old('notes')}}</textarea>
                                <p class="help-block">Enter Project Notes</p>
                            </div>
                            <div class="col-lg-4">
                                <label for="exampleInputEmail1">Project Type</label>
                                <div class="d-flex flex-row ">
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="project_type" value="Mobile">
                                            Mobile
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="project_type" value="Web">
                                            Web
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="project_type" value="Web & Mobile">
                                            Both
                                        </label>
                                    </div>
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
