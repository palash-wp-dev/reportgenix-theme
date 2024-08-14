
<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xgenious
 */
$xgenious = Xgenious();

?>
<div class="col-xl-4 col-md-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('blogItem style_02'); ?>>
        <div class="blogItem__thumb">
            <?php $xgenious->post_thumbnail('xgenious_classic'); ?>
        </div>
        <div class="blogItem__contents">
            <?php the_title( '<h2 class="blogItem__contents__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
            
            <?php get_template_part('template-parts/common/post-meta'); ?>
            
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
</div>
