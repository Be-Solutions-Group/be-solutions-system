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
        @include('dashboard.layouts.messages')
        <form role="form" action="{{route('project-timeline.update', $project->id)}}" enctype="multipart/form-data" method="post">
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

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Design Started:</label>
                                        <input type="date" class="form-control pull-right" name="design_start">
                                        <!-- /.input group -->
                                    </div>
                                    <p class="help-block">Design Started In: </p>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Design Finish:</label>
                                        <input type="date" class="form-control pull-right" name="design_finish">
                                        <!-- /.input group -->
                                    </div>
                                    <p class="help-block">Design Finished In: </p>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Design Approved:</label>
                                        <input type="date" class="form-control pull-right" name="design_approved">
                                        <!-- /.input group -->
                                    </div>
                                    <p class="help-block">Design Approved In: </p>
                                </div>


                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Designer</label>
                                    <select name="member_id" id="sales_team" class="form-control">
                                        <option value="0">Choose Designer</option>
                                        @foreach($designers as $designer)
                                            <option value="{{$designer->id}}">{{$designer->username}}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block">Select Developer</p>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Status</label>
                                    <select name="status" id="sales_man" class="form-control">
                                        <option value="0">Choose Project Status</option>
                                    </select>
                                    <p class="help-block">Select Project Status</p>
                                </div>

                                <div class="col-lg-8">
                                    <label for="exampleInputEmail1"> Project Notes</label>
                                    <textarea  class="form-control" name="description" placeholder="Enter Service Description" rows="6">{{$project->description}}</textarea>
                                    <p class="help-block">Enter Project Notes</p>
                                </div>


                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Project Finalization</label>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                                Tested
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                                Data Filled
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" >
                                                Deployed On Server
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" >
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
                </div>
            </div>
        </form>
    </section>

@endsection
