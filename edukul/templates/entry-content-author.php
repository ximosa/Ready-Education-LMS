<?php
/**
 * Entry Content / Author
 *
 * @package edukul
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( is_single() && ! get_the_author_meta( 'description' ) )
	return;
?>

<div class="post-author cleafix">
    <div class="author-avatar">
        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>" rel="author">
            <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'edukul_author_bio_avatar_size', 150 ) ); ?>
        </a>
    </div>

    <div class="author-desc">
        <h4 class="name"><?php the_author_meta( 'nickname' ); ?></h4>

        <div class="position"><?php echo get_the_author_meta( 'position' ); ?></div>
        <div class="position"><?php echo get_the_author_meta( 'user_singlebio' ); ?></div>

        <p><?php the_author_meta( 'description' ); ?></p>

        <div class="author-socials">
            <div class="socials">
                <?php if ( $url = get_the_author_meta( 'user_twitter' ) ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr__( 'Twitter', 'edukul' ); ?>">
                        <i class="core-icon-twitter"></i>
                    </a>
                <?php endif; ?>

                <?php if ( $url = get_the_author_meta( 'user_facebook' ) ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr__( 'Facebook', 'edukul' ); ?>">
                        <i class="core-icon-facebook"></i>
                    </a>
                <?php endif; ?>

                <?php if ( $url = get_the_author_meta( 'user_instagram' ) ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr__( 'Instagram', 'edukul' ); ?>">
                        <i class="core-icon-instagram"></i>
                    </a>
                <?php endif; ?>

                <?php if ( $url = get_the_author_meta( 'user_youtube' ) ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr__( 'Youtube', 'edukul' ); ?>">
                        <i class="core-icon-youtube"></i>
                    </a>
                <?php endif; ?>

                <?php if ( $url = get_the_author_meta( 'user_tumblr' ) ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr__( 'Tumblr', 'edukul' ); ?>">
                        <i class="core-icon-tumblr"></i>
                    </a>
                <?php endif; ?>

                <?php if ( $url = get_the_author_meta( 'user_pinterest' ) ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr__( 'Pinterest', 'edukul' ); ?>">
                        <i class="core-icon-pinterest"></i>
                    </a>
                <?php endif; ?>

                <?php if ( $url = get_the_author_meta( 'user_behance' ) ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr__( 'Behance', 'edukul' ); ?>">
                        <i class="core-icon-behance"></i>
                    </a>
                <?php endif; ?>

                <?php if ( $url = get_the_author_meta( 'user_linkedin' ) ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr__( 'Linkedin', 'edukul' ); ?>">
                        <i class="core-icon-linkedin"></i>
                    </a>
                <?php endif; ?>

                <?php if ( $url = get_the_author_meta( 'user_dribbble' ) ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr__( 'Dribbble', 'edukul' ); ?>">
                        <i class="core-icon-dribbble"></i>
                    </a>
                <?php endif; ?>

                <?php if ( $url = get_the_author_meta( 'user_vimeo' ) ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr__( 'Vimeo', 'edukul' ); ?>">
                        <i class="core-icon-vimeo"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>




