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
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

	<title><?php wp_title( '|', true, 'right' ); ?>PIN</title>

	<link href='http://fonts.googleapis.com/css?family=Arimo:400,700' rel='stylesheet' type='text/css'>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/library/js/html5.js"></script>
	<![endif]-->

	<?php if(is_post_type_archive( array('pin_about', 'pin_home', 'pin_contact' ))) {
		echo "<meta name='description' content='" . get_field('meta_description', $wp_query->post->ID) . "' >";
	} elseif(is_post_type_hierarchical( 'pin_projects' )) {
		echo "<meta name='description' content='" . get_field('meta_description', $wp_query->post->ID) . "' >";
	} elseif(is_post_type_archive('pin_projects')) {
		echo "<meta name='description' content='a selection of project curated by Project International Architecture' >";
	}
	?>

	<?php wp_head(); ?>

	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-55288975-1', 'auto');
  ga('send', 'pageview');

	</script>

</head>

<body class="row">

	<header>
		<div class="row">

			<div id="main-logo" class="large-2 medium-3 small-6 columns">
				<a class='home-link' href="<?php echo get_option('siteurl'); ?>">
					<h1>PROJECT INTERNATIONAL ARCHITECTURE</h1>
				</a>
			</div>

			<!--
			<ul class="title-area small-6 column">
		    <li class="toggle-topbar menu-icon">
		      <span class="menu-tab"></span>
		      <span class="menu-tab"></span>
		      <span class="menu-tab"></span>
		    </li>
  		</ul>
  		-->

			<div id="nav" class="large-4 medium-3 small-6 columns">
				<ul class="top-nav .no-bullet">
					<li <?php echo is_post_type_archive('pin_about') ? 'class=active' : ''; ?>>
						<a href="<?php echo get_option('siteurl'); ?>/about">ABOUT</a>
					</li>
					<li <?php echo is_post_type_archive('pin_projects') || 'pin_projects' == get_post_type() ? 'class=active' : ''; ?>>
						<a href="<?php echo get_option('siteurl'); ?>/projects">PROJECTS</a>
					</li>
					<li <?php echo is_post_type_archive('pin_contact') ? 'class=active' : ''; ?>>
						<a href="<?php echo get_option('siteurl'); ?>/contact">CONTACT</a>
					</li>
				</ul>
			</div>

		</div>
	</header>



