<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/library/js/html5.js"></script>
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
</head>

<body>

	<header>
		<div class="row">
			<div id="main-logo" class="large-2 medium-3 small-6 columns">
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/PIN-logo.svg" title="PIN LOGO" alt="Project Internaltional Architecture logo"/>
			</div>

			<div id="nav" class="large-4 medium-3 small-6 columns">
				<ul>
					<a href="">
						<li>ABOUT</li>
					</a>
					<a href="">
						<li>PROJECTS</li>
					</a>
					<a href="">
						<li>CONTACT</li>
					</a>
				</ul>
			</div>
		</div>

	</header>
