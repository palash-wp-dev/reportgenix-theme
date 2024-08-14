
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

$table_of_content_options = get_post_meta(get_the_ID(),'xgenious_table_of_content_options',true);
$blog_single_right_side_content_options = get_post_meta(get_the_ID(),'xgenious_blog_single_right_side_content_options',true);
$table_of_content_repeater_list = isset($table_of_content_options['table-of-content-repeater']) && !empty($table_of_content_options['table-of-content-repeater']) ? $table_of_content_options['table-of-content-repeater'] : [] ;

$banner_content_repeater_list = isset($blog_single_right_side_content_options['banner-content-repeater']) && !empty($blog_single_right_side_content_options['banner-content-repeater']) ? $blog_single_right_side_content_options['banner-content-repeater'] : [] ;

$banner_left_image = isset($table_of_content_options['banner-left']) && !empty($table_of_content_options['banner-left']) ? $table_of_content_options['banner-left'] : '';
$banner_left_image_link = isset($table_of_content_options['banner-left-link']) && !empty($table_of_content_options['banner-left-link']) ? $table_of_content_options['banner-left-link'] : '';

$related_posts_meta = get_post_meta(get_the_ID(),'xgenious_related_options',true);
$showRelatedPosts = true;
if(isset($related_posts_meta['related_posts']) && !is_array($related_posts_meta['related_posts'])) {
    $showRelatedPosts = false;
}
$related_title = isset($related_posts_meta['title']) && !empty($related_posts_meta['title']) ? $related_posts_meta['title'] : esc_html__('You May Also Like','xgenious');

?>

