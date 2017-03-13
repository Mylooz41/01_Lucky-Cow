<?php
global $theme_options;
?>
<section class="home-services-section clearfix">

    <?php
    if ( $theme_options['display_curve'] == '1' && $theme_options['display_slider_on_home'] == '1' && $theme_options['slider_type'] == '1' ) {
        ?><div class="curve"></div><?php
    }
    ?>

    <div class="section-top">

        <div class="container">
            <div class="section-aboutus">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <h2 class="section-title">Who we are</h2>
                        <p>Based in London, and covering the South East of England, Lucky cow is a small family run business who always focus on great customer service and the best quality products.</p>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <h2 class="section-title">What we do</h2>
                        <p>We offer a substantial range of superb quality ice cream made from organic milk and cones at extremely competitive prices (see our price promise for further details**)</p>
                        <p>Because of our size we have a great attention to detail. You can be assured of a truly personalised and bespoke service that will compliment your event beautifully.</p>
                        <p>We also offer dairy free, gluten free and diabetic options, as well as gluten free cones, organic topping sauces and chocolate so everyone can enjoy Lucky Cow!</p>
                    </div>
                </div>
            </div>

            <div class="section-testimonials">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="section-title">Testimonials</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="testimonial-box">
                            <div class="testimonial-content">
                                <p class="quote"><q>Lucky Cow served ice cream at our charity event and were absolutely fantastic! 
            Amazing ice cream, wonderful service and just generally really awesome! Thank you! :)</q></p>
                                <p class="author">Kasia, October 2016</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="testimonial-box">
                            <div class="testimonial-content">
                                <p class="quote"><q>I was recently at an event that Lucky Cow attended and the ice cream 
    was delicious, and served with a smile, would highly recommend!</q></p>
                                <p class="author">Rachel, October 2016</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="testimonial-box">
                            <div class="testimonial-content">
                                <p class="quote"><q>Lucky Cow attended our work Summer party and as part of the committee that booked it I can't thank them enough for their excellent service and delicious desserts- the best we've had to date! They were also extremely competitive and cheaper than other suppliers who were offering frankly inferior products. We have already booked them again for next year!</q></p>
                                <p class="author">Sarah, February 2017</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="section-disclaimers">
                <div class="row">
                    <div class="col-md-12">
                        <p>** We guarantee to beat any like for like quote from another supplier for our services, subject to terms and conditions</p>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="section-bottom">

        <div class="container">

            <div class="row">

                <?php
                $home_features = $theme_options['home_features'];

                if (!empty($home_features)) {
                    $loop_counter = 0;
                    $features_count = count ( $home_features );
                    $features_col_count = inspiry_col_count( $features_count );
                    $feature_col_classes = inspiry_col_classes( $features_col_count );
                    foreach ($home_features as $feature) {
                        ?>
                        <article class="service <?php echo $feature_col_classes?> <?php echo inspiry_col_animation_class( $features_col_count, $loop_counter ) .' '. inspiry_animation_class(); ?>">
                            <?php
                            if( !empty($feature['image']) ) {
                                ?>
                                <div class="img-frame">
                                    <figure>
                                        <?php
                                        if( !empty($feature['url']) ) {
                                            echo '<a href="'.$feature['url'].'" title="'.$feature['title'].'">';
                                            echo '<img src="'. $feature['image'] .'" alt="'.$feature['title'].'"/>';
                                            echo '</a>';
                                        }else{
                                            echo '<img src="'. $feature['image'] .'" alt="'.$feature['title'].'"/>';
                                        }
                                        ?>
                                    </figure>
                                </div>
                                <?php
                            }

                            if( !empty( $feature['title'] ) ){
                                if( !empty( $feature['url'] ) ){
                                    echo '<h3><a href="'.$feature['url'].'" title="'.$feature['title'].'">'.$feature['title'].'</a></h3>';
                                }else{
                                    echo '<h3>'.$feature['title'].'</h3>';
                                }
                            }

                            if( !empty( $feature['description'] ) ){
                                echo '<p>'.$feature['description'].'</p>';
                            }
                            ?>
                        </article>
                        <?php
                        $loop_counter++;
                        inspiry_col_clearfix( $features_col_count, $loop_counter );
                    }
                }
                ?>

            </div>

        </div>

    </div>

</section>


