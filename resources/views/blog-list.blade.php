@extends('layouts.master')

@section('title')
Blogs
@endsection

@section('content')


<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12">
                <div class="row">

                    @foreach($blogs as $blog)


                    @php
                        $t= strtolower(preg_replace('/\s+/', '-', $blog->title));
                        $tit= preg_replace('/\?/', '', $t);
                    @endphp

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    
                                <a href="{{route("blog",["title"=>$tit,"id"=>$blog->id])}}"><img src="/storage/images/blog/{{$blog->image}}" alt="Blog Image"></a>
                                </div>
                                <div class="blog__item__text">
                                <h5><a href="{{route("blog",["title"=>$tit,"id"=>$blog->id])}}">{{$blog->title}}</a></h5>

                                <?php
                                                                
                                $capt="";

                                if(strlen(strip_tags($blog->caption))>180){
                                    $capt=substr(strip_tags($blog->caption),0,180)."..............";
                                }
                                else{
                                    $capt=$blog->caption;
                                }

                            ?>
                                   

                                    <p>{!! $capt !!}</p>

                                     <a href="{{route("blog",["title"=>$tit,"id"=>$blog->id])}}" class="blog__btn"> READ MORE <i class="far fa-arrow-alt-circle-right"></i></a> 
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>

            <div class="col-lg-12">

               {{$blogs->links()}}
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->



@endsection


@section('footer')

@php

    $cts = array();
    $z = 0;
    $done_cities = array();
    $cities=[];
    $ind=0;

    foreach($ctis as $ct){
    $cities[$ind++]= $ct->city;
    }

    $totalCities = count($cities);

    $n = range(0, $totalCities - 1);
    shuffle($n);

@endphp

@include('footer')
@endsection
