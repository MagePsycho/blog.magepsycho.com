<?php
/**
 * The Header for our theme.
 *
 *
 * @package WordPress
 * @subpackage Impresa
 * @since Impresa 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	$favicon = get_option('templatesquare_favicon');
	if($favicon =="" ){
?>
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<?php }else{?>
<link rel="shortcut icon" href="<?php echo $favicon; ?>" />
<?php }?>

<?php echo wordgento('cssjs'); ?>

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<!-- ////////////////////////////////// -->
<!-- //      Javascript Files        // -->
<!-- ////////////////////////////////// -->
<?php
	$effect = get_option('templatesquare_slider_effect');
	$slices = get_option('templatesquare_slider_slices');
	$speed = get_option('templatesquare_slider_speed');
	$timeout = get_option('templatesquare_slider_timeout');

 ?>
<!--[if IE]>
	<script type="text/JavaScript" src="<?php bloginfo('template_url'); ?>/js/DD_belatedPNG.js"></script>
<![endif]-->

</head>

<body <?php if(!is_front_page()){echo 'class="body-page"';}?>>
	<div id="wrapper">
		<div id="container">
			<div id="top">
			<?php
			$logotype = get_option('templatesquare_logo_type');
			$logoimage = get_option('templatesquare_logo_image');
			$sitename = get_option('templatesquare_site_name');
			if($logoimage == ""){ $logoimage = get_bloginfo('template_url') . "/images/logo.png"; }
			?>
			<?php if($logotype == 'textlogo'){ ?>
			<div id="logo">
				<div id="logo-text">
					<?php if($sitename==""){?>
						<h1><a href="<?php echo get_option('home'); ?>/" title="<?php _e('Click for Home','templatesquare'); ?>"><?php bloginfo('name'); ?></a></h1>
					<?php }else{ ?>
						<h1><a href="<?php echo get_option('home'); ?>/" title="<?php _e('Click for Home','templatesquare'); ?>"><?php echo $sitename; ?></a></h1>
					<?php }?>
				</div>
			</div><!-- end #logo -->
			<?php } else { ?>
				<div id="logo">
					<div id="logo-img">
						<a href="<?php echo wordgento('url'); ?>" title="<?php _e('Click for Home','templatesquare'); ?>"><?php echo wordgento('logo'); ?></a>
					</div>
				</div><!-- #logo -->
				<?php }?>
				<div id="topnavigation">
                	<?php //wp_nav_menu( array(
					 // 'container'       => 'ul',
					  //'menu_class'      => 'menu',
					  //'menu_id'         => 'topnav',
					  //'depth'           => 0,
					  //'sort_column'    => 'menu_order',
					  //'theme_location' => 'mainmenu'
					  //));
				?>
                	<?php echo wordgento('topmenu'); ?>
				</div><!-- #topnavigation -->
			</div><!-- #top -->
            <div class="ld"><a href="http://ae.linkedin.com/pub/rajendra-k-bhatta/42/30b/279/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/linkedin.png" /></a></div>
            <div class="tw"><a href="http://twitter.com/magepsycho"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/tw.png" /></a></div>
            <div class="fb"><a href="http://www.facebook.com/MagentoPsycho"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/fb.png" /></a></div>
            <div class="mylinks">
				<?php echo wordgento('toplinks'); ?>
			</div>
			<?php
			if(is_front_page()){
				include_once(TEMPLATEPATH .'/slider.php');
			}
			 ?>