<?php
/**
 * Template part to display the post/page header
 *
 * @package pgb
 */
?>

<header class="page-header">
	
	<?php
		if ( is_search() || is_archive() ) :
			the_title( '<h2 class="page-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		elseif ( is_single() ) :
			the_title( '<h1 class="page-title">', '</h1>' );
		else :
			the_title( '<h2 class="page-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
	?>

	<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php pgb_posted_on(); ?>
		</div><!-- .entry-meta -->
	<?php endif; ?>

</header><!-- .entry-header -->