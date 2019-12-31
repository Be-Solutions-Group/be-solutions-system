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
            Branches
            <small>All Branches</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/branch')}}">Branches</a></li>
            <li class="active">All Branches</li>
        </ol>
    </section>


    <section class="content">
        @include('dashboard.layouts.messages')
        <form role="form" action="{{route('branch.update', $branch->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="created_by">
            <div class="row">
                <!-- English Side -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Branch Info</h3>
                        </div>
                        <!-- /.box-header -->

                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Project" value="{{$branch->name}}">
                                    <p class="help-block">Enter Branch Name</p>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> Team</label>
                                    <select name="manager" id="sales_team" class="form-control">
                                        <option value="">Choose Manager</option>
                                        @foreach($managers as $manager)
                                            <option value="{{$manager->id}}" {{$branch->manager_id == $manager->id ? 'selected' : ''}}>{{$manager->username}}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block">Select Manager</p>
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
