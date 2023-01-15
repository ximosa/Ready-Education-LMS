<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$rating = intval( get_comment_meta( $comment->comment_ID, '_edukul_rating', true ) );

?>
<li itemprop="review" itemscope itemtype="//schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

	<div id="comment-<?php comment_ID(); ?>" class="comment_container">
		<div itemprop="reviewRating" itemscope itemtype="//schema.org/Rating" class="star-rating pull-right" title="<?php echo sprintf( esc_attr__( 'Rated %d out of 5', 'edukul' ), $rating ) ?>">
			<?php edukul_print_single_review( $rating ); ?>
		</div>
		<div class="media clearfix">
			<div class="avatar-image">
				<?php echo get_avatar( $comment, $size='80' ); ?>
			</div>

			<div class="comment-text media-body">				
				<div class="clearfix comment-body">
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<span class="edukul-author clear" itemprop="author"><?php comment_author(); ?></span> <em><?php esc_html_e( 'Your comment is awaiting approval', 'edukul' ); ?></em>
					<?php else : ?>

						<h4 class="comment-author clear" itemprop="author"><?php comment_author(); ?></h4>
						<div class="comment-date" itemprop="datePublished" datetime="<?php echo get_comment_date( 'c' ); ?>">
							<?php echo sprintf(__('Posted on %s', 'edukul'), get_comment_date( get_option('date_format', 'd M, Y') )); ?>
						</div>

					<?php endif; ?>
				</div>
				<div itemprop="description" class="description clear"><?php comment_text(); ?></div>
			</div>
		</div>
	</div>
</li>