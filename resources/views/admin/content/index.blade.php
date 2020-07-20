@extends('layouts.admin-master');

@section('content')


<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Contents</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> FSN</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Content</a></li>
                        <li class="breadcrumb-item active">All Contents</li>
                    </ul>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">



                    <div class="container-fluid">
                        <div class="row clearfix">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>

                                                    <th data-breakpoints="xs">ID</th>
                                                    <th data-breakpoints="xs">Content</th>
                                                    <th data-breakpoints="md">Page Name</th>
                                                    <th data-breakpoints="xs sm md">Edit/Delete</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $a=1;
                                                @endphp

                                                @foreach($contents as $content)


                                                    <tr>
                                                        <td>
                                                            <p class="c_name">@php
                                                                echo $a++;
                                                @endphp</p>
                                                </td>
                                                <td>
                                                    @php
                                                    
                                                        $content1=substr($content->content,0,450)."......................";
                                                    @endphp
                                                    <p class="c_name">{!!$content1 !!}</p>
                                                </td>
                                                <td>
                                                    <p class="c_name">{{ $content->page }}</p>
                                                </td>
                                                
                                                <td>
                                                <a href="{{route("admin.content.show",$content->id)}}"
                                                        class="btn btn-primary btn-sm"><i
                                                            class="zmdi zmdi-edit"></i></a>


                                                    <form
                                                action="{{route("admin.content.destroy",$content->id)}}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>

                                                    </form>

                                                </td>
                                                </tr>

                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</section>


@endsection

@section('scripts')

 <!-- Jquery DataTable Plugin Js -->
 <script src="../../../admin-assets/assets/bundles/datatablescripts.bundle.js"></script>
 <script src="../../../admin-assets/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
 <script src="../../../admin-assets/assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
 <script src="../../../admin-assets/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
 <script src="../../../admin-assets/assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
 <script src="../../../admin-assets/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
 <script src="../../../admin-assets/assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>

 <script src="../../../admin-assets/assets/js/pages/tables/jquery-datatable.js"></script>
    
@endsection