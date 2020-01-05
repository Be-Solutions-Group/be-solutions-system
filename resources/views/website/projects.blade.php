@extends('website.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedStyle')

@endsection
{{--Drop Your Customized Scripts Codes Here--}}
@section('customizedScript')
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : false,
                'info'        : true,
                'autoWidth'   : false
            })
        })
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
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary" style="padding: 15px">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Projects Info</h3>
                        {{--<a href="{{url('add-new-project')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New Project </a>--}}
                    </div>
                @include('dashboard.layouts.messages')
                <!-- /.box-header -->
                    <!-- form start -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Client</th>
                            <th>Sales Man</th>
                            <th>Type</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Client</th>
                            <th>Sales Man</th>
                            <th>Type</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($projects)
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{$project->id}}</td>
                                    <td>{{$project->name}}</td>
                                    <td>{{$project->client->name}}</td>
                                    <td>{{$project->member->username}} ({{$project->member->team->member->username}})</td>
                                    <td>{{$project->project_type}}</td>
                                    <td>{{$project->created_at ? $project->created_at->diffForHumans() : ''}}</td>
                                    <td>
                                        <a href="{{url('show-project/' . $project->id)}}" class style="font-size: 20px"><i class="fa fa-eye"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                    {{--@if($services)
                        @foreach($services as $service)
                            <div class="modal modal-danger fade" id="delete{{$service->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete User</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You Sure You Want To Delete Service <strong>{{$service->service_en->title}}</strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('service.destroy', $service->id)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <div class="d-flex flex-row">
                                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="margin-right: 5px">
                                                        cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        @endforeach
                    @endif--}}

                </div>
            </div>
        </div>
    </section>

@endsection
