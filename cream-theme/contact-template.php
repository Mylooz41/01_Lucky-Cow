<?php
/*
 *  Template Name: Contact Template
 */

/* Include Header */
get_header();

/* Include Banner */
get_template_part('banners/default-banner');

?>

    <!-- start of page content -->
    <div class="page-content container">

        <?php
        if (have_posts()):
            while (have_posts()):
                the_post();
                $content = get_the_content();
                if (!empty($content)) {
                    ?>
                    <div class="row">
                        <div class="main col-xs-12" role="main">
                            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
                                <div class="entry-content post-content-wrapper clearfix">
                                    <?php
                                    /* output page contents */
                                    the_content();
                                    ?>
                                </div>
                            </article>
                        </div>
                    </div>
                    <?php
                }
            endwhile;
        endif;

        global $theme_options;

            ?>
            <div class="row">
                <?php
                if ( $theme_options['display_contact_form'] && is_email( $theme_options['contact_email'] ) ) {
                    /* related php function to handle ajax request reside in include/contact_form_handler.php */
                    ?>
                    <div class="main col-md-9" role="main">
                        <section id="contact-form">
                            <?php
                            if( !empty($theme_options['contact_form_title']) ){
                                ?><h2 class="form-heading"><?php echo $theme_options['contact_form_title']; ?></h2><?php
                            }
                            ?>
                            <form class="contact-form clearfix" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post">
                                <div class="row">
                                    <p class="group">
                                        <label for="name"><?php _e('Name', 'framework'); ?></label>
                                        <input type="text" name="name" id="name" class="required" title="<?php _e('* Please provide your name', 'framework'); ?>" />
                                    </p>
                                    <p class="group">
                                        <label for="phonenumber"><?php _e('Phone Number', 'framework'); ?></label>
                                        <input type="text" name="phonenumber" id="phonenumber" class="phone digits" title="<?php _e('* Please provide a phone number', 'framework'); ?>" />
                                    </p>
                                    <p class="group">
                                        <label for="email"><?php _e('Email Address', 'framework'); ?></label>
                                        <input type="text" name="email" id="email" class="email required" title="<?php _e('* Please provide an email address', 'framework'); ?>" />
                                    </p>
                                </div>

                                <div class="row">
                                    <p class="group">
                                        <label for="typeofevent"><?php _e('Type of Event', 'framework'); ?></label>
                                        <select  class="required" name="typeofevent" id="typeofevent" title="<?php _e('* Please provide a type of event', 'framework'); ?>">
                                            <option value="">Select...</option>
                                            <option value="Wedding">Wedding</option>
                                            <option value="Corporate Event">Corporate Event</option>
                                            <option value="Other">Other (please specify in additional info)</option> 
                                        </select>
                                    </p>

                                    <p class="group">
                                        <label for="numberofguests"><?php _e('Number of Guests', 'framework'); ?></label>
                                        <select  class="required" name="numberofguests" id="numberofguests" title="<?php _e('* Please provide a number of guests', 'framework'); ?>">
                                            <option value="">Select...</option>
                                            <option value="0-100">0-100</option>
                                            <option value="100-200">100-200</option>
                                            <option value="200-300">200-300</option> 
                                            <option value="300+">300+ (please specify in additional info)</option> 
                                        </select>
                                    </p>

                                    <p class="group">
                                        <label for="location"><?php _e('Location of Event', 'framework'); ?></label>
                                        <input type="text" name="location" id="location" class="required" title="<?php _e('* Please provide a location', 'framework'); ?>" />
                                    </p>

                                    <p class="group">
                                        <label for="date"><?php _e('Date of Event', 'framework'); ?></label>
                                        <input type="datetime-local" id="date" name="date" class="required" value="2019-01-01" min="2019-01-01"  title="<?php _e('* Please provide a date', 'framework'); ?>" />
                                    </p>

                                    <p class="group">
                                        <label for="hours"><?php _e('How many hours will you need us?', 'framework'); ?></label>
                                        <input type="number" name="hours" id="hours" min="1" max="48" class="required" title="<?php _e('* Please provide how many hours you will need us', 'framework'); ?>" />
                                    </p>
                                    
                                </div>

                                <p>
                                    <label for="message"><?php _e('Special Requests/Additional Info', 'framework'); ?></label>
                                    <textarea name="message" id="message" class="required" cols="30" rows="5" title="<?php _e('* Please provide your message', 'framework'); ?>"></textarea>
                                    <br/>
                                    <em><?php _e('All HTML tags will be removed.', 'framework'); ?></em>
                                </p>
                                <p>
                                    <input type="hidden" name="action" value="send_message"/>
                                    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('send_message_nonce'); ?>"/>
                                    <input type="submit" value="<?php _e('SUBMIT', 'framework'); ?>" id="submit" name="submit">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif" id="contact-loader" alt="Loading...">
                                </p>
                            </form>
                            <div class="error-container"></div>
                            <div id="message-sent"></div>
                        </section>
                    </div>
                    <?php
                }

                if ( $theme_options['display_contact_details'] ) {
                    ?>
                    <!-- start of sidebar -->
                    <aside class="sidebar col-md-3" role="complementary">
                        <section class="widget  contact-details-widget">
                            <?php
                            if( !empty($theme_options['contact_details_title']) ){
                                ?><h3 class="title"><?php echo $theme_options['contact_details_title']; ?></h3><?php
                            }
                            ?>
                            <div class="wrapper">
                                <?php
                                if( !empty($theme_options['contact_address']) ){
                                    ?><address><i class="fa fa-map-marker"></i><?php echo $theme_options['contact_address']; ?></address><?php
                                }
                                ?>
                                <div class="phone-numbers">
                                    <?php
                                    if( !empty($theme_options['contact_phone_01']) ){
                                        ?><span><i class="fa fa-phone"></i><?php echo $theme_options['contact_phone_01']; ?></span><?php
                                    }
                                    if( !empty($theme_options['contact_phone_02']) ){
                                        ?><span><i class="fa fa-phone"></i><?php echo $theme_options['contact_phone_02']; ?></span><?php
                                    }
                                    if( !empty($theme_options['contact_fax']) ){
                                        ?><span><i class="fa fa-fax"></i><?php echo $theme_options['contact_fax']; ?></span><?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </section>
                    </aside>
                    <!-- end of sidebar -->
                    <?php
                }
                ?>
            </div>

    </div><!-- end of page content -->
    <?php

    if ( $theme_options['display_google_map'] ) {
        ?><div id="map-canvas"></div><?php
        /* Contact map related JavaScript code reside in functions.php in function named generate_dynamic_javascript */
    }


get_footer();

?>