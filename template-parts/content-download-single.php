<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xgenious
 */
$xgenious = Xgenious();
//get current page url
$xgenious_url = urlencode_deep(get_permalink());
//get current page title
$xgenious_title =strip_tags( str_replace(' ','%20',get_the_title()));
//get post thumbnail for pinterest
$xgenious_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full');
//all social share link generate
$facebook_share_link = 'https://www.facebook.com/sharer/sharer.php?u='.$xgenious_url;
$twitter_share_link = 'https://twitter.com/intent/tweet?text='.$xgenious_title.'&amp;url='.$xgenious_url.'&amp;via=xgenious';
$linkedin_share_link = 'https://www.linkedin.com/shareArticle?mini=true&url='.$xgenious_url.'&amp;title='.$xgenious_title;
$pinterest_share_link = 'https://pinterest.com/pin/create/button/?url='.$xgenious_url.'&amp;media='.$xgenious_thumbnail[0].'&amp;description='.$xgenious_title;

//meta data

$demo_link = get_post_meta(get_the_ID(),'xgenious_demo_url',true);
$_rating = get_post_meta(get_the_ID(),'xgenious_rating',true);
$_rating = $_rating ? $_rating : 5;
$_rating_count = get_post_meta(get_the_ID(),'xgenious_rating_count',true);
$_rating_count = $_rating_count ? $_rating_count : 0;

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('single-download-item'); ?>>
    <meta itemprop="name" content="<?php echo strip_tags(get_the_title());?>" />
      <?php
        if( !empty($xgenious_thumbnail)){
            printf('<link itemprop="image" href="%1$s" />',esc_url($xgenious_thumbnail[0]));
        }
      ?>
      
      
      <meta itemprop="description" content="<?php xgenious_excerpt(100);?>" />
    
      <div itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating" itemscope>
        <meta itemprop="reviewCount" content="<?php echo esc_attr($_rating_count);?>" />
        <meta itemprop="ratingValue" content="<?php echo esc_attr($_rating);?>" />
      </div>
      <div itemprop="brand" itemtype="http://schema.org/Brand" itemscope>
        <meta itemprop="name" content="Xgenious" />
      </div>
    <?php
    if (has_post_thumbnail() ):?>
        <div class="thumbnail">
		    <?php Xgenious()->post_thumbnail(); ?>
            <div class="bottom-content">
                <div class="live-preview">
                    <a href="<?php echo esc_url($demo_link);?>" target="_blank"><i class="fa fa-desktop"></i> <?php esc_html_e('Live Preview','xgenious');?></a>
                </div>
                <div class="social-share">
                    <ul>
                        <li class="title"><?php esc_html_e('Share:','xgenious');?></li>
                        <li><a href="<?php echo esc_url($facebook_share_link);?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php echo esc_url($twitter_share_link);?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="<?php echo esc_url($linkedin_share_link);?>"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="<?php echo esc_url($pinterest_share_link);?>"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif;?>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>

</div><!-- #post-<?php the_ID(); ?> -->
