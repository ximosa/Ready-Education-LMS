<?php get_header(); ?>
    <div id="content-wrap" class="edukul-container">

		<div class="no-results">
			<div class="no-results-content">
				<div class="no-results-title">
					<h1><?php esc_html_e( 'Course can&rsquo;t be found.', 'edukul' ); ?></h1>
				</div>

				<p><?php esc_html_e( 'Maybe try a search?', 'edukul' ); ?></p>

				<div class="edukul-courses-search-form">
					<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
						<div class="clearfix">
							<div class="keyword-wrap">
								<!-- keyword -->
								<input type="text" class="input_search form-control" name="s" value="" placeholder="<?php esc_html_e('Enter Keyword...', 'edukul'); ?>"/>
							</div>

							<div class="submit-wrap">
								<button type="submit">					
									<span><?php esc_html_e('Search Course', 'edukul'); ?></span>
								</button>
							</div>
						</div>
						<input type="hidden" name="post_type" value="<?php echo defined('EDR_PT_COURSE') ? EDR_PT_COURSE : ''; ?>" class="post_type" />
					</form>
				</div>
			</div>
		</div><!-- /.no-results -->

    </div><!-- /#content-wrap -->
<?php get_footer(); ?>
