<?php get_header(); ?>

<div class="row content">
	<div id="home-slideshow-wrapper" class="large-6 small-6 columns">
	<?php
	for($i = 0, $index = 11; $i < 11; $i++, $index--) {
		$slideshow_img = get_field('slideshow_images_' . $i, 7);
		$slide_title = get_field('slideshow_images_' . $i . '_title', 7);

		if(!empty($slideshow_img)) {
			$img_url = $slideshow_img['sizes']['PIN-full-width'];

			echo '<div class="home-slideshow-img-container">';
			echo '	<img class="slide" src="' . $img_url . '" title="' . $slide_title . '" />';
			if(!empty($slide_title)) {
				echo '<div class="slide-title">' . $slide_title . '</div>';
			}
			echo '</div>';
		}
	} 

	echo "<div class='slideshow-nav'>
		<span data-direction='prev' class='arrow-nav slideshow-arrow-prev'></span>
		<span data-direction='next' class='arrow-nav slideshow-arrow-next'></span>
	</div>";
	?>
	</div>
</div>

<?php get_footer(); ?>