<div class="reportgenix-single-blog-part pt-120">
    <main class="site-main">
        <div class="single-blog-header">
            <div class="container">

            </div>
        </div>
        <div class="single-blog-main-wraper">
            <div class="container">
                <div class="single-blog-main-wraper-inner">
                    <div class="row">
                        <div class="col-md-9">
                            <?php while( have_posts() ) : the_post(); ?>
                            <div class="single-blog-body-wraper">
                                    <?php
                                    if (has_post_thumbnail() || !empty($post_meta_gallery) ):
                                        $get_post_format = get_post_format();
                                        if ('video' == $get_post_format || 'gallery' == $get_post_format){
                                            get_template_part('template-parts/common/thumbnail',$get_post_format);
                                        }else{
                                            get_template_part('template-parts/common/thumbnail');
                                        }
                                    endif;
                                    wp_reset_query();
                                    ?>
                                <div class="date-comment-tag">
                                    <span class="date me-4">
                                        <img src="<?php echo XGENIOUS_IMG; ?>/reportgenix-blog/clock-icon.png" alt="clock">
                                        <span class="text"><?php echo get_the_date( 'd F Y' ); ?></span>
                                    </span>
                                    <span class="comment me-4">
                                        <?php
                                        global $post;
                                        $total_count = get_comments_number( $post->ID );
                                        if ( $total_count ) :
                                        ?>
                                        <img src="<?php echo XGENIOUS_IMG; ?>/reportgenix-blog/chat-icon.png" alt="comment">
                                        <span class="text"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $total_count ) ); ?> COMMENTS</span>
                                        <?php endif; ?>
                                    </span>
                                    <span class="user">
                                        <?php
                                        $post_tags = get_the_tags();
                                        if ( $post_tags ) :
                                        ?>
                                        <img src="<?php echo XGENIOUS_IMG; ?>/reportgenix-blog/tag-icon.png" alt="tag">
                                        <span class="text">
                                        <?php
                                        $first_tag = $post_tags[0];
                                        printf( esc_html__( '%s', 'xgenious' ), esc_html( $first_tag->name ) );
                                        ?>
                                        </span>
                                        <?php endif; ?>
                                    </span>
                                </div>
                                <div class="single-blog-main-heading">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                                <div class="single-blog-body"><?php the_content(); ?></div>

                                <div class="report-devider"></div>
                                <?php
                                $meta_csf = get_post_meta(get_the_ID(), 'xgenious_related_tags', true);
                                $related_tags_title = ! empty( $meta_csf['related_tags_title'] ) ? $meta_csf['related_tags_title'] : '';
                                $all_related_tags = ! empty( $meta_csf['all_related_tags'] ) ? $meta_csf['all_related_tags'] : '';
                                ?>
                                <div class="related_tags">
                                    <h2><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $related_tags_title ) ); ?></h2>
                                    <ul>
                                        <?php
                                        if ( $all_related_tags ) : foreach ( $all_related_tags as $list_item ) :
                                            $tag = get_tag( $list_item );
                                            $tag_name = $tag->name;
                                            $tag_slug = $tag->slug; // Replace with the slug of the tag you want to link to
                                            $tag_link = get_tag_link(get_term_by('slug', $tag_slug, 'post_tag'));
                                        ?>
                                        <li class="tag_list">
                                            <a href="<?php echo esc_url( $tag_link ); ?>">
                                                <?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $tag_name ) ) ; ?>
                                            </a>
                                        </li>
                                        <?php endforeach; endif; ?>
                                    </ul>
                                </div>
                                <?php
                                $hexcoupon_url = urlencode_deep( get_permalink() );
                                $hexcoupon_title = str_replace( ' ','%20',get_the_title( $post->ID ) );

                                $post_share = get_post_meta( get_the_ID(), 'xgenious_post_share', true );
                                $post_share_title = ! empty( $post_share['post_share_title'] ) ? $post_share['post_share_title'] : '';
                                $enable_facebook_share = ! empty( $post_share['enable_facebook_share'] ) ? $post_share['enable_facebook_share'] : '';
                                $enable_twitter_share = ! empty( $post_share['enable_twitter_share'] ) ? $post_share['enable_twitter_share'] : '';
                                $enable_linkedin_share = ! empty( $post_share['enable_linkedin_share'] ) ? $post_share['enable_linkedin_share'] : '';
                                $enable_vimeo_share = ! empty( $post_share['enable_vimeo_share'] ) ? $post_share['enable_vimeo_share'] : '';

                                //all social share link generate
                                $facebook_share_link = 'https://www.facebook.com/sharer/sharer.php?u=' . $hexcoupon_url;
                                $twitter_share_link = 'https://twitter.com/intent/tweet?text='.$hexcoupon_title.'&amp;url='.$hexcoupon_url.'&amp;via=Crunchify';
                                $linkedin_share_link = 'https://www.linkedin.com/shareArticle?mini=true&url='.$hexcoupon_url.'&amp;title='.$hexcoupon_title;
                                $vimeo_share_link = 'https://vimeo.com/upload?url=' . urlencode($hexcoupon_url);

                                ?>
                                <div class="blog_single_social_share">
                                    <h2><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $post_share_title ) ); ?></h2>
                                    <ul class="social-share">
                                        <?php if ( '1' == $enable_facebook_share ) : ?>
                                        <li><a class="facebook" href="<?php echo esc_url( $facebook_share_link ); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                        <?php endif; ?>
                                        <?php if ( '1' == $enable_twitter_share ) : ?>
                                        <li><a class="twitter" href="<?php echo esc_url( $twitter_share_link ); ?>"><i class="fab fa-twitter"></i></a></li>
                                        <?php endif; ?>
                                        <?php if ( '1' == $enable_linkedin_share ) : ?>
                                        <li><a class="linkedin" href="<?php echo esc_url( $linkedin_share_link ); ?>"><i class="fab fa-linkedin"></i></a></li>
                                        <?php endif; ?>
                                        <?php if( '1' == $enable_vimeo_share ) : ?>
                                        <li><a class="pinterest" href="<?php echo esc_url( $vimeo_share_link ); ?>"><i class="fab fa-vimeo"></i></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>

                                <div class="blog-writer">
                                    <div class="writer-img">
                                        <?php echo get_avatar(  get_the_author_meta( 'ID' ) ); ?>
                                    </div>
                                    <div class="writer-info">
                                        <?php
                                        $author_id = $post->post_author;
                                        $author_name = get_the_author_meta( 'display_name', $author_id );
                                        $author_description = get_the_author_meta( 'description', $author_id );
                                        ?>
                                        <div class="writer-name"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $author_name ) ); ?></div>
                                        <div class="writer-text">
                                            <?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $author_description ) ); ?>
                                        </div>
                                        <?php
                                        if ( ! empty( cs_get_option('enable_user_profile_link') ) && true == cs_get_option('enable_user_profile_link') ) :

                                            $user_facebook_profile_url = ! empty( get_the_author_meta('user_facebook_profile' ) ) ? get_the_author_meta('user_facebook_profile' ) : '';
                                            $user_twitter_profile_url = ! empty( get_the_author_meta('user_twitter_profile' ) ) ? get_the_author_meta('user_twitter_profile' ) : '';
                                            $user_instagram_profile_url = ! empty( get_the_author_meta('user_instagram_profile' ) ) ? get_the_author_meta('user_instagram_profile' ) : '';
                                            $user_youtube_profile = ! empty( get_the_author_meta('user_youtube_profile' ) ) ? get_the_author_meta('user_youtube_profile' ) : '';
                                        ?>
                                        <div class="writer-social-icon">
                                            <a href="<?php echo esc_url( $user_facebook_profile_url ); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                                            <a href="<?php echo esc_url( $user_twitter_profile_url ); ?>"><i class="fa-brands fa-twitter"></i></a>
                                            <a href="<?php echo esc_url( $user_instagram_profile_url ); ?>"><i class="fa-brands fa-linkedin-in"></i></a>
                                            <a href="<?php echo esc_url( $user_youtube_profile ); ?>"><i class="fa-brands fa-vimeo-v"></i></a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sidebar-wraper">
                                <div class="table-of-content single-sidebar-wraper mb-30">
                                    <?php
                                    $meta_csf = get_post_meta(get_the_ID(), 'xgenious-metabox-field', true);
                                    $tba_section_title = $meta_csf['tba-section-title'];
                                    ?>
                                    <h5 class="sidebar-heading"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $tba_section_title ) ) ?></h5>
                                    <div class="after-heading-line"></div>
                                    <div class="table-of-contnets mt-3">
                                        <?php
                                        if (!empty($meta_csf['tba-meta-field'])) {
                                            foreach ($meta_csf['tba-meta-field'] as $repeater_value) {
                                                $meta_field_title = $repeater_value['meta-field-title'];
                                                $meta_field_id = strtolower($repeater_value['meta-field-id']);
                                                $meta_field_id = str_replace(' ', '-', $meta_field_id);
                                                ?>
                                                <p>
                                                    <a href="#<?php echo esc_attr($meta_field_id); ?>">
                                                        <?php echo esc_html($meta_field_title); ?>
                                                    </a>
                                                </p>
                                            <?php }
                                        } ?>
                                    </div>
                                </div>

                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php get_footer(); ?>