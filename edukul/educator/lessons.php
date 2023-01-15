<?php
global $post;
if ( ! empty( $lessons ) ) : ?>
	<h2 class="edr-lessons-title"><?php esc_html_e( 'Curriculums', 'edukul' ); ?></h2>
	<ul class="edr-lessons">
		<?php $i = 1; foreach ( $lessons as $lesson ) :
			$post = $lesson;
			setup_postdata( $post );
			$obj = Edr_Access::get_instance();
			$access = $obj->can_study_lesson($lesson->ID);
		?>
			<li class="lesson <?php echo esc_attr( $access ? 'can-access' : '' ); ?>">
				<div class="lessin-wrapper">
					<div class="lesson-header">
						<?php if ($access) { ?>
							<a class="lesson-title" href="<?php echo esc_url( get_permalink( $lesson->ID ) ); ?>">
						<?php } ?>
							<?php echo esc_html( $lesson->post_title ); ?>
						<?php if  ($access ) { ?>
							</a>
						<?php } ?>
					</div>
					<div class="lesson-meta pull-right">
						<?php $has_quiz = (boolean) get_post_meta( $lesson->ID, '_edr_quiz', true );
						if ( $has_quiz ) { ?>
							<span class="label quiz"><?php esc_html_e('Quiz', 'edukul'); ?></span>
						<?php } else { ?>
							<span class="label lesson"><?php esc_html_e('Lesson', 'edukul'); ?></span>
						<?php } ?>
						<?php
							$duration = $duration = edukul_metabox( 'lesson_duration' );
						?>
						<div class="lesson-duration">
							<?php echo wp_kses_post( $duration ); ?>
						</div>
						<?php if ( $access ) { ?>
							<span class="can-access"><i class="eduk-eye"></i></span>
						<?php } else { ?>
							<span class="can-not-access"><i class="eduk-lock"></i></span>
						<?php } ?>
					</div>
				</div>
			</li>
		<?php $i++; endforeach; wp_reset_postdata(); ?>
	</ul>
<?php endif; ?>
