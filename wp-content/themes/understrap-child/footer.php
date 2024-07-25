<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<footer class="footer bg-green-light" id="wrapper-footer">
	<div class="<?php echo esc_attr($container); ?>">
		<div class="row">
			<div class="col-md-5">
				<div class="contact-info pt-5 pb-5">
					<div class="footer-logo mb-4">
						<img class="img-fluid border-bottom pb-4" src="<?php echo get_stylesheet_directory_uri() . '/images/logo.png' ?>" alt="">
					</div>
					<h4 class="text-white mb-3">Contact us now</h4>
					<div class="row">
						<div class="col-md-6">
							<div class="d-flex gap-2 text-white">
								<img class="img-fluid" src="<?php echo get_stylesheet_directory_uri() . '/images/icon-call.svg' ?>" alt="">
								<span>+00 123 123 123</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="d-flex gap-2 text-white">
								<img class="img-fluid" src="<?php echo get_stylesheet_directory_uri() . '/images/icon-call.svg' ?>" alt="">
								<span>info@gmail.com</span>
							</div>
						</div>
						<div class="col-md-12 mt-3">
							<div class="d-flex gap-2 text-white">
								<img class="img-fluid" src="<?php echo get_stylesheet_directory_uri() . '/images/icon-call.svg' ?>" alt="">
								<span>Address: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</span>
							</div>
						</div>
					</div>
				</div>
				<div class="social-media pb-5">
					<h4 class="text-white mb-3">Follow us</h4>
					<ul class="d-flex gap-4">
						<li><a href="javascript:;"><i class="fa-brands fa-facebook"></i></a></li>
						<li><a href="javascript:;"><i class="fa-brands fa-instagram"></i></a></li>
						<li><a href="javascript:;"><i class="fa-brands fa-linkedin"></i></a></li>
						<li><a href="javascript:;"><i class="fa-brands fa-x-twitter"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-7">
				<div class="h-100 contat-form position-relative">
					<p class="text-white fs-4">Have a question? Give us us a call or fill out the contact form. <br> we'd love to hear from you</p>
					<form action="#" method="post">
						<div class="row g-2">
							<div class="mb-3 col-md-6">
								<input type="text" class="form-control form-control-lg" id="name" placeholder="Name">
							</div>
							<div class="mb-3 col-md-6">
								<input type="email" class="form-control form-control-lg" id="email" placeholder="Email">
							</div>
							<div class="mb-3 col-md-12">
								<textarea class="form-control form-control-lg" id="message" placeholder="Type your message" rows="3"></textarea>
							</div>
							<div class="col-12">
								<input type="submit" value="Send" id="btn_submit" class="btn btn-white btn-lg" />
							</div>
						</div>
					</form>
					<p class="text-white mt-4">&copy; All Rights Reserved by Desol Int.</p>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>