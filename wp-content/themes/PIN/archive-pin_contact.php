<?php get_header(); ?>

<section class="row">
	<div class="small-6 large-6 columns">
		<?php
		$contact_info = get_field('contact_details', 43);

		echo "<p>$contact_info</p>";

		?>
	</div>
</section>

<?php get_footer(); ?>