<?php get_header(); ?>

<div class="row content">
	<?php
	//$args = array( 'post_type' => 'pin_projects');
	//$loop = new WP_Query('post_type' => );

	if( have_posts() ) {
		while( have_posts() ) {

			echo '<div id="home-slideshow-wrapper" class="single-project-wrapper large-6 small-6 columns">';

			the_post();

			$post_title = get_the_title();
			$post_description = get_field('project_description');
			$post_location = get_field('location');
			$post_categories = get_the_terms( $post->ID, 'project-type' );

			/** PROJECT SLIDESHOW **/
			for($i = 1, $index = 8; $i < 8; $i++, $index--) {
				$slideshow_img = get_field('image_' . $i);
				$slide_title = $slideshow_img['title'];

				if(!empty($slideshow_img)) {
					$img_url = $slideshow_img['sizes']['medium'];

					echo '<div class="home-slideshow-img-container">';
					echo '	<img class="slide" src="' . $img_url . '" title="' . $slide_title . '" />';
					echo '</div>';
				} // end if
			} // end for
			echo "<div class='slideshow-nav'>
			<span data-direction='prev' class='arrow-nav slideshow-arrow-prev'></span>
			<span data-direction='next' class='arrow-nav slideshow-arrow-next'></span>
			</div>";

			echo '</div>'; // close home-slideshow-wrapper


			/** PROJECT TITLE, LOCTAION AND CATEGORY **/
			echo '<div id="project-info" class="small-6 medium-3 large-4 column">
				<div class="row">';
			// title
			echo '	<div class="project-title small-6 medium-4 large-4 columns">' . $post_title . '</div>';
			echo '	<div class="small-6 medium-2 large-2 columns"></div>';

			// location
			if(!empty($post_location)) {
				echo '<div class="project-location small-6 medium-4 large-4 columns">' . $post_location . '</div>';
				echo '	<div class="small-6 medium-2 large-2 columns"></div>';
			}
			
			// taxonomies
			if($post_categories) {
				foreach($post_categories as $cat) {
					echo '<div class="project-category small-6 medium-4 large-4 columns">' . $cat->name . '</div>';
					echo '	<div class="small-6 medium-2 large-2 columns"></div>';
				}
			}
			echo '</div>
				</div>';
			

			/** PROJECT DESCRIPTION **/
			if(!empty($post_description)) {
				echo '<div id="project-description" class="small-6 medium-3 large-2 column">';
				echo '	<p>' . $post_description . '</p>';
				echo '</div>';
			}


		} // end while
	} // end if
	?>
	</div>
</div>

<?php get_footer(); ?>