<?php
/**
 * Renders each membership in the [memberships_page] shortcode.
 *
 * @version 1.1.0
 */

$obj_memberships = Edr_Memberships::get_instance();
$membership_id = get_the_ID();
$classes = apply_filters( 'edr_membership_classes', array( 'edr-membership' ) );
?>
<article id="membership-<?php the_ID(); ?>" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="edr-membership-wrapper">
		<div class="edr-membership__header">
			<h2 class="edr-membership__title">
				<?php the_title(); ?>					
			</h2>
			<div class="edr-membership__price"><?php echo edr_get_the_membership_price( $membership_id ); ?></div>
		</div>

	    <div class="edr-membership__content clearfix">    	
            <div class="entry-description"><?php the_content(); ?></div>
			<div class="edr-membership__footer">
				<?php 
				$obj_memberships = Edr_Memberships::get_instance();
				$payment_url = $obj_memberships->get_payment_url( $membership_id );

				echo '<div class="button-wrap icon-right"><a href="'. esc_url( $payment_url ) .'" class="edukul-button medium icon_style_1"><span style="">'. esc_html__( 'CHOOSE PLAN', 'edukul' ) .'</span></a></div>';
				?>
			</div>
		</div>
	</div>
</article>