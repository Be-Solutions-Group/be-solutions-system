@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedStyle')

    <link rel="stylesheet" href="{{assetPath('dashboard/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{assetPath('dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
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

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Initialize Select2 Elements
            $('.select2').select2()

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges   : {
                        'Today'       : [moment(), moment()],
                        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate  : moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });

            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })
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
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Design Finish:</label>
                                        <input type="date" class="form-control pull-right" name="design_finish">
                                        <!-- /.input group -->
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Design Approved:</label>
                                        <input type="date" class="form-control pull-right" name="design_approved">
                                        <!-- /.input group -->
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Development Start:</label>
                                        <input type="date" class="form-control pull-right" name="dev_start">
                                        <!-- /.input group -->
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Development End:</label>
                                        <input type="date" class="form-control pull-right" name="dev_end">
                                        <!-- /.input group -->
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Development End:</label>
                                        <input type="date" class="form-control pull-right" name="dev_end">
                                        <!-- /.input group -->
                                    </div>
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
                                    <label for="exampleInputEmail1">Developer</label>
                                    <select name="member_id" id="sales_team" class="form-control">
                                        <option value="0">Choose Developer</option>
                                        @foreach($developers as $developer)
                                            <option value="{{$developer->id}}">{{$developer->username}}</option>
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
