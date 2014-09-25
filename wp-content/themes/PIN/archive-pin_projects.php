<?php get_header(); ?>

<div class='row content'>

<?php 
	$args = array(
			'post_type' 			=> 'pin_projects',
			'post_status'			=> 'publish',
			'posts_per_page' 	=> -1 
		);

	$loop = new WP_Query($args);

	if($loop->have_posts()) {
		while($loop->have_posts()) {
			$loop->the_post();

			$post_thumb = get_field('projetc_thumbnail');
			$post_thumb_url = $post_thumb['sizes']['thumbnail'];
			$post_thumb_title = $post_thumb['title']; 
			$title = get_the_title();
			$link = get_permalink();
 
			echo '<div class="thumb-wrapper small-6 medium-3 large-2 columns">';
			echo '	<a href="' . $link . '" rel="nofollow" >';
			echo '		<img class="project-thumb" src="' . $post_thumb_url . '" title="' . $post_thumb_title . '" />';
			echo '	</a>';
			echo '	<h2 class="project-title"><a href="' . $link . '" rel="nofollow" >' . $title . '</a></h2>';
			echo '</div>';
		}
	}
?>

</div>

<?php get_footer(); ?>