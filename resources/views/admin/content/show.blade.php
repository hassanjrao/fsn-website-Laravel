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
                                            <option selected disabled>{{ $content->page }}</option>
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

                                        </select>

                                        <div class="form-group">
                                            <textarea id="content" rows="15" name="content" class="form-control"
                                                placeholder="Content">{!! $content->content !!}</textarea>
                                        </div>

                                     
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
            selector: '#content',

           
        });


     

    });

</script>




@endsection
