<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package xgenious
 */

get_header();
$page_layout_meta = Xgenious_Group_Fields_Value::page_layout_options('blog_single');
$fb_share_url = 'https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u='.get_the_permalink().'&display=popup&ref=plugin&src=share_button';
$twitter_url = 'https://twitter.com/intent/tweet?text='.get_the_title().'&url='.get_the_permalink().'&via=xgenious1';
$linkedin_url = 'https://www.linkedin.com/shareArticle?mini=true&url='.get_the_permalink().'&title='.get_the_title();
?>
    <div id="primary" class="content-area blog-details-page padding-120 blog-details-area">
        <main id="main" class="site-main">
            <div class="blog-details-share">
                <h4 class="blog-details-share-content-title"> Share: </h4>
                <ul class="blog-details-share-social list-style-none">
                    <li class="blog-details-share-social-list">
                        <a class="blog-details-share-social-list-icon" target="_blank" href="<?php echo esc_url($fb_share_url);?>"> <i class="fa fa-facebook-f"></i> </a>
                    </li>
                    <li class="blog-details-share-social-list">
                        <a class="blog-details-share-social-list-icon" target="_blank" href="<?php echo esc_url($twitter_url);?>"> <i class="fa fa-twitter"></i> </a>
                    </li>
                    <!--<li class="blog-details-share-social-list">-->
                    <!--    <a class="blog-details-share-social-list-icon" target="_blank" href="javascript:void(0)"> <i class="fa fa-pinterest-p"></i> </a>-->
                    <!--</li>-->
                    <li class="blog-details-share-social-list">
                        <a class="blog-details-share-social-list-icon" target="_blank" href="<?php echo esc_url($linkedin_url);?>"> <i class="fa fa-linkedin"></i> </a>
                    </li>
                    <!--<li class="blog-details-share-social-list">-->
                    <!--    <a class="blog-details-share-social-list-icon" target="_blank" href="javascript:void(0)"> <i class="fa fa-instagram"></i> </a>-->
                    <!--</li>-->
                </ul>
            </div>
            <div class="container container_1430">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-blog-details">
                            <div class="single-blog-details-thumb">
				                <?php
				                if (has_post_thumbnail() || !empty($post_meta_gallery) ):
					                $get_post_format = get_post_format();
					                if ('video' == $get_post_format || 'gallery' == $get_post_format){
						                get_template_part('template-parts/common/thumbnail',$get_post_format);
					                }else{
						                get_template_part('template-parts/common/thumbnail');
					                }
				                endif;
				                ?>
                            </div>
                        </div>
                    </div>
                    <div class="<?php echo esc_attr($page_layout_meta['content_column_class']);?>">
						<?php
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content', 'single' );
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() || get_option( 'thread_comments' )) :
								comments_template();
							endif;
						endwhile; // End of the loop.
						?>
                    </div>
					<?php if ($page_layout_meta['sidebar_enable']): ?>
                        <div class="<?php echo esc_attr($page_layout_meta['sidebar_column_class']);?>">
							<?php get_sidebar();?>
                        </div>
					<?php endif; ?>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
