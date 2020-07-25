@extends('layouts.admin-master')

@section('content')


<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add Content</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Courses</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Content</a></li>
                        <li class="breadcrumb-item active">Add Content</li>
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
                            <h2 class="card-inside-title">Add Content</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    @include('admin/flash-msg')

                                    <br>

                                    <form action="{{ route("admin.content.store") }}" method="post"
                                        enctype="multipart/form-data">

                                        @csrf
                                        <div class="form-group">

                                            <select name="page" id="page" class="form-control">

                                                <option disabled selected>Select Page</option>
                                                <option class="non-city" value="cars for sale">Cars For Sale</option>
                                                <option class="non-city" value="cargurus">Cargurus</option>
                                                <option class="non-city" value="cargurus used cars">Cargurus Used Cars</option>
                                                <option class="non-city" value="autozone">Autozone</option>
                                                <option class="non-city" value="autotrader">Autotrader</option>
                                                <option class="non-city" value="trulia">Trulia</option>
                                                <option class="non-city" value="autozone near me">Autozone Near Me</option>
                                                <option class="non-city" value="used cars">Used Cars</option>
                                                <option class="non-city" value="used cars for sale">Used Cars For Sale</option>
                                                <option class="non-city" value="used cars for sale near me">Used Cars For Sale Near Me
                                                </option>
                                                <option class="non-city" value="homes">Homes</option>
                                                <option class="non-city" value="house for sale">House For Sale</option>
                                                <option class="non-city" value="homes for sale">Homes For Sale</option>
                                                <option class="non-city" value="house for sale near me">House For sale Near Me</option>
                                                <option class="non-city" value="homes for sale near me">Homes For sale Near Me</option>
                                                <option class="non-city" value="car for sale near me">Car For Sale Near Me</option>
                                                <option class="non-city" value="motorcycle sale">Motorcycle Sale</option>
                                                <option class="non-city" value="classic cars for sale">Classic Cars For Sale</option>
                                                <option class="non-city" value="bikes shop">Bikes Shop</option>
                                                <option class="non-city" value="bikes shop near me">Bikes Shop Near Me</option>

                                                <option disabled>-------------------------------------------------------</option>


                                                <option class="city-page" value="cars for sale city">Cars For Sale - City</option>
                                                <option class="city-page" value="cargurus city">Cargurus - City</option>
                                                <option class="city-page" value="cargurus used cars city">Cargurus Used Cars - City</option>
                                                <option class="city-page" value="autozone city">Autozone - City</option>
                                                <option class="city-page" value="autotrader city">Autotrader - City</option>
                                                <option class="city-page" value="trulia city">Trulia - City</option>
                                                <option class="city-page" value="autozone near me city">Autozone Near Me - City</option>
                                                <option class="city-page" value="used cars city">Used Cars - City</option>
                                                <option class="city-page" value="used cars for sale city">Used Cars For Sale - City</option>
                                                <option class="city-page" value="used cars for sale near me city">Used Cars For Sale Near Me - City
                                                </option>
                                                <option class="city-page" value="homes city">Homes - City</option>
                                                <option class="city-page" value="house for sale city">House For Sale - City</option>
                                                <option class="city-page" value="homes for sale city">Homes For Sale - City</option>
                                                <option class="city-page" value="house for sale near me city">House For sale Near Me - City</option>
                                                <option class="city-page" value="homes for sale near me city">Homes For sale Near Me - City</option>
                                                <option class="city-page" value="car for sale near me city">Car For Sale Near Me - City</option>
                                                <option class="city-page" value="motorcycle sale city">Motorcycle Sale - City</option>
                                                <option class="city-page" value="classic cars for sale city">Classic Cars For Sale - City</option>
                                                <option class="city-page" value="bikes shop city">Bikes Shop - City</option>
                                                <option class="city-page" value="bikes shop near me city">Bikes Shop Near Me - City</option>


                                            </select>
                                        </div>

                                        <br>
                                        <input type="text" name="heading" placeholder="Heading H1" class="form-control heading" style="display: none">
                                        <br>
                                        <div class="form-group">
                                            <textarea rows="15" name="content" class="form-control"
                                                placeholder="Content one"></textarea>
                                        </div>
                                        <br>

                                        <div class="form-group content-third" style="display: none">
                                            <textarea rows="15" name="content-third" class="form-control"
                                                placeholder="Content third"></textarea>
                                        </div>

                                        <button name="submit" type="submit" style="float: right;"
                                            class="btn btn-success btn-sm">Submit</button>
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


@section('scripts')
<script src="../../../admin-assets/assets/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js -->
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script
    src="../../../admin-assets/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js">
</script>


<script src="https://cdn.tiny.cloud/1/rikps930c10cl6vxmoq7viyjr9bhgzs8ukeyn4y0080ytyf6/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>

<script>
    $(document).ready(function () {

        tinymce.init({
            selector: 'textarea'
           
        });

        $(".non-city").click(function(){
            $(".content-third").hide();
            $(".heading").hide();
        });
        $(".city-page").click(function(){
            $(".content-third").show();
            $(".heading").show();
        });

    });

</script>
@endsection
