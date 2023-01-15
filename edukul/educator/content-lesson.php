<article <?php post_class('lesson-detail'); ?>>
    <?php $course_id = get_post_meta( get_the_ID(), '_edr_course_id', true ); ?>
    <div class="sticky-v-wrapper clearfix">
        <div class="course-lesson-sidebar-wrapper sticky-this">
            <?php if ($course_id) : ?>
                <div class="course-lesson-sidebar">
                    <div class="widget">
                        <h3 class="forward"><a href="<?php echo esc_url( get_permalink( $course_id ) ); ?>"><?php esc_html_e('Back To The Course', 'edukul'); ?></a></h3>
                        <div class="widget-content">
                            <?php edukul_educator_display_lessons( $course_id ); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="course-lesson-content-wrapper">
            <div class="course-lesson-content">
                <div class="clearfix entry-content <?php echo ! empty( $thumb ) ? '' : 'no-thumb'; ?>">
                    <div class="info-bottom">
                        <?php the_content(); ?>
                    </div>
                
                    <?php 
                    the_post_navigation( array(
                        'next_text' => '<span class="navi">'. esc_html__( 'Next post', 'edukul' ) .'<i class="fa fa-long-arrow-right" aria-hidden="true"></i></span> '.
                            '<span class="lesson-title">%title</span>',
                        'prev_text' => '<span class="navi"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>'. esc_html__( 'Previous post', 'edukul' ) .'</span> ' .
                            '<span class="lesson-title">%title</span>',
                    ) );
                    ?>
                </div>
            </div>
        </div>
    </div>
</article>