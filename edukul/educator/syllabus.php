<?php
global $post;
?>
<?php if ( ! empty( $syllabus ) ) : ?>
	<h2 class="title-tab"><?php esc_html_e( 'Curriculums', 'edukul' ); ?></h2> 
	<div class="edr-syllabus">
		<?php $i = 1; foreach ( $syllabus as $group ) : ?>
			<?php if ( ! empty( $group['lessons'] ) ) : ?>
				<div class="group">
					<div class="group-header"><h3 class="group-title"><?php echo esc_html( $group['title'] ); ?></h3></div>
					<div class="group-body">
						<ul class="edr-lessons">
							<?php
								foreach ( $group['lessons'] as $lesson_id ) {
									if ( isset( $lessons[ $lesson_id ] ) ) {
										$post = $lessons[ $lesson_id ];
										setup_postdata( $post );
										$obj = Edr_Access::get_instance();
										$access = $obj->can_study_lesson( $lesson_id );

										?>
											<li class="lesson <?php echo esc_attr( $access ? 'can-access' : '' ); ?>">
												<div class="lessin-wrapper">
													<div class="lesson-header">
														<?php if ( $access ) { ?>
															<a class="lesson-title" href="<?php the_permalink(); ?>">
														<?php } ?>
															<?php the_title(); ?>
														<?php if ( $access) { ?>
															</a>
														<?php } ?>
													</div>

													<div class="lesson-meta pull-right">
														<?php $has_quiz = (boolean) get_post_meta( $post->ID, '_edr_quiz', true );
														if ( $has_quiz ) { ?>
															<span class="label quiz"><?php esc_html_e('Quiz', 'edukul'); ?></span>
														<?php } else { ?>
															<span class="label lesson"><?php esc_html_e('Lesson', 'edukul'); ?></span>
														<?php } ?>
														<?php
															$duration = edukul_metabox( 'lesson_duration' );
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
												<?php if ( has_excerpt() ) : ?>
													<div class="lesson-excerpt"><?php the_excerpt(); ?></div>
												<?php endif; ?>
											</li>
										<?php
									}
								}
								wp_reset_postdata();
							?>
						</ul>
					</div>
				</div>
			<?php endif; ?>
		<?php $i++; endforeach; ?>
	</div>
<?php endif; ?>