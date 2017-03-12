<?php
/*
 *  Template Name: FAQs Template
 */

/* Include Header */
get_header();

/* Include Banner */
get_template_part('banners/default-banner');
?>


<!-- start of page content -->
<div class="page-content container">

    <div class="row">

        <div class="main col-md-12 col-lg-12" role="main">

            <div class="row">
                <!-- Filter -->
                <div class="col-xs-12">
                    <ul id="filters">
                        <li class="active"><a class="no-isotope" href="#" data-filter="*"><?php _e('All FAQs', 'framework') ?></a></li><?php
                        $args = array(
                            'orderby' => 'name',
                            'order' => 'ASC',
                            'hide_empty' => true,
                        );
                        $tax_terms = get_terms('faq-group', $args);
                        if (!empty($tax_terms)) {
                            foreach ($tax_terms as $term) {
                                echo '<li><a class="no-isotope" href="' . get_term_link($term->slug, $term->taxonomy) . '" data-filter=".' . $term->slug . '">' . $term->name . '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <?php
                    $faq_args = array(
                        'post_type' => 'faq',
                        'posts_per_page' => -1,
                    );

                    // The Query
                    $faq_query = new WP_Query( $faq_args );

                    // The Loop
                    if ( $faq_query->have_posts() ) {

                        echo '<dl class="toggle faqs">';

                        while ( $faq_query->have_posts() ) {

                            $faq_query->the_post();

                            /* faq group terms slug needed to be used as classes in html for isotope functionality */
                            $faq_group_terms = get_the_terms($post->ID, 'faq-group');
                            if (!empty($faq_group_terms)) {
                                $faq_group_terms_slugs = '';
                                foreach ($faq_group_terms as $term) {
                                    if (!empty($faq_group_terms_slugs))
                                        $faq_group_terms_slugs .= ' ';

                                    $faq_group_terms_slugs .= $term->slug;
                                }
                            }

                            ?>
                            <dt class="<?php echo $faq_group_terms_slugs; ?>"><i class="fa fa-question"></i><?php the_title(); ?></dt>
                            <dd class="<?php echo $faq_group_terms_slugs; ?>"><?php the_content(); ?></dd>
                            <?php
                        }

                        echo '</dl>';

                    } else {
                        nothing_found( __('No FAQ found!', 'framework') );
                    }

                    /* Restore original Post Data */
                    wp_reset_query();

                    ?>
                </div>
            </div>

        </div>

    </div>

</div><!-- end of page content -->


<?php get_footer(); ?>
