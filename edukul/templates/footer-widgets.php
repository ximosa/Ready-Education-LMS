<?php
/**
 * Footer Widgets
 *
 * @package edukul
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Exit if disabled via Customizer or Metabox
if ( ! edukul_get_mod( 'footer_widgets', true ) || ( is_page() && edukul_metabox('hide_footer') ) )
	return false;

// Get options
$classes = $css = '';
$columns = edukul_get_mod( 'footer_columns', '4' );
$gutter = edukul_get_mod( 'footer_column_gutter', '30' );
$grid_cls1 = $grid_cls2 = $grid_cls3 = $grid_cls4 = 'span_1_of_'. $columns;
$classes .= ' gutter-'. $gutter;

if ( is_page() && $footer_bg = edukul_metabox('footer_bg') )
	$css = 'background-color:'. $footer_bg .';';

if ( is_active_sidebar( 'sidebar-footer-1' ) ||
	is_active_sidebar( 'sidebar-footer-2' ) ||
	is_active_sidebar( 'sidebar-footer-3' ) ||
	is_active_sidebar( 'sidebar-footer-4' ) ) :
?>
<footer id="footer" style="<?php echo esc_attr( $css ); ?>">
	<div id="footer-widgets" class="edukul-container">
		<div class="footer-grid <?php echo esc_attr( $classes ); ?>">
			<?php
			// Footer widget 1 ?>
			<div class="<?php echo esc_attr( $grid_cls1 ); ?> col">
				<?php if ( is_active_sidebar( 'sidebar-footer-1' ) ) dynamic_sidebar( 'sidebar-footer-1' ); ?>
			</div>

			<?php
			// Footer widget 2
			if ( $columns > '1' ) : ?>
				<div class="<?php echo esc_attr( $grid_cls2 ); ?> col">
					<?php if ( is_active_sidebar( 'sidebar-footer-2' ) ) dynamic_sidebar( 'sidebar-footer-2' ); ?>
				</div>
			<?php endif; ?>
			
			<?php
			// Footer widget 3
			if ( $columns > '2' ) : ?>
				<div class="<?php echo esc_attr( $grid_cls3 ); ?> col">
					<?php if ( is_active_sidebar( 'sidebar-footer-3' ) ) dynamic_sidebar( 'sidebar-footer-3' ); ?>
				</div>
			<?php endif; ?>

			<?php
			// Footer widget 4
			if ( $columns > '3' ) : ?>
				<div class="<?php echo esc_attr( $grid_cls4 ); ?> col">
					<?php if ( is_active_sidebar( 'sidebar-footer-4' ) ) dynamic_sidebar( 'sidebar-footer-4' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</footer>
<?php endif; ?>