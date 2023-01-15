<?php
/**
 * Renders each course in the courses.php template.
 *
 * @version 1.0.1
 */

$edr_courses = Edr_Courses::get_instance();
$course_id = get_the_ID();
$price = $edr_courses->get_course_price( $course_id );
$price_str = ( $price > 0 ) ? '<span class="letter-0">'. edr_format_price( $price ) .'</span>' : _x( 'Free', 'price', 'edukul' );
$thumb_size = apply_filters( 'edr_courses_thumb_size', 'edukul-rectangle' );

global $post;
$term_list = '';
$course_id = get_the_ID();
$terms = get_the_terms( $course_id, 'edr_course_category' );

if ( $terms ) {
    foreach ( $terms as $term ) {
        $term_list .= $term->slug .' ';
    }
}
?>

<article id="course-<?php echo intval( $course_id ); ?>" class="edr-course cbp-item <?php echo esc_attr( $term_list ); ?>">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="edr-course__image">
			<?php $total_rating = edukul_get_total_rating( get_the_ID() ); ?>

			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $thumb_size ); ?></a>

			<div class="edr-course__price <?php echo esc_attr( $price > 0?'':'free-label' ); ?>"><?php echo wp_kses_post( $price_str ); ?></div>

			<div class="edr-course__review">
				<?php edukul_print_review( $total_rating ); ?>
			</div>
		</div>
	<?php endif; ?>

	<div class="edr-course__content">

		<div class="edr-course__price <?php echo esc_attr( $price > 0?'':'free-label' ); ?>"><?php echo wp_kses_post( $price_str ); ?></div>

		<div class="edr-course__review">
			<?php edukul_print_review( $total_rating ); ?>
		</div>
			
        <?php $terms = get_the_terms( $course_id, 'edr_course_category' ); ?>
        <?php
            if ( !empty( $terms ) ) {
            	?>
                <div class="edr-course__category">
            		<?php
                    foreach ( $terms as $term ) {
                        echo '<a href="'. get_term_link( $term->term_id, 'edr_course_category' ) .'">'. $term->name .'</a>';
                        break;
                    } ?>
                </div>
            <?php }
        ?>

		<h2 class="edr-course__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<div class="edr_course__meta">
			<span class="teacher">
				<?php esc_html_e( 'Lecturer ', 'edukul' ); ?>
				<span class="name"><?php echo get_the_author(); ?></span>
			</span>

	        <?php
	            if ( !empty($terms) ) {
	                ?>
	                <span class="category">
	                	<?php esc_html_e( 'in ', 'edukul' );
	                    foreach ( $terms as $term ) {
	                        echo '<a href="' . get_term_link( $term->term_id, 'edr_course_category' ) . '">'. $term->name .'</a>';
	                        break;
	                    } ?>
	                </span>
	                <?php
	            }
	        ?>
	    </div>

        <?php if ( has_excerpt() ) { ?>
            <div class="edr_course__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 12, '...' ); ?></div>
        <?php } ?>

		<div class="edr_course__info">
			<?php $registered = edukul_educator_get_students_by_course( get_the_ID() ); ?>
			<span class="registered">
				<?php echo count( $registered ); ?>
			</span>

			<?php if ( $duration = edukul_metabox( 'duration' ) ) { ?>
				<span class="duration">
					<?php echo esc_html( $duration ); ?>
				</span>
			<?php } ?>

			<?php
			$course_id = get_the_ID();
			$obj = Edr_Courses::get_instance();
			$lesson = $obj->get_course_lessons( $course_id );
			$nb_lesson = is_array( $lesson ) ? count( $lesson ) : 0; ?>
			<span class="lessons"><?php echo wp_kses_post( $nb_lesson ); ?> <?php esc_html_e( 'Lessons', 'edukul' ); ?></span>
		</div>

		<div class="edr-course__btn"><a href="<?php the_permalink(); ?>"><span><?php esc_html_e( 'Learn More', 'edukul' ); ?></span></a></div>
	</div>
</article>