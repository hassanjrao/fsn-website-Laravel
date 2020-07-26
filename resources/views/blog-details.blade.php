@extends('layouts.master')

@section('title')
Blog
@endsection

@section('content')

<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 order-md-1 order-1">

                <div class="blog__details__text">
                    <img src="{{ asset('/storage/images/blog/') }}/{{ $blog->image }}" alt="">
                    
                    <h2>{{ $blog->title }}</h2>


                    {!! $blog->body !!}
                   
                       
                </div>
            </div>
        </div>
    </div>
</section>


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
