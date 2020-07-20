@extends('layouts.admin-master')


@section('content')

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Edit Blog</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Courses</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Blog</a></li>
                        <li class="breadcrumb-item active">Edit Blog</li>
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




                                <form action="{{route("admin.blog.update","$blog->id")}}" method="post" enctype="multipart/form-data">

                                        @csrf

                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control" placeholder="Title"
                                        required="" value="{{$blog->title}}" />
                                        </div>

                                        <div class="form-group">
                                            <textarea id="body" rows="15" name="body" class="form-control"
                                                placeholder="Body"> {{$blog->body}} </textarea>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="caption" class="form-control" placeholder="Caption"
                                                required="" value="{{$blog->caption}}" />
                                        </div>

                                        <div class="form-group">
                                            <input type="file" name="image" class="form-control" placeholder="Password"
                                                required="" />
                                            <img src="/storage/images/blog/{{$blog->image}}" width="60px" height="60px">
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
            selector: '#body'
        });

    });

</script>

@endsection
