<?php
/**
 * Template part for displaying results in single category pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zeal
 */

?>

<div class="col-sm-4 blog-roll-post wow fadeIn">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
                    <?php zeal_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
            <?php the_excerpt(); ?>
            <?php
				if (has_post_thumbnail( get_the_ID() ) ) :
				    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
				    echo "<div class='blog-post-image' style='background-image: url(";
				    echo esc_url( $image[0] );
				    echo ");'> </div>";
				else:
				endif;
				?>
	</div><!-- .entry-summary -->
	
	

</article>
</div>
<!-- #post-## -->
