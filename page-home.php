<?php get_header(); ?>
	<?php include( MBIS_DIR_PATH . '/partials/_navigation.php' ); ?>
	<section class="jumbotron-fluid hero">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-5">
					<h1>We can <span class="brand-underline">help.</span></h1>
					<p>
						Teaching independence to the lives of the people you love with reliable, individualized emotional and behavioral therapy.
					</p>
					<a href="javascript:void(0)" class="call-to-action">
						FIND HELP HERE
					</a>
				</div>
			</div>
		</div>
	</section>
	<section class="partners">
		<div class="container">
			<?php echo $helper->image_path( 'partner-magellan-health.png', array( 'class' => 'partners__partner' ) ); ?>
			<?php echo $helper->image_path( 'partner-kaiser.png', array( 'class' => 'partners__partner' ) ); ?>
			<?php echo $helper->image_path( 'partner-anthem.png', array( 'class' => 'partners__partner' ) ); ?>
			<?php echo $helper->image_path( 'partner-north-bay.png', array( 'class' => 'partners__partner' ) ); ?>
			<?php echo $helper->image_path( 'partner-healthplan-ca.png', array( 'class' => 'partners__partner' ) ); ?>
			<?php echo $helper->image_path( 'partner-aetna.png', array( 'class' => 'partners__partner' ) ); ?>
		</div>
	</section>
	<section class="callout callout--teal callout--medium callout--aging-walker">
		<h2 class="callout__heading">Support For People Of All Walks of Life</h2>
		<p class="callout__description">
			Children as young as 2 years old may begin to develop behaviors which need extra support and attention.
		</p>
	</section>
	<section class="callout callout--white callout--small">
		<h2 class="callout__subheading callout__subheading--gray">McGrew Behavior Services Helps...</h2>
		<p class="callout__description">
			Families, organizations and health care providers in Northern California. Our knowledge and experience provide the specialized support people need when overcoming behavioral challenges.
		</p>
		<a href="javascript:void(0)" class="callout__cta">
			Contact us
		</a>
	</section>
	<section class="callout callout--blue callout--large callout--illustrated">
		<h2 class="callout__heading">In Home Support</h2>
		<?php echo $helper->image_path( 'in-home-support.jpg', array( 'class' => 'callout__image' ) ); ?>
	</section>
<?php get_footer(); ?>
