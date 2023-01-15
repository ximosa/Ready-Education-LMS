<?php
$course_id = get_the_ID();
$registered = edukul_educator_get_students_by_course( $course_id );

$obj = Edr_Courses::get_instance();
$lesson = $obj->get_course_lessons( $course_id );
$nb_lesson = is_array( $lesson ) ? count( $lesson ) : 0;

$start = edukul_metabox( 'start' );
$duration = edukul_metabox('duration');

$prerequisites = get_post_meta( $course_id, '_edr_prerequisites', true );
$difficulty = get_post_meta( $course_id, '_edr_difficulty', true );
?>

<ul class="course-features">
	<?php if ( !empty( $registered ) ) { ?>
		<li>
			<span><?php esc_html_e( 'Students:', 'edukul' ); ?></span>
			<span><?php echo count( $registered ); ?></span>
		</li>
	<?php } ?>
	<?php if ( !empty( $start ) ) { ?>
		<li>
			<span><?php esc_html_e( 'Start Course:', 'edukul' ); ?></span>
			<span><?php echo wp_kses_post($start); ?></span>
		</li>
	<?php } ?>
	<?php if ( !empty( $duration ) ) { ?>
		<li>
			<span><?php esc_html_e( 'Duration:', 'edukul' ); ?></span>
			<span><?php echo wp_kses_post($duration); ?></span>
		</li>
	<?php } ?>
	<?php if ( !empty( $nb_lesson ) ) { ?>
		<li>
			<span><?php esc_html_e( 'Lessons:', 'edukul' ); ?></span>
			<span><?php echo wp_kses_post( $nb_lesson ); ?></span>
		</li>
	<?php } ?>
	<li>
		<span><?php esc_html_e( 'Prerequisites:', 'edukul' ); ?></span>
		<span><?php echo wp_kses_post( $prerequisites ? esc_html__('Yes', 'edukul') : esc_html__('No', 'edukul') ); ?></span>
	</li>
	<?php if ( !empty( $difficulty ) ) { ?>
		<li>
			<span><?php esc_html_e( 'Skill Level:', 'edukul' ); ?></span>
			<span><?php echo wp_kses_post( $difficulty ); ?></span>
		</li>
	<?php } ?>
</ul>
