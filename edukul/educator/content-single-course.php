<?php
global $post;
$course_id = $post->ID;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-thumb">
        <div class="course-gallery">
            <?php
            echo get_the_post_thumbnail( get_the_ID(), 'edukul-post-standard' );
            ?>
        </div><!-- /.course-gallery -->
    </div>

    <div class="entry-head">
        <div class="info-left">
            <?php if ( get_the_title() ) { ?>
                <h4 class="entry-title"><?php the_title(); ?></h4>
            <?php } ?>
        </div>
    </div>

    <div class="info-meta clearfix">
        <div class="edr-lecturer">
            <div class="inner-lecturer">
                <div class="title">
                    <?php echo esc_html__( 'Lecturer', 'edukul' ); ?>
                </div>
                <div class="author-title">
                    <?php echo get_the_author(); ?>
                </div>
            </div>
        </div>

        <?php
            $terms = get_the_terms( $course_id, 'edr_course_category' );
            if ( ! empty( $terms ) ) {
                ?>
                <div class="edr-category">
                    <div class="inner-category">
                        <div class="title">
                            <?php esc_html_e( 'Category', 'edukul' ); ?>
                        </div>
                        <div class="cat">
                        <?php 
                        foreach ( $terms as $term ) {
                            echo '<a href="'. get_term_link( $term->term_id, 'edr_course_category' ) .'">'. $term->name .'</a>';
                            break;
                        } ?>
                        </div>
                    </div>
                </div>
            <?php }
        ?>

         <div class="edr-course-review">
            <?php
                $total_rating = edukul_get_total_rating( $course_id );
                $count_rating = edukul_get_total_reviews( $course_id );
            ?>
            <?php edukul_print_review( $total_rating ); ?>
            <div class="rating-count"><?php echo sprintf( _n( '%d Review', '%d Reviews', $count_rating, 'edukul' ), $count_rating ); ?></div>
        </div>

        <?php $buy_html = edr_get_buy_widget( array( 'object_id' => $course_id, 'object_type' => EDR_PT_COURSE, 'label' => esc_html__( 'Take this course', 'edukul' ) ) ); ?>
        <?php if ( !empty( $buy_html ) ) { ?>
            <div class="course-price">
                <?php echo wp_kses_post( $buy_html ); ?>
            </div>
        <?php } ?>
    </div><!-- /info-meta -->
   
	<div class="detail-content-wrap">
        <?php
            remove_action( 'edr_before_single_course_content', 'edr_display_course_info' );
            remove_action( 'edr_after_single_course_content', 'edr_display_lessons' );
        ?>
        <div class="course-inner clearfix">
            <div id="course-description" class="entry-description">
                <h3 class="title-tab"><?php esc_html_e( 'Course Description', 'edukul' ) ?></h3>
                <?php the_content(); ?>
            </div><!-- /entry-content -->

            <div id="course-info" class="entry-info">
                <h3 class="title-tab"><?php esc_html_e( 'Course Info', 'edukul' ) ?></h3>
                <?php get_template_part( 'educator/single/course-features' ); ?>
            </div>
        </div>

        <div id="course-program">
            <?php edr_display_lessons( $course_id ); ?>
        </div><!-- /entry-lesson -->

        <?php get_template_part( 'templates/entry-content-author' ); ?>
        
        <?php
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        ?>
    </div>
</article>