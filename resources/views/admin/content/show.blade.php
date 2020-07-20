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




                                <form action="{{route("admin.content.update",$content->id)}}" method="post" enctype="multipart/form-data">

                                        @csrf

                                        <select name="page" id="page" class="form-control">
                                        <option selected>{{$content->page}}</option>
                                            <option value="mlm">MLM</option>
                                            <option value="mlm companies">MLM Companies</option>
                                            <option value="mlm company">MLM Company</option>
                                            <option value="mlm business">MLM Business</option>
                                            <option value="mlm software">MLM Software</option>
                                            <option value="network marketing">Network Marketing</option>
                                            <option value="multi level marketing">Multi Level Marketing</option>
                                            <option value="multi level marketers">Multi Level Marketers</option>
                                            <option value="direct marketing">Direct Marketing</option>
                                            <option value="direct selling companies">Direct Selling Companies</option>
                                            <option disabled>------------------------------------------------------------</option>

                                            <option value="mlm cities">MlM Cities</option>
                                            <option value="mlm companies cities">MLM Companies Cities</option>
                                            <option value="mlm company cities">MLM Company Cities</option>
                                            <option value="mlm business cities">MLM Business Cities</option>
                                            <option value="mlm software cities">MLM Software Cities</option>
                                            <option value="network marketing cities">Network Marketing Cities</option>
                                            <option value="multi level marketing cities">Multi Level Marketing Cities</option>
                                            <option value="multi level marketers cities">Multi Level Marketers Cities</option>
                                            <option value="direct marketing cities">Direct Marketing Cities</option>
                                            <option value="direct selling companies cities">Direct Selling Companies Cities</option>
                                            
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
            selector: '#content'
        });

    });

</script>

@endsection
