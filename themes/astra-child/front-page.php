<?php
/**
 * Landoy's Barbecue - Front Page
 */

get_header();
?>

<main id="primary" class="site-primary landoys-front">

	<!-- HERO -->
	<section class="lby-hero" id="top">
		<div class="lby-hero-inner">
			<div class="lby-hero-copy">
				<p class="lby-hero-eyebrow">Landoy's Barbecue</p>
				<h1 class="lby-hero-title">Fresh off the grill,<br>every single day.</h1>
				<p class="lby-hero-sub">Charcoal-grilled pork, chicken isaw, and puso at street prices. Order ahead and skip the wait.</p>
				<div class="lby-hero-ctas">
					<a href="tel:09992095092" class="lby-btn lby-btn-primary">Order Now</a>
					<a href="#menu" class="lby-btn lby-btn-ghost">View the Menu</a>
				</div>
			</div>
			<div class="lby-hero-art">
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/logo.jpg' ); ?>"
					alt="Landoy's Barbeque House logo, serving since 1972"
					class="lby-hero-logo" width="1024" height="714">
			</div>
		</div>
	</section>

	<!-- MENU MARQUEE (single marquee on page) -->
	<div class="lby-marquee" aria-hidden="true">
		<div class="lby-marquee-track">
			<span>Pork Barbecue</span><i>&bull;</i><span>Chicken Isaw</span><i>&bull;</i><span>Pork Sisig</span><i>&bull;</i><span>Liempo</span><i>&bull;</i><span>Poso</span><i>&bull;</i><span>Health Tea</span><i>&bull;</i><span>Halang-halang</span><i>&bull;</i>
			<span>Pork Barbecue</span><i>&bull;</i><span>Chicken Isaw</span><i>&bull;</i><span>Pork Sisig</span><i>&bull;</i><span>Liempo</span><i>&bull;</i><span>Poso</span><i>&bull;</i><span>Health Tea</span><i>&bull;</i><span>Halang-halang</span><i>&bull;</i>
		</div>
	</div>

	<!-- STORY -->
	<section class="lby-story">
		<div class="lby-story-grid">
			<figure class="lby-story-photo">
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/story.jpg' ); ?>" alt="Char-grilled skewers fresh off the grill" loading="lazy" width="900" height="1350">
			</figure>
			<div class="lby-story-copy">
				<h2>Straight from the coals to your hands.</h2>
				<p>No shortcuts. Every skewer is hand-marinated overnight and grilled over live charcoal until the edges char. The way it has always been done.</p>
				<p class="lby-story-note">Grilling starts at 10 AM daily. Come early for the bestseller sticks; they sell out.</p>
			</div>
		</div>
	</section>

	<!-- MENU -->
	<section class="lby-menu-section" id="menu">
		<?php echo do_shortcode( '[bbq_menu]' ); ?>
	</section>

	<!-- HOURS & CONTACT -->
	<section class="lby-hours" id="hours">
		<div class="lby-hours-grid">
			<div class="lby-hours-block">
				<h2>Operating Hours</h2>
				<ul class="lby-hours-list">
					<li><span>Monday to Friday</span><span>10:00 AM - 8:00 PM</span></li>
					<li><span>Saturday</span><span>10:00 AM - 9:00 PM</span></li>
					<li><span>Sunday</span><span>12:00 PM - 7:00 PM</span></li>
				</ul>
			</div>
			<div class="lby-hours-block">
				<h2>Find Us</h2>
				<p>Walk in, point at the grill, and we will hand it over hot. Or call ahead and we will have your order packed.</p>
				<a href="tel:09992095092" class="lby-btn lby-btn-primary">Call 0999 209 5092</a>
			</div>
			<div class="lby-hours-block">
				<h2>Connect</h2>
				<p class="lby-contact-line"><a href="https://www.google.com/maps/place/Landoy's+Barbecue+House/@8.4917548,123.7994716,19.18z" target="_blank" rel="noopener">Loboc Upper, Oroquieta City, Misamis Occidental</a></p>
				<p class="lby-contact-line"><a href="tel:09992095092">0999 209 5092</a></p>
				<p class="lby-contact-line"><a href="https://www.facebook.com/LandoysBarbecue" target="_blank" rel="noopener">facebook.com/LandoysBarbecue</a></p>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
?>

<!-- Sticky mobile order bar -->
<div class="lby-mobile-bar" role="navigation" aria-label="Quick order">
	<a href="#menu" class="lby-mobile-bar-menu">Menu</a>
	<a href="tel:09992095092" class="lby-mobile-bar-call">Order: 0999 209 5092</a>
</div>
