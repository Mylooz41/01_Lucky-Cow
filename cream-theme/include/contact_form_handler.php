<?php
/**
 * File Name: contact_form_handler.php
 *
 * Send message function to process contact form submission
 *
 */

add_action('wp_ajax_nopriv_send_message', 'send_message');
add_action('wp_ajax_send_message', 'send_message');

if (!function_exists('send_message')) {
    function send_message(){


        if ( isset( $_POST['email'] ) ):

            /* Verify Nonce */
            $nonce = $_POST['nonce'];
            if (!wp_verify_nonce($nonce, 'send_message_nonce'))
                die (__('Busted!', 'framework'));

            global $theme_options;

            /* Sanitize and Validate Target email address that will be configured from theme options */
            $to_email = sanitize_email( $theme_options['contact_email'] );
            $to_email = is_email( $to_email );
            if ( ! $to_email ) {
                die ( __( 'Target Email address is not properly configured!', 'framework' ) );
            }

            /* Sanitize and Validate contact form input data */
            $from_name = sanitize_text_field($_POST['name']);
            $phone_number = sanitize_text_field($_POST['phonenumber']);
            $from_email = sanitize_text_field($_POST['email']);
            $type_event = stripslashes($_POST['typeofevent']);
            $number_guests = stripslashes($_POST['numberofguests']);
            $location = stripslashes($_POST['location']);
            $date = stripslashes($_POST['date']);
            $hours = stripslashes($_POST['hours']);
            $message = stripslashes( $_POST['message'] );

            $from_email = is_email($from_email);


            if (!$from_email) {
                die (__('Provided Email address is invalid!', 'framework'));
            }

            $email_subject = __('New message sent by', 'framework') . ' ' . $from_name . ' ' . __('using contact form at', 'framework') . ' ' . get_bloginfo('name');

            $email_body = __("You have received a message from: ", 'framework') . $from_name . " <br/>";

            if (!empty($phone_number)) {
                $email_body .= __("Phone Number : ", 'framework') . $phone_number . " <br/>";
            }
            if (!empty($type_event)) {
                $email_body .= __("Type of Event : ", 'framework') . $type_event . " <br/>";
            }
            if (!empty($number_guests)) {
                $email_body .= __("Number of Guests : ", 'framework') . $number_guests . " <br/>";
            }
            if (!empty($location)) {
                $email_body .= __("Location : ", 'framework') . $location . " <br/>";
            }

            if (!empty($date)) {
                $email_body .= __("Date : ", 'framework') . $date . " <br/>";
            }
            if (!empty($hours)) {
                $email_body .= __("Hours : ", 'framework') . $hours . " <br/>";
            }

            $email_body .= __("Their additional message is as follows.", 'framework') . " <br/>";
            $email_body .= wpautop( $message ) . " <br/>";
            $email_body .= __("You can contact ", 'framework') . $from_name . __(" via email, ", 'framework') . $from_email;

            $header = 'Content-type: text/html; charset=utf-8' . "\r\n";
            $header = apply_filters("inspiry_contact_mail_header", $header);
            $header .= 'From: ' . $from_name . " <" . $from_email . "> \r\n";

            if ( mail( $to_email, $email_subject, $email_body, $header ) ) {
                _e( "Message Sent Successfully!", 'framework' );
            } else {
                _e( "Server Error: WordPress mail method failed!", 'framework' );
            }

        else:
            _e("Invalid Request !", 'framework');
        endif;

        die;
    }
}

?>