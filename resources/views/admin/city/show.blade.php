@extends('layouts.admin-master')

@section('content')


<div class="authentication">
    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-md-4 col-sm-12">
            <form class="card auth_form" method="post" enctype="multipart/form-data"  action="{{route("admin.city.update",$city->id)}}">
                    
                    @csrf

                    <div class="header">
                        <img class="logo" src="../../admin-assets/assets/images/logo.svg" alt="">
                        <h5>Update City</h5>
                    </div>

                    <div class="body">
                        <div class="input-group mb-3">
                            <input type="text" name="city" class="form-control" placeholder="Name" value="{{$city->city}}" />
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{$city->email}}" />
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{$city->phone}}" />
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="url" class="form-control" placeholder="URL" value="{{$city->url}}" />
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="moreinfo" class="form-control" placeholder="More Info" value="{{$city->moreinfo}}" />
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="wikilink" class="form-control" placeholder="More Info" value="{{$city->wiki_link}}" />
                        </div>


                        <input type="submit" name="submit" class="btn btn-primary btn-block waves-effect waves-light"
                            value="Update">

                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
@endsection
