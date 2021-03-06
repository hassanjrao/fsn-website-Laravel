<!-- Footer Section Begin -->

<footer class="footer">

    <div class="container">



        <div class="row">


            <div class="col-lg-5 my-auto">

                <div class="row">




                    <div class="col-lg-6 col-sm-6 col-xs-6 border border-top-0 border-left-0">


                        <div class="footer__widget ">
                            <p class="mb-1">Cars for sale in: </p>
                            <ul>
                                <?php

                                for ($x = 0; $x < 5; $x++) {
                                    $i = $n[$x];

                                    $city = $cities[$i];


                                    $done_cities[$z] = $city;
                                    $z++;


                                    $ct = strtolower(preg_replace('/\s+/', '-', $city));

                                ?>
                                <li><a
                                        href="{{ route("cars-for-sale-city","$ct") }}"><?php echo ucwords($city) ?></a>
                                </li>

                                <?php
                                }


                                ?>


                            </ul>
                        </div>


                    </div>

                    <div class="col-lg-6 col-sm-6 col-xs-6 border border-top-0 border-left-0">

                        <div class="footer__widget">

                            <p class="mb-1">CarGurus in:</p>
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
                                <li><a
                                        href="{{ route("car-gurus-city","$ct") }}"><?php echo ucwords($city); ?></a>
                                </li>

                                <?php }

                                ?>

                            </ul>
                        </div>

                    </div>


                </div>

                <div class="row">

                    <div class="col-lg-6 col-sm-6 col-xs-6 border border-top-0 border-left-0 border-bottom-0">
                        <div class="footer__widget">

                            <p class="mb-1 mt-4">CarGurus used cars in: </p>
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
                                <li><a
                                        href="{{ route("car-gurus-used-cars-city","$ct") }}"><?php echo ucwords($city); ?></a>
                                </li>

                                <?php }

                                ?>

                            </ul>

                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-xs-6 border border-top-0 border-left-0 border-bottom-0">


                        <div class="footer__widget">

                            <p class="mb-1 mt-4">Autozone in: </p>
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
                                <li><a
                                        href="{{ route("autozone-city","$ct") }}"><?php echo ucwords($city); ?></a>
                                </li>

                                <?php }

                                


                                $left = array_diff($cities, $done_cities);

                                $leftCities = array_values($left);

                                

                                $totalLeftCities = count($leftCities);

                                for ($x = 0; $x < $totalLeftCities; $x++) {

                                    $city = $leftCities[$x];
                         
                                    $ct = preg_replace('/\s+/', '-', $city);
                                    
                                }


                                ?>

                            </ul>
                        </div>


                    </div>



                </div>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 mt-4">
                <div class="footer__widget">
                    <p class="mb-1 mt-1">Blogs: </p>
                    <ul>
                        @php
                            $i=rand(0,count($cities)-1);
                        @endphp
                        @foreach($titles as $title)

                            @php
                                
                                $titl=str_replace("Vcity$", $cities[$i],$title->title);
                               
                                $t= strtolower(preg_replace('/\s+/', '-', $titl));
                            
                            @endphp

                            <li><a class="pt-1"
                                    href="{{ route("blog",[$t,$title->id]) }}">{{ ucwords($titl) }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>

            </div>



            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__about">
                    <form id="captcha-form">
                        <input id="f-name" type="text" class="form-control" placeholder="Name" name="name" required="">
                        <input id="f-email" type="email" class="form-control" placeholder="Email" name="email"
                            required="">
                        <input id="f-mob" type="number" class="form-control" placeholder="Mobile" name="mobile"
                            required="">
                        <input id="f-city" type="text" class="form-control" placeholder="City" name="city" required="">
                        <input id="f-sub" type="text" class="form-control" placeholder="Subject" name="subject"
                            required="">
                        <textarea id="f-comm" class="form-control" placeholder="Comment" name="comment"
                            required=""></textarea>


                        <div class="g-recaptcha" data-sitekey="6Lc9cK4ZAAAAAL9lf7JyxcIrmhVOxr8eAB8-8ljg"
                            data-callback="enable_submit_btn" data-expired-callback="disable_submit_btn"></div>

                        <br>

                        <div id="success-f"> </div>
                        <button type="button" disabled="disabled" id="enquiry-submit-f" name="submit"
                            class="btn mt-1">Submit</button>

                    </form>
                </div>


            </div>
        </div>



        <div class="row footer__copyright">

            <div class="col-lg-4 col-md-4 my-auto">
                <a href="index.php" style="font-size:x-large; font-style:bolder; color:black;">
                    <img src="{{asset('images/logo.png')}}" alt="logo" width="150px" height="50px"></a>
            </div>

            <div class="col-lg-4 col-md-4 text-center my-auto">
                <div class="footer__pages">
                    <a href="{{ route("disclaimer") }}">Disclaimer</a>
                    <a href="{{ route("tos") }}">TOS</a>
                    <a href="{{ route("privacy-policy") }}">Privacy Policy</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 my-auto ">
                <div class="footer__widget__social">
                    <a href="www.fb.com"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter-square"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>


        </div>

    </div>
</footer>


<!-- Footer Section End -->

<script type="text/javascript">
    function enable_submit_btn() {
        document.getElementById("enquiry-submit-f").disabled = false;
    };

    function disable_submit_btn() {

        document.getElementById("enquiry-submit-f").disabled = true;

    };

</script>
