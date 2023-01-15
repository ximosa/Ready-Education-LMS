<?php
/**
 * Top Bar / Content
 *
 * @package edukul
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get top content
$phone = edukul_get_mod( 'top_bar_content_phone', '(+1) 212-946-2707' );
$email = edukul_get_mod( 'top_bar_content_email', 'info@Edukul.com' );
$address = edukul_get_mod( 'top_bar_content_address', '112 W 34th St, New York' );
?>

<div class="top-bar-content">
    <?php
    // Top content
    if ( $phone ) : ?>
        <span class="phone content">
            <?php echo do_shortcode( $phone ); ?>
        </span>
    <?php endif;

    if ( $email ) : ?>
        <span class="email content">
            <?php echo do_shortcode( $email ); ?>
        </span>
    <?php endif;

    if ( $address ) : ?>
        <span class="address content">
            <?php echo do_shortcode( $address ); ?>
        </span>
    <?php endif; ?>
</div><!-- /.top-bar-content -->

