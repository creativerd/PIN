<?php get_header(); ?>

<?php $about_text = get_field('about_text', 41); ?>

<section id="about-content" class="row">
	<div id="about-left-column" class="large-3 medium-3 small-6 columns">
		<?php $column1 = spilt_text($about_text, 1); 
			echo "<p>$column1</p>";
		?>
	</div>

	<div id="about-right-column" class="large-3 medium-3 small-6 columns">
		<?php $column2 = spilt_text($about_text, 2); 
			echo "<p>$column2</p>";
		?>
	</div>
</section>

<?php get_footer(); ?>