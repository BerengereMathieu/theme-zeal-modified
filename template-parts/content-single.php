<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zeal
 */

?>
<?php

    if ( has_post_thumbnail( get_the_ID() ) ) :
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
    else:
        $image = get_template_directory_uri() . '/inc/images/blog-post-default-bg.jpg';
    endif;
    
    switch ( get_theme_mod( 'zeal_post_column_ratio', 'four-eight' ) ) :
                    
        case 'three-nine':
            $col_1_width = 3;
            $col_2_width = 9;
            break;
        case 'four-eight':
            $col_1_width = 4;
            $col_2_width = 8;
            break;
        case 'six-six':
            $col_1_width = 6;
            $col_2_width = 6;
            break;
        default:
            $col_1_width = 4;
            $col_2_width = 8;
            
    endswitch; 
    
?>

<div class="col-sm-12 single-post-wrapper">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <div class="row">
        
            <div class="col-sm-<?php echo esc_attr( $col_1_width ); ?> single-post-left">
                
                    
                    <?php
                        if( has_post_thumbnail( get_the_ID() ) ) : 
                            
                            the_post_thumbnail();
                        
                        else : ?>
                        
                    <?php endif; ?>
                
                <div class="single-post-meta">
                    <span class="meta-heading"><?php _e( "Bérengère MATHIEU", 'zeal'); ?></span>
                    
                    <?php if( get_theme_mod( 'zeal_single_date', 'on' ) == 'on' ) : ?>
                    <span class="meta-value"><?php echo esc_html( get_the_date() ); ?></span>
                    <?php endif; ?>
                    
                    
                </div>
                
            </div>
            
            <div class="col-sm-<?php echo esc_attr( $col_2_width ); ?> single-post-right">
            
				
                
                <header class="entry-header">
					<?php 
					if( get_theme_mod( 'zeal_single_categories', 'on' ) == 'on' ) : 
					$categories = get_the_category();
					$cat = $categories[0];
					echo "<h1  class='entry-title'>";
					echo "Projet : " . esc_html( $cat->name );
					echo "</h1>";
					echo "<p>";
					echo esc_html($cat->description);
					echo "</p>";
					endif;
					?>
                </header><!-- .entry-header -->

                <div class="entry-content">

					<?php /* Start the Loop */ 
					if( get_post_format(get_the_ID() ) == 'image') :
						if( get_theme_mod( 'zeal_single_categories', 'on' ) == 'on' ) : 
						$categories = get_the_category();
						$cat = $categories[0];
						endif;
						$cat_posts=get_posts(array(
					        'category' => $cat->term_id , 'orderby' => 'date',
					        'order' => 'DESC'));
					    $currentPostId=0;
					    
						echo"<div class='row'>";
						foreach ( $cat_posts as $post ) :
						setup_postdata( $post ); 
						if (has_post_thumbnail( get_the_ID() ) ) :
							if($currentPostId ==2):
								echo "</div>";//end row
								echo"<div class='row'>";
								$currentPostId==0;
							endif;
						    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
						    echo "<div class='col-sm-6 blog-roll-post wow fadeIn'>";
						    echo "<a href='" . esc_url( $image[0] )."'>";
						    echo "<div class='blog-post-image' style='background-image: url(";
						    echo esc_url( $image[0] );
						    echo ");'>";
						    echo "</div>";
						    echo "</a>";
						    echo "</div>";
						    $currentPostId=$currentPostId+1;
						else:
						endif;
					    endforeach; 
					    echo "</div>";
					    
					else :
	                    the_content();
					endif;
					?>
                    <?php
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zeal' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div><!-- .entry-content -->
            
            </div>
            
        </div>
            
    </article><!-- #post-## -->

</div>
