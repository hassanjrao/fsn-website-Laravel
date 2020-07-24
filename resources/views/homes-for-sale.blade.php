@extends('layouts.master')

@section('title')
Homes For Sale
@endsection

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Homes For Sale</h2>
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