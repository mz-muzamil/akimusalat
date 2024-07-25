<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$bootstrap_version = get_theme_mod('understrap_bootstrap_version', 'bootstrap4');
$navbar_type       = get_theme_mod('understrap_navbar_type', 'collapse');
$container = get_theme_mod('understrap_container_type');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
	<?php do_action('wp_body_open'); ?>
	<div class="wrapper-main" id="page">


		<header id="wrapper-navbar" class="header full-width">
			<div class="top-header">
				<ul>
					<li>Don't wait to invest in your prayer</li>
					<li>Limted stock <strong>30% OFF</strong></li>
					<li>(End Soon)</li>
				</ul>
			</div>
			<nav id="main-nav" class="navbar navbar-expand-md bg-green" aria-labelledby="main-nav-label">
				<div class="<?php echo esc_attr($container); ?>">
					<div class="row w-100 flex-row-reverse align-items-center">
						<div class="col col-md-5">
							<div class="d-flex justify-content-end align-items-center">
								<?php get_search_form(); ?>
								<ul class="mb-0 d-flex shop-links gap-5">
									<li><a href="<?php echo wc_get_page_permalink('myaccount'); ?>" class="text-white"><i class="fa-regular fa-user"></i></a></li>
									<li><a href="javascript:;" class="text-white"><i class="fa-regular fa-heart"></i></a></li>
									<li><a href="<?php echo wc_get_cart_url(); ?>" class="text-white"><i class="fa-solid fa-bag-shopping"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col col-md-2">
							<?php get_template_part('global-templates/navbar-branding'); ?>
						</div>
						<div class="col-md-5">
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
								<span>Menu</span> <span class="navbar-toggler-icon"></span>
							</button>
							<?php
							wp_nav_menu(
								array(
									'theme_location'  => 'primary',
									'container_class' => 'collapse navbar-collapse',
									'container_id'    => 'navbarNavDropdown',
									'menu_class'      => 'navbar-nav',
									'fallback_cb'     => '',
									'menu_id'         => 'main-menu',
									'depth'           => 2,
									'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
								)
							);
							?>
						</div>
					</div>
				</div>
			</nav>
		</header>