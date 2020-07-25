@extends('layouts.master')


@section('title')
    CarGurus in {{$infos->first()->city }}
@endsection


@section('links')
<script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" defer type="text/javascript" charset="utf-8"></script>
<script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" defer type="text/javascript" charset="utf-8"></script>
@endsection


@section('onload')
onload="getMap()"
@endsection

@section('content')



<main class="pt-2">
    <div class="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                   
                    {{-- {{ $infos->first()->city }} --}}




                    {{-- <article class="pb-3"> --}}

                    {{-- 
                            <div class="cities-tabs">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="#info" data-toggle="tab" href="#info" role="tab"
                                            aria-controls="info" aria-selected="true">More Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="#email" data-toggle="tab" href="#email" role="tab"
                                            aria-controls="email" aria-selected="false">Email</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="#phone" data-toggle="tab" href="#phone" role="tab"
                                            aria-controls="phone" aria-selected="false">Phone</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="#web" data-toggle="tab" href="#web" role="tab"
                                            aria-controls="web" aria-selected="false">Website</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="info" role="tabpanel"
                                        aria-labelledby="info">Lorem Ipsum</div>
                                    <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email">
                                        {{ $info->email }}</div>
                <div class="tab-pane fade" id="phone" role="tabpanel" aria-labelledby="phone">
                    {{ $info->phone }}</div>
                <div class="tab-pane fade" id="web" role="tabpanel" aria-labelledby="web">
                    {{ $info->url }}</div>
            </div>
        </div>


        </article> --}}


        <br><br>

        <div id="contentMCE">

            @if($content->first()!=null)
            @php
                $content= str_replace('{($_CITY)}',  $infos->first()->city ,$content->first()->content);

                
            @endphp

            {!!$content!!}

            
               


            @endif
        </div>





        <h2 class="pb-3 text-center">Find us in: </h2>

        <div style="width: 100%; height: 450px" id="mapContainer">
        </div>



        <div class="cities-tabs">
            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="#info2" data-toggle="tab" href="#info2" role="tab"
                        aria-controls="info2" aria-selected="true">More Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="#email2" data-toggle="tab" href="#email2" role="tab" aria-controls="email2"
                        aria-selected="false">Email</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="#phone2" data-toggle="tab" href="#phone2" role="tab" aria-controls="phone2"
                        aria-selected="false">Phone</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="#web2" data-toggle="tab" href="#web2" role="tab" aria-controls="web2"
                        aria-selected="false">Website</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent2">
                <div class="tab-pane fade show active" id="info2" role="tabpanel" aria-labelledby="info2">Lorem Ipsum
                </div>
                <div class="tab-pane fade" id="email2" role="tabpanel" aria-labelledby="email2">
                    {{ $infos->first()->email }}</div>
                <div class="tab-pane fade" id="phone2" role="tabpanel" aria-labelledby="phone2">
                    {{ $infos->first()->phone }}</div>
                <div class="tab-pane fade" id="web2" role="tabpanel" aria-labelledby="web2">
                    {{ $infos->first()->url }}</div>
            </div>
        </div>

    </div>


    </div>
    </div>
    </div>
</main>



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





@section('scripts')


<script>
    document.getElementById("mapContainer").addEventListener("load", getMap);


    function getMap() {
        console.log("inside");
        var citi = "{{ $info=$infos->first()->city }}";


        if (citi.includes("tekirda")) {
            citi = "Tekirdağ"
        }
        console.log(citi);
        $.ajax({
            url: 'https://geocoder.ls.hereapi.com/6.2/geocode.json?apiKey=F8AWLo4qe51rnLMUknCs8HPYGwl7Q7p_5TNVahy0a8s&gen=9&searchtext=' +
                citi,
            type: 'GET',
            data: citi,
            success: function (result) {
                console.log(result);

                var longt = result["Response"]["View"][0]["Result"][0]["Location"]["DisplayPosition"][
                    "Longitude"
                ];
                var latit = result["Response"]["View"][0]["Result"][0]["Location"]["DisplayPosition"][
                    "Latitude"
                ];


                var platform = new H.service.Platform({
                    'apikey': 'F8AWLo4qe51rnLMUknCs8HPYGwl7Q7p_5TNVahy0a8s'
                });

                // Obtain the default map types from the platform object
                var maptypes = platform.createDefaultLayers();

                // Instantiate (and display) a map object:
                var map = new H.Map(
                    document.getElementById('mapContainer'),
                    maptypes.vector.normal.map, {
                        zoom: 10,
                        center: {
                            lng: longt,
                            lat: latit
                        }
                    });

            }
        });
    }


</script>
@endsection
