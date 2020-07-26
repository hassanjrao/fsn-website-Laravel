@extends('layouts.master')

@section('title')
Motorcycle Sale
@endsection

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <section>
                    {!!$content->first()->content ?? "" !!}
                </section>
            </div>
            <div class="col-lg-12 mb-5">

                <div class="services-links">

                    <h3 class="text-center mb-4">Motorcycle Sale Services in</h3>

                    <?php
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


                    ?>

                    <div class="row servc-links">

                        <div class="col-lg-3 col-md-3 col-sm-6">

                            <ul>
                                <?php

                                for ($x = 0; $x < 5; $x++) {
                                    $i = $n[$x];

                                    $city = $cities[$i];
                                    

                                    $done_cities[$z] = $city;
                                    $z++;


                                    $ct = strtolower(preg_replace('/\s+/', '-', $city));
                                    
                                ?>
                                <li><a href="{{ route("motorcycle-sale-city","$ct")}}"><?php echo ucwords($city) ?></a>
                                </li>

                                <?php
                                }


                                ?>


                            </ul>

                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6">

                            <ul>

                                <?php

                                $left = array_diff($cities, $done_cities);
                                $leftCities = array_values($left);

                                

                                $totalLeftCities = count($leftCities);

                                $n = range(0, $totalLeftCities - 1);
                                shuffle($n);

                                for ($x = 0; $x < 5; $x++) {
                                    $i = $n[$x];

                                    $city = $leftCities[$i];
                                    $done_cities[$z] = $city;

                                    
                                    $z++;

                                    $ct = strtolower(preg_replace('/\s+/', '-', $city));
                                    
                                ?>
                                <li><a href="{{ route("motorcycle-sale-city","$ct")}}"><?php echo ucwords($city) ?></a>
                                </li>


                                <?php }
                               
                                ?>

                            </ul>


                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6">

                            <ul>

                                <?php

                                $left = array_diff($cities, $done_cities);

                                $leftCities = array_values($left);

                                

                                $totalLeftCities = count($leftCities);

                                $n = range(0, $totalLeftCities - 1);
                                shuffle($n);

                                for ($x = 0; $x < 5; $x++) {
                                    $i = $n[$x];

                                    $city = $leftCities[$i];
                                    $done_cities[$z] = $city;


                                    
                                    $z++;


                                    $ct = strtolower(preg_replace('/\s+/', '-', $city));
                                    
                                ?>
                                <li><a href="{{ route("motorcycle-sale-city","$ct")}}"><?php echo ucwords($city); ?></a>
                                </li>

                                <?php }
                                
                                ?>

                            </ul>

                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <ul>

                                <?php

                                $left = array_diff($cities, $done_cities);

                                $leftCities = array_values($left);



                                $totalLeftCities = count($leftCities);

                                $n = range(0, $totalLeftCities - 1);
                                shuffle($n);

                                for ($x = 0; $x < 5; $x++) {
                                    $i = $n[$x];

                                    $city = $leftCities[$i];
                                    $done_cities[$z] = $city;


                                  
                                    $z++;


                                    $ct = strtolower(preg_replace('/\s+/', '-', $city));
                                  
                                ?>
                                <li><a href="{{ route("motorcycle-sale-city","$ct")}}"><?php echo ucwords($city); ?></a>
                                </li>

                                <?php }

                                $left = array_diff($cities, $done_cities);

                                $leftCities = array_values($left);

                                $totalLeftCities = count($leftCities);

                                $n = range(0, $totalLeftCities - 1);
                                shuffle($n);
                              
                                ?>

                            </ul>


                        </div>
                    </div>

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