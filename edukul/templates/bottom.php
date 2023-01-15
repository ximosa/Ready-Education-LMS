<?php
/**
 * Bottom Bar
 *
 * @package edukul
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Exit if disabled via Customizer
if ( ! edukul_get_mod( 'bottom_bar', true ) ) return false;

$css = edukul_element_bg_css('bottom_background_img');
$copyright = edukul_get_mod( 'bottom_copyright', '&copy; Edukul - Education WordPress Theme. All Rights Reserved.' );

if ( is_page() && $bottom_bg = edukul_metabox('bottom_bg') )
    $css .= 'background-color:'. $bottom_bg .';';
?>

<div id="bottom" style="<?php echo esc_attr( $css ); ?>" >
    <div class="edukul-container">
        <div class="bottom-bar-inner-wrap">
            <div class="bottom-bar-copyright">
                <?php
                if ( $copyright ) : ?>
                    <div id="copyright">
                        <?php printf( '%s', do_shortcode( $copyright ) ); ?>
                    </div>
                <?php endif; ?>
            </div><!-- /.bottom-bar-copyright -->
        </div>
    </div>
</div><!-- /#bottom -->