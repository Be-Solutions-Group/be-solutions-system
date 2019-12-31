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
                                    <td>Hatly</td>
                                </tr>
                                <tr>
                                    <td>Project Description</td>
                                    <td> Hatly Hatly Hatly v Hatly= Hatly Hatly  Hatly  Hatly  Hatly Hatly Hatly Hatly Hatly Hatly Hatly Hatly Hatly Hatly Hatly Hatly  Hatly Hatly </td>
                                </tr>
                                <tr>
                                    <td>Domain</td>
                                    <td><a href="https://www.3elajy.com">https://www.3elajy.com</a></td>
                                </tr>
                                <tr>
                                    <td>Sales Man</td>
                                    <td>Mohammed Hassan</td>
                                </tr>
                                <tr>
                                    <td>Sales Man Team Leader</td>
                                    <td>Ahmed Sha3ban</td>
                                </tr>
                                <tr>
                                    <td>Client</td>
                                    <td>Ahmed Mansur</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>Mobile Application</td>
                                </tr>
                                <tr>
                                    <td>Contract Image</td>
                                    <td><a download="" href="#"><i class="fa fa-download"></i> Download Image</a></td>
                                </tr>
                                <tr>
                                    <td>Content Zip File</td>
                                    <td><a download="" href="#"><i class="fa fa-download"></i> Download</a></td>
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
                                    <td>25 Dec 2019</td>
                                </tr>
                                <tr>
                                    <td>Design Finish </td>
                                    <td>28 Dec 2019</td>
                                </tr>
                                <tr>
                                    <td>Design Approved</td>
                                    <td> 30 Dec 2019 </td>
                                </tr>
                                <tr>
                                    <td>Development Start</td>
                                    <td>1 Jan 2020</td>
                                </tr>
                                <tr>
                                    <td>Development End</td>
                                    <td>3 Jan 2020</td>
                                </tr>
                                <tr>
                                    <td>Designer</td>
                                    <td>Ahmed Sha3ban</td>
                                </tr>
                                <tr>
                                    <td>Developer</td>
                                    <td>Ahmed Mansur</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>In Progress</td>
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
