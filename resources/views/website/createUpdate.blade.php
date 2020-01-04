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
            Projects Updates
            <small>Add New Update</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('add-new-update')}}">Updates</a></li>
            <li class="active">Add New Update</li>
        </ol>
    </section>


    <section class="content">

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
                            <h3 class="box-title">Add Update Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Project Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Project" value="{{old('name')}}">
                                    <p class="help-block">Enter Project Name</p>
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> Files</label>
                                    <input type="file" class="form-control" name="content" id="exampleInputEmail1" placeholder="Enter Service text">
                                    <p class="help-block"> Upload <strong>Zip File</strong> of (images, Files, etc...) if exist </p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Update Notes</label>
                                    <textarea  class="form-control" name="description" placeholder="Enter Service Description" rows="6">{{old('notes')}}</textarea>
                                    <p class="help-block">Enter Project Notes</p>
                                </div>

                            </div>

                            <div class="form-group">

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
