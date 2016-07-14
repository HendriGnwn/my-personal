<?php
/* @var $bioProfile app\models\BioProfile */
?>

<section id="employement">
    <div class="container">
        <div class="row">
            <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
                <h2>Employement</h2>
                <?= $bioProfile->employement_description ?>
            </div>
        </div>
        <div class="pricing-table">
            <div class="row">
                <div class="col-sm-6">
                    <div class="single-table wow flipInY" data-wow-duration="1000ms" data-wow-delay="1100ms">
                        <h3>2014 - 2015</h3>
                        <div class="price">
                            $49<span>/Month</span>
                        </div>
                        <ul>
                            <li>Free Setup</li>
                            <li>10GB Storage</li>
                            <li>100GB Bandwith</li>
                            <li>5 Products</li>
                        </ul>
                        <a href="#" class="btn btn-lg btn-primary">Sign up</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="single-table featured wow flipInY" data-wow-duration="1000ms" data-wow-delay="800ms">
                        <h3>2015 - Now</h3>
                        <div class="price">
                            $29<span>/Month</span>
                        </div>
                        <ul>
                            <li>Free Setup</li>
                            <li>10GB Storage</li>
                            <li>100GB Bandwith</li>
                            <li>5 Products</li>
                        </ul>
                        <a href="#" class="btn btn-lg btn-primary">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/#employement-->