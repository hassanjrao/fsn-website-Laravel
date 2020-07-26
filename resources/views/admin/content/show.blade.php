@extends('layouts.admin-master')


@section('content')

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Edit Content</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> FSN</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Content</a></li>
                        <li class="breadcrumb-item active">Edit Content</li>
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
                            <h2 class="card-inside-title">Update</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">




                                    <form
                                        action="{{ route("admin.content.update",$content->id) }}"
                                        method="post" enctype="multipart/form-data">

                                        @csrf

                                        <select name="page" id="page" class="form-control">
                                            <option value="{{ $content->page }}" selected>{{ $content->page }}
                                            </option>

                                            <option value="about">About</option>
                                            <option value="disclaimer">Disclaimer</option>
                                            <option value="tos">TOS</option>
                                            <option value="privacy policy">Privacy Policy</option>


                                            <option value="cars for sale">Cars For Sale</option>
                                            <option value="cargurus">Cargurus</option>
                                            <option value="cargurus used cars">Cargurus Used Cars</option>
                                            <option value="autozone">Autozone</option>
                                            <option value="autotrader">Autotrader</option>
                                            <option value="trulia">Trulia</option>
                                            <option value="autozone near me">Autozone Near Me</option>
                                            <option value="used cars">Used Cars</option>
                                            <option value="used cars for sale">Used Cars For Sale</option>
                                            <option value="used cars for sale near me">Used Cars For Sale Near Me
                                            </option>
                                            <option value="homes">Homes</option>
                                            <option value="house for sale">House For Sale</option>
                                            <option value="homes for sale">Homes For Sale</option>
                                            <option value="house for sale near me">House For sale Near Me</option>
                                            <option value="homes for sale near me">Homes For sale Near Me</option>
                                            <option value="car for sale near me">Car For Sale Near Me</option>
                                            <option value="motorcycle sale">Motorcycle Sale</option>
                                            <option value="classic cars for sale">Classic Cars For Sale</option>
                                            <option value="bikes shop">Bikes Shop</option>
                                            <option value="bikes shop near me">Bikes Shop Near Me</option>

                                            
                                            <option disabled>-------------------------------------------------------
                                            </option>


                                            <option class="city-page" value="cars for sale city">Cars For Sale - City
                                            </option>
                                            <option class="city-page" value="cargurus city">Cargurus - City</option>
                                            <option class="city-page" value="cargurus used cars city">Cargurus Used Cars
                                                - City</option>
                                            <option class="city-page" value="autozone city">Autozone - City</option>
                                            <option class="city-page" value="autotrader city">Autotrader - City</option>
                                            <option class="city-page" value="trulia city">Trulia - City</option>
                                            <option class="city-page" value="autozone near me city">Autozone Near Me -
                                                City</option>
                                            <option class="city-page" value="used cars city">Used Cars - City</option>
                                            <option class="city-page" value="used cars for sale city">Used Cars For Sale
                                                - City</option>
                                            <option class="city-page" value="used cars for sale near me city">Used Cars
                                                For Sale Near Me - City
                                            </option>
                                            <option class="city-page" value="homes city">Homes - City</option>
                                            <option class="city-page" value="house for sale city">House For Sale - City
                                            </option>
                                            <option class="city-page" value="homes for sale city">Homes For Sale - City
                                            </option>
                                            <option class="city-page" value="house for sale near me city">House For sale
                                                Near Me - City</option>
                                            <option class="city-page" value="homes for sale near me city">Homes For sale
                                                Near Me - City</option>
                                            <option class="city-page" value="car for sale near me city">Car For Sale
                                                Near Me - City</option>
                                            <option class="city-page" value="motorcycle sale city">Motorcycle Sale -
                                                City</option>
                                            <option class="city-page" value="classic cars for sale city">Classic Cars
                                                For Sale - City</option>
                                            <option class="city-page" value="bikes shop city">Bikes Shop - City</option>
                                            <option class="city-page" value="bikes shop near me city">Bikes Shop Near Me
                                                - City</option>


                                        </select>

                                        <br><br>
                                        @if($content->heading!=null)
                                            <input type="text" class="form-control" placeholder="Heading"
                                                value="{{ $content->heading }}" name="heading">
                                        @endif

                                        <br>

                                        <div class="form-group">
                                            <textarea id="content" rows="15" name="content" class="form-control"
                                                placeholder="Content">{!! $content->content !!}</textarea>
                                        </div>

                                        <br>
                                        @if($content->content_third!=null)
                                            <div class="form-group">
                                                <textarea id="content" rows="15" name="content-third"
                                                    class="form-control"
                                                    placeholder="Content Third">{!! $content->content_third !!}</textarea>
                                            </div>
                                        @endif


                                        <button name="submit1" type="submit" style="float: right;"
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
            selector: 'textarea',


        });




    });

</script>




@endsection
