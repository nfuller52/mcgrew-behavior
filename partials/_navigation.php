<?php

	$navbar_color = get_post_meta( get_the_ID(), 'mbs-nav-color', true );
	$navbar_set   = ( isset( $navbar_color ) && ! empty( $navbar_color ) );

?>
<nav class="navbar main-nav navbar-expand-md <?php echo ( $navbar_set ? $navbar_color : 'nav--full-color' ) ?>">
	<div class="container">
		<a href="<?php echo home_url(); ?>" class="navbar-brand">
			<?php
				if ( $navbar_set ) {
					echo $helper->image_path( 'header-logo-' . $navbar_color . '.png', array( 'class' => 'navbar-brand-image' ) );
				} else {
					echo $helper->image_path( 'header-logo-nav--full-color.png', array( 'class' => 'navbar-brand-image' ) );
				}
			?>
		</a>
		<!-- When we are ready for pages
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navigation-toggle" aria-controls="main-navigation-toggle" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="main-navigation-toggle">
		</div>
		-->
	</div>
</nav>
