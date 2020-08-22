@extends('layouts.admin-master');

@section('content')


<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Cities</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">City</a></li>
                        <li class="breadcrumb-item active">All Cities</li>
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
                                                    <th data-breakpoints="xs">City</th>
                                                    <th data-breakpoints="xs">Email</th>
                                                    <th data-breakpoints="xs">Phone</th>
                                                    <th data-breakpoints="xs">URL</th>
                                                    <th data-breakpoints="xs">More Info</th>
                                                    <th data-breakpoints="xs">Wiki URL</th>
                                                    <th data-breakpoints="xs sm md">Edit/Delete</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $a=1;
                                                @endphp

                                                @foreach($cities as $city)


                                                    <tr>
                                                        <td>
                                                            <p class="c_name">@php
                                                                echo $a++;
                                                @endphp</p>
                                                </td>
                                                <td>
                                                    <p class="c_name">{{ $city->city }}</p>
                                                </td>
                                                <td>
                                                    <p class="c_name">{{ $city->email }}</p>
                                                </td>
                                                <td>
                                                    <p class="c_name">{{ $city->phone }}</p>
                                                </td>
                                                <td>
                                                    <p class="c_name">{{ $city->url }}</p>
                                                </td>
                                                <td>
                                                    <p class="c_name">{{ $city->moreinfo }}</p>
                                                </td>
                                                <td>
                                                    <p class="c_name">{{ $city->wiki_link }}</p>
                                                </td>
                                                <td>
                                                    <a href="{{ route("admin.city.show","$city->id") }}"
                                                        class="btn btn-primary btn-sm"><i
                                                            class="zmdi zmdi-edit"></i></a>


                                                    <form
                                                        action="{{ route("admin.city.destroy","$city->id") }}" method="post">
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