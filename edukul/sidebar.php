<?php
// Get layout position
$layout = edukul_layout_position();
if ( $layout == 'no-sidebar' ) return;

$sidebar = 'sidebar-blog';

if ( is_page() ) $sidebar = 'sidebar-page';

if ( is_page() && edukul_metabox('page_sidebar') )
	$sidebar = edukul_metabox('page_sidebar');

if ( edukul_is_woocommerce_page() )
	$sidebar = 'sidebar-shop';

if ( is_active_sidebar( $sidebar ) ) : ?>

<div id="sidebar">
	<div id="inner-sidebar" class="inner-content-wrap">
		<?php dynamic_sidebar( $sidebar ); ?>
	</div><!-- /#inner-sidebar -->
</div><!-- /#sidebar -->

<?php endif; ?>