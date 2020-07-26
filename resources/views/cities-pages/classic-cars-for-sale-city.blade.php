@extends('layouts.master')


@section('title')
Claasic Cars For Sale in {{ $infos->first()->city }}
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



                    @if($content->first()!=null)
                    @php
                        $h1= str_replace("Vcity$", $infos->first()->city
                        ,$content->first()->heading);

                    @endphp
                     <h1>{{$h1}}</h1>

                @endif

                   

                    {{-- content 1 starts --}}

                    <section>
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
                                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info">
                                    {{ $infos->first()->moreinfo }}</div>
                                <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email">
                                    {{ $infos->first()->email }}
                                </div>
                                <div class="tab-pane fade" id="phone" role="tabpanel" aria-labelledby="phone">
                                    {{ $infos->first()->phone }}</div>
                                <div class="tab-pane fade" id="web" role="tabpanel" aria-labelledby="web">
                                    {{ $infos->first()->url }}</div>
                            </div>
                        </div>



                        @if($content->first()!=null)
                            @php
                                $contentOne= str_replace("Vcity$", $infos->first()->city ,$content->first()->content);
                            @endphp

                            {!! $contentOne !!}
                        @endif

                    </section>

                    {{-- content 1 ends --}}




                    <br><br>

                    {{-- content 2 starts --}}
                    <section>
                        <div class="cities-tabs">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="#inf2" data-toggle="tab" href="#info2" role="tab"
                                        aria-controls="info2" aria-selected="true">More Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="#email2" data-toggle="tab" href="#email2" role="tab"
                                        aria-controls="email2" aria-selected="false">Email</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="#phone2" data-toggle="tab" href="#phone2" role="tab"
                                        aria-controls="phone2" aria-selected="false">Phone</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="#web2" data-toggle="tab" href="#web2" role="tab"
                                        aria-controls="web2" aria-selected="false">Website</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="info2" role="tabpanel"
                                    aria-labelledby="info2">
                                    {{ $infos->first()->moreinfo }}
                                </div>
                                <div class="tab-pane fade" id="email2" role="tabpanel" aria-labelledby="email2">
                                    {{ $infos->first()->email }}</div>
                                <div class="tab-pane fade" id="phone2" role="tabpanel" aria-labelledby="phone2">
                                    {{ $infos->first()->phone }}</div>
                                <div class="tab-pane fade" id="web2" role="tabpanel" aria-labelledby="web2">
                                    {{ $infos->first()->url }}</div>
                            </div>
                        </div>
                        <h2>Second Content Will be scraped</h2>
                    </section>
                    {{-- content 2 ends --}}




                    <br><br>


                    {{-- content 3 starts --}}
                    <section>
                        <div class="cities-tabs">
                            <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="#inf3" data-toggle="tab" href="#info3" role="tab"
                                        aria-controls="info3" aria-selected="true">More Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="#email3" data-toggle="tab" href="#email3" role="tab"
                                        aria-controls="email3" aria-selected="false">Email</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="#phone3" data-toggle="tab" href="#phone3" role="tab"
                                        aria-controls="phone3" aria-selected="false">Phone</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="#web3" data-toggle="tab" href="#web3" role="tab"
                                        aria-controls="web3" aria-selected="false">Website</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent3">
                                <div class="tab-pane fade show active" id="info3" role="tabpanel"
                                    aria-labelledby="info3">
                                    {{ $infos->first()->moreinfo }}
                                </div>
                                <div class="tab-pane fade" id="email3" role="tabpanel" aria-labelledby="email3">
                                    {{ $infos->first()->email }}</div>
                                <div class="tab-pane fade" id="phone3" role="tabpanel" aria-labelledby="phone3">
                                    {{ $infos->first()->phone }}</div>
                                <div class="tab-pane fade" id="web3" role="tabpanel" aria-labelledby="web3">
                                    {{ $infos->first()->url }}</div>
                            </div>
                        </div>

                        @if($content->first()!=null)
                            @php
                                $contentThird= str_replace("Vcity$", $infos->first()->city
                                ,$content->first()->content_third);

                            @endphp
                            {!! $contentThird !!}
                        @endif


                    </section>
                    {{-- content 3 ends --}}



                    <br><br>


                    <div class="cities-tabs">
                        <ul class="nav nav-tabs" id="myTab4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="#info4" data-toggle="tab" href="#info4" role="tab"
                                    aria-controls="info4" aria-selected="true">More Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="#email4" data-toggle="tab" href="#email4" role="tab"
                                    aria-controls="email4" aria-selected="false">Email</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="#phone4" data-toggle="tab" href="#phone4" role="tab"
                                    aria-controls="phone4" aria-selected="false">Phone</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="#web4" data-toggle="tab" href="#web4" role="tab"
                                    aria-controls="web4" aria-selected="false">Website</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent4">
                            <div class="tab-pane fade show active" id="info4" role="tabpanel" aria-labelledby="info4">
                                {{ $infos->first()->moreinfo }}
                            </div>
                            <div class="tab-pane fade" id="email4" role="tabpanel" aria-labelledby="email4">
                                {{ $infos->first()->email }}</div>
                            <div class="tab-pane fade" id="phone4" role="tabpanel" aria-labelledby="phone4">
                                {{ $infos->first()->phone }}</div>
                            <div class="tab-pane fade" id="web4" role="tabpanel" aria-labelledby="web4">
                                {{ $infos->first()->url }}</div>
                        </div>
                    </div>


                    <h2 class="pb-3 text-center">Find us in: </h2>

                    <div style="width: 100%; height: 450px" id="mapContainer">
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
