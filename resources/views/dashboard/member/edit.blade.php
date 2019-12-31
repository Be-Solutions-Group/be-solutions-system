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
            Branches
            <small>Add New Branch</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/branch')}}">Branches</a></li>
            <li class="active">All Branches</li>
        </ol>
    </section>

    <section class="content">
        @include('dashboard.layouts.messages')
        <form role="form" action="{{route('member.update', $member->id)}}" enctype="multipart/form-data" method="post">
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
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Member Name" value="{{$member->username}}">
                                    <p class="help-block">Enter Member Name</p>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> Team</label>
                                    <select name="team_id" id="sales_team" class="form-control">
                                        <option value="">Choose Team</option>
                                        @foreach($teams as $team)
                                            <option value="{{$team->id}}" {{$team->id == $member->team_id ? 'selected' : ''}}>{{$team->name}}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block">Select Team</p>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Position</label>
                                    <select name="position" id="sales_man" class="form-control">
                                        <option value="">Choose Position</option>
                                        @foreach($positions as $position)
                                            <option value="{{$position->id}}" {{$position->id == $member->position_id ? 'selected' : ''}}>{{$position->title}}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block">Select Position</p>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Branch</label>
                                    <select name="branch" id="sales_man" class="form-control">
                                        <option value="0">Choose Branch</option>
                                        @foreach($branches as $branch)
                                            <option value="{{$branch->id}}" {{$branch->id == $member->branch_id ? 'selected' : ''}}>{{$branch->name}}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block">Select Branch</p>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Is Member Team Leader ?</label>
                                    <div class="d-flex flex-row ">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="is_leader" value="1" {{$member->is_leader == 1 ? 'checked' : ''}}>
                                                Team Leader
                                            </label>
                                        </div>
                                    </div>
                                    <p class="help-block">Check If member is Team Leader or Not</p>
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
