<?php

/**
 * Template Name: No Sidebar
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		// Skapar bara en variabel som innehåller det nuvarande inlägget
		while ( have_posts() ) {
			the_post();
			
			// From the editor
			echo "<h2>" . get_the_title() . "</h2>";

			the_content();
			// Include the page content template. en avancerad include
			//get_template_part( 'template-parts/content', 'page' );
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			
		}
		?>

	</main><!-- .site-main -->

</div><!-- .content-area -->
<?php get_footer(); ?>
