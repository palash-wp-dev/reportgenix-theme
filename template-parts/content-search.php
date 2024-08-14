<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xgenious
 */
$xgenious = Xgenious();
?>



<div class="col-lg-6 col-sm-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-classic-item-01 margin-bottom-30'); ?>>
        <div class="single-blog-thumb">
	        <?php $xgenious->post_thumbnail('xgenious_classic'); ?>
        </div>
        <div class="single-blog-contents mt-4">
          <?php
            get_template_part('template-parts/common/post-meta');
            the_title( '<h2 class="single-blog-contents-title mt-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            // get_template_part('template-parts/common/post-excerpt');
            ?>
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
</div>