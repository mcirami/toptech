<?php
/**
 * The Header for our theme.
 *
 * @package boiler
 */

?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1" />

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    
<div class="content_wrap">

	<header id="global_header">		
		<div class="header_top">
			<div class="header_top_1"></div>
			<div class="header_top_2"></div>
			<div class="header_top_3"></div>
			<div class="header_top_4"><h3><a href="mailto:<?php the_field('email_link', 'options'); ?>">EMAIL US</a> &nbsp;|&nbsp;<?php echo get_field('contact_header_text', 'options').' '.get_field('contact_phone', 'options'); ?></h3></div>
			<form method="get" id="search_form" action="<?php bloginfo('home'); ?>"/>
				<input type="text" class="text" name="s" placeholder="&#61442;">
			</form>
		</div>
		<div class="header_bottom">
			<div class="container">
				<div class="logo">
					<a href="/"><img src="<?php echo bloginfo('template_url'); ?>/images/logo.png" /></a>
					<a class="slide_button_tablet" href="<?php the_field('thermostat_registration_link', 'options'); ?>"><span>Thermostat</span><span>Registration</span></a>
				</div>
				
				<nav role="navigation" class="bottom_nav">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'header_menu' ) ); // remember to assign a menu in the admin to remove the container div ?>
					<a class="slide_button" href="<?php the_field('thermostat_registration_link', 'options'); ?>"><span>Thermostat</span><span>Registration</span></a>
				</nav>

				<a class="mobile_btn" href="#js-mobile_menu"><i class="menu_btn fa fa-bars"></i></a>
			</div>
			
			<nav id="js-mobile_menu" class="mobile_menu">
				<form method="get" id="mobile_search_form" action="<?php bloginfo('home'); ?>"/>
					<input type="text" class="text" name="s" placeholder="&#61442;">
				</form>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'mobile_header_menu' ) ); ?>	
			</nav>
		</div>
		<div class="mobile_call_us">
			<img src="<?php echo bloginfo('template_url'); ?>/images/call_us_mobile_icon.png" alt="call_us_mobile_icon">
			<h3>CALL US: &nbsp;</h3><h3 class="call_us_number">866.239.4440</h3>
		</div>
	</header>