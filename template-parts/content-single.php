<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xgenious
 */
$xgenious = Xgenious();

$post_meta = get_post_meta(get_the_ID(),'xgenious_post_gallery_options',true);
$post_meta_gallery = isset($post_meta['gallery_images']) && !empty($post_meta['gallery_images']) ? $post_meta['gallery_images'] : '';
$post_single_meta = Xgenious_Group_Fields_Value::post_meta('blog_single_post');



$page_layout_meta = Xgenious_Group_Fields_Value::page_layout_options('blog_single');
$fb_share_url = 'https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u='.get_the_permalink().'&display=popup&ref=plugin&src=share_button';
$twitter_url = 'https://twitter.com/intent/tweet?text='.get_the_title().'&url='.get_the_permalink().'&via=xgenious1';
$linkedin_url = 'https://www.linkedin.com/shareArticle?mini=true&url='.get_the_permalink().'&title='.get_the_title();


?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-details-item'); ?>>
    <div class="entry-content">
        <?php if ('post' == get_post_type()):?>
        <ul class="post-meta">
            <?php if($post_single_meta['posted_by']):?>
            <li><?php $xgenious->posted_on();?></li>
            <?php endif;?>
	        <?php if($post_single_meta['posted_on']):?>
            <li><?php $xgenious->posted_by();?></li>
	        <?php endif;?>
	        <?php if($post_single_meta['posted_category']):?>
            <li class="cat"><?php the_category(', ')?></li>
            <?php endif;?>
        </ul>
        <ul class="blog-share-list-meta">
            <li>
                <span class="">Share:</span>
            </li>
            <li>
                <a class="blog-details-share-social-list-icon" target="_blank" href="<?php echo esc_url($fb_share_url);?>"> <i class="fa fa-facebook-f"></i> </a>
            </li>
            <li>
                <a class="blog-details-share-social-list-icon" target="_blank" href="<?php echo esc_url($twitter_url);?>"> <i class="fa fa-twitter"></i> </a>
            </li>
            <!--<li class="blog-details-share-social-list">-->
            <!--    <a class="blog-details-share-social-list-icon" target="_blank" href="javascript:void(0)"> <i class="fa fa-pinterest-p"></i> </a>-->
            <!--</li>-->
            <li>
                <a class="blog-details-share-social-list-icon" target="_blank" href="<?php echo esc_url($linkedin_url);?>"> <i class="fa fa-linkedin"></i> </a>
            </li>
        </ul>
      <?php
      endif;
        the_content();
        $xgenious->link_pages();
        ?>
    </div>
    <?php if ( 'post' == get_post_type() && ((has_tag() && $post_single_meta['posted_tag']) || (shortcode_exists('xgenious_post_share') && $post_single_meta['posted_share']) )):?>
    <div class="blog-details-footer">
        <?php if(has_tag() && $post_single_meta['posted_tag']): ?>
        <div class="left">
            <?php $xgenious->posted_tag();?>
        </div>
        <?php endif; ?>
    </div>
    <?php endif;?>
    
   
   <!-- show related item selected by the autho -->
</article><!-- #post-<?php the_ID(); ?> -->
