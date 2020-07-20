
@extends('layouts.master')

@section('content')

@foreach ($infos as $info)
<p>{{$info->city}}</p>
<p>{{$info->email}}</p>
<p>{{$info->phone}}</p>
<p>{{$info->url}}</p>
<p>{{$info->moreinfo}}</p>    
@endforeach
    
@endsection



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


@section('footer')

@include('footer')
    
@endsection