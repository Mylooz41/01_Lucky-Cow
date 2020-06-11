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
                        <p>Based in London, and covering the South East of England, Lucky Cow is a small family run business who always focus on great customer service and the best quality products.</p>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <h2 class="section-title">What we do</h2>
                        <p>We offer a substantial range of superb quality ice cream made from organic milk and cones at really competitive prices.</p>
                        <p>Because we are a small family-run business we have a great attention to detail. You can be assured of a truly personalised and bespoke service that will compliment your event beautifully.</p>
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
                                <p class="quote"><q>Lucky Cow were amazing. Mark was brilliant and we couldn't fault them at all.
Perfect service and the ice cream was unreal!!</q></p>
                                <p class="author">Joshua C, September 2019</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="testimonial-box">
                            <div class="testimonial-content">
                                <p class="quote"><q>Mark from Lucky Cow was fantastic from start to finish. Great communication and good value for money compared to other similar suppliers. He fitted in perfectly at our drinks reception for our sunny wedding at Wotton House on 18th August. He was a genuine lovely guy and I’m glad that we got to enjoy a chat and an ice-cream with you Mark during our busy big day.</q></p>
                                <p class="author">Emma F, August 2019</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="testimonial-box">
                            <div class="testimonial-content">
                                <p class="quote"><q>Mark was nothing but professional from start to finish. The service was slick - in setting up and the delivery to our guests. The ice cream was of high quality and there was a great selection available. We would highly recommend Lucky Cow for any event. Thank You Mark!</q></p>
                                <p class="author">Lisa H, July 2019</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            <!-- <div class="section-disclaimers">
                <div class="row">
                    <div class="col-md-12">
                        <p>** We guarantee to beat any like for like quote from another supplier for our services, subject to terms and conditions</p>
                    </div>
                </div>
            </div> -->

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


