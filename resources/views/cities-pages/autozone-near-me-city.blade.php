@extends('layouts.master')


@section('title')
Autozone near me in {{ $infos->city }}
@endsection



@section('content')



<main class="pt-2">
    <div class="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">



                    @if($content!=null)
                        @php
                            $h1= str_replace("Vcity$", $infos->city
                            ,$content->heading);

                        @endphp
                        <h1>{{ $h1 }}</h1>

                    @endif





                    {{-- content 1 starts --}}

                    <section>
                        <div class="cities-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="#info" data-toggle="tab" href="#info" role="tab"
                                        aria-controls="info" aria-selected="true">About {{ $infos->city }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="#email" data-toggle="tab" href="#email" role="tab"
                                        aria-controls="email" aria-selected="false">{{ $infos->city }} Email</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="#phone" data-toggle="tab" href="#phone" role="tab"
                                        aria-controls="phone" aria-selected="false">{{ $infos->city }} Phone</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="#web" data-toggle="tab" href="#web" role="tab"
                                        aria-controls="web" aria-selected="false">{{ $infos->city }} Website</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info">
                                    {{ $infos->moreinfo }}</div>
                                <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email">
                                    {{ $infos->email }}
                                </div>
                                <div class="tab-pane fade" id="phone" role="tabpanel" aria-labelledby="phone">
                                    {{ $infos->phone }}</div>
                                <div class="tab-pane fade" id="web" role="tabpanel" aria-labelledby="web">
                                    {{ $infos->url }}</div>
                            </div>
                        </div>



                        @if($content!=null)
                            @php
                                $contentOne= str_replace("Vcity$", $infos->city ,$content->content);
                            @endphp

                            {!! $contentOne !!}
                        @endif

                        <a style="text-decoration:underline; color:#002868;" href={{route("cars-for-sale")}}>Click to read more...</a>


                    </section>

                    {{-- content 1 ends --}}




                    <br><br>

                    {{-- content 2 starts --}}
                    <section>
                        <div class="cities-tabs">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="#inf2" data-toggle="tab" href="#info2" role="tab"
                                        aria-controls="info2" aria-selected="true">About {{ $infos->city }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="#email2" data-toggle="tab" href="#email2" role="tab"
                                        aria-controls="email2" aria-selected="false">{{ $infos->city }} Email</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="#phone2" data-toggle="tab" href="#phone2" role="tab"
                                        aria-controls="phone2" aria-selected="false">{{ $infos->city }} Phone</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="#web2" data-toggle="tab" href="#web2" role="tab"
                                        aria-controls="web2" aria-selected="false">{{ $infos->city }} Website</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="info2" role="tabpanel"
                                    aria-labelledby="info2">
                                    {{ $infos->moreinfo }}
                                </div>
                                <div class="tab-pane fade" id="email2" role="tabpanel" aria-labelledby="email2">
                                    {{ $infos->email }}</div>
                                <div class="tab-pane fade" id="phone2" role="tabpanel" aria-labelledby="phone2">
                                    {{ $infos->phone }}</div>
                                <div class="tab-pane fade" id="web2" role="tabpanel" aria-labelledby="web2">
                                    {{ $infos->url }}</div>
                            </div>
                        </div>
                        <h2>About {{ $infos->city }}</h2>
                        <br>
                        <div>
                            @for($i = 0; $i < sizeof($content2); $i++)
                                <p>{!! $content2[$i] !!}</p>
                            @endfor
                        </div>



                        @if($news!=null)
                            <h3>{{ $infos->city }} News</h3>

                            <br>
                            @foreach($news["value"] as $new)
                                <div>
                                    <img src="{{ $new["image"]["thumbnail"] }}"
                                        alt="" width="350px" height="270px">

                                    <p>{!! $new["body"] !!}</p>

                                </div>
                            @endforeach
                        @endif
                    </section>
                    {{-- content 2 ends --}}




                    <br><br>


                    {{-- content 3 starts --}}
                    <section>

                        @if($content!=null)
                            @php
                                $contentThird= str_replace("Vcity$", $infos->city
                                ,$content->content_third);

                            @endphp
                            {!! $contentThird !!}
                        @endif
                       
                       
                        <div class="services-links">

                            <h3 class="text-center mb-4">{{ $infos->city }} Searches</h3>

                            <div class="row servc-links">  
                                             

                                <div class="col-lg-6 col-md-6 col-sm-6">

                                    <ul>

                                        @foreach($suggestions_one as $suggestion)



                                            <li>{!! ucwords($suggestion) !!}</li>


                                        @endforeach

                                    </ul>


                                </div>
                                <div class="col-lg-6  col-md-6 col-sm-6">

                                    <ul>

                                        @foreach($suggestions_two as $suggestion)



                                            <li>{!! ucwords($suggestion) !!}</li>


                                        @endforeach

                                    </ul>


                                </div>

                            </div>

                        </div>

                        <div class="services-links">

                            <h3 class="text-center mb-4">{{ $infos->city }} Typos</h3>
                            <div class="row servc-links"> 
                                <div class="col-lg-4 col-md-4 col-sm-4">

                                    <ul>                                 

                                        @if (count($typos)>10)

                                            @for ($i = 0; $i < count($typos); $i++)
                                            <li>{{ $typos[$i]}}</li>
                                                @if ($i==10)
                                                    <?php break; ?>
                                                 @endif
                                            @endfor

                                            @else
                                                @foreach ($typos as $typ)
                                                <li>{{ $typ}}</li>
                                                @endforeach
                                                                                      
                                        @endif                                    
                                       
                                    </ul>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">

                                    <ul>                                 

                                        @if (count($typos)>10)

                                            @for ($i = 10; $i < count($typos); $i++)
                                            <li>{{ $typos[$i]}}</li>

                                            @if ($i==20)
                                                <?php break; ?>
                                            @endif
                                            @endfor

                                           
                                                                                      
                                        @endif                                    
                                       
                                    </ul>

                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4">

                                    <ul>                                 

                                        @if (count($typos)>10)

                                            @for ($i = 30; $i < count($typos); $i++)
                                            <li>{{ $typos[$i]}}</li>
                                                @if ($i==40)
                                                    <?php break; ?>
                                                @endif
                                            @endfor
                                                                      
                                        @endif                                    
                                       
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <br>




                    </section>
                    {{-- content 3 ends --}}



                    <br><br>



                    <h2 class="pb-3 text-center">{{ $infos->city }} Map </h2>

                    <div class="text-center">
                        <img width="100%"
                            src="https://dev.virtualearth.net/REST/V1/Imagery/Map/Road/{{ $infos->city }}?mapSize=1000,400&format=png&key=AisLiQj-dlDXaBcoot9LEHP8GmPqNc5KjOrW0Em3sDviC311ziEHt2dK-1WDyoqZ"
                            alt="Bing Map of miami">

                    </div>

                    <br><br>



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
