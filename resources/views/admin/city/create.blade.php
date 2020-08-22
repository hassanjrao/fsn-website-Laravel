@extends('layouts.admin-master')

@section('content')



<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add City </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">City</a></li>
                        <li class="breadcrumb-item active">Add City</li>
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

                    <div class="card">
                        <div class="body">
                            <h2 class="card-inside-title">Add City</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    @include('admin/flash-msg')

                                    <br>
                                  
                                    <form method="post" action="{{ route('admin.city.store') }}">

                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="city" class="form-control" placeholder="City Name"
                                                required="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control"
                                                placeholder="City Email" required="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control"
                                                placeholder="City Phone" required="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="url" class="form-control" placeholder="City URL"
                                                required="" />
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="moreinfo" class="form-control"
                                                placeholder="More Info" required="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="wikilink" class="form-control"
                                                placeholder="Wiki URL" required="" />
                                        </div>
                                        <button name="submit" type="submit" style="float: right;"
                                            class="btn btn-success btn-sm">Add</button>
                                    </form>


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
