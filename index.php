<?php get_header(); ?>
	<?php include( MBIS_DIR_PATH . '/partials/_navigation.php' ); ?>
	<div class="container">
		<?php
            if (have_posts()):
                while (have_posts()): the_post();
                    the_content();
                endwhile;
            endif;
        ?>
	</div>
<?php get_footer(); ?>
