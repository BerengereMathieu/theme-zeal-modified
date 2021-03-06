<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<?php
if (has_post_thumbnail( get_the_ID() ) ) :
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
else:
    $image = get_template_directory_uri() . '/inc/images/blog-post-default-bg.jpg';
endif;
?>

<div class="col-sm-4 blog-roll-post wow fadeIn">
	<a class="blog-post-read-more" href="<?php echo esc_url( get_permalink() ); ?>">
    <article data-link="<?php echo esc_url( get_the_permalink() ); ?>" id="<?php echo esc_attr( 'post-' . get_the_ID() ); ?>">

        <div class="blog-post-image" style="background-image: url(<?php echo has_post_thumbnail( get_the_ID() ) ? esc_url( $image[0] ) : esc_url( $image ); ?>);">

        </div>   

        <div class="blog-post-overlay">

            <h2 class="post-title">
                <?php 
	                echo esc_html( wp_trim_words( get_the_title(), 10 ) ); 	                
                ?>
            </h2>
            <h6 style="color:white">
                <?php 
	                $categories = get_the_category();
					$cat = $categories[0];
	                echo $cat->name ; 	                
                ?>
            </h6>

        </div>

    </article>
    </a>

</div>
