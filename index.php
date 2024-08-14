<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xgenious
 */

get_header();
$page_layout_options = Xgenious_Group_Fields_Value::page_layout_options('blog');
?>

<div class="reportgenix-all-blog pt-120 pb-60">
            <div class="container">
                <div class="blog-slide-outer">
                    <div class="blog-slider-btn"></div>
                </div>
                <div class="blog-buttons">
                    <button class="blog-filter active" data-filter="*"><?php esc_html_e( 'All Blog', 'reportgenix' ); ?></button>
                    <?php
                    $all_categories = get_categories();

                    if ( $all_categories ) :
                        foreach ( $all_categories as $category ) :
                            $tab_id = $category->slug;
                            $tab_id = str_replace( '-', '_', $tab_id );
                            ?>
                            <button class="blog-filter" data-filter=".<?php echo esc_attr( $tab_id ); ?>"><?php printf( esc_html__( '%s', 'reportgenix' ), esc_html( $category->name ) ) ?></button>
                    
                    <?php endforeach; endif; ?>
                </div>
                <div class="all-blog-wraper">
                    <div class="row grid-blog imagesLoaded-blog">                        
                            <?php while( have_posts() ) : the_post(); ?>
                            <?php 
                            $categories = get_the_category();
                            $category_class = '';
                            if (!empty($categories)) {
                                foreach ($categories as $category) {
                                    $converted_slug = str_replace( '-', '_', $category->slug );
                                    $category_class .= $converted_slug . ' ';
                                }
                            }
                            ?>
                            <div class="col-lg-4 grid-item <?php echo esc_attr( $category_class ); ?>">
                                <div class="single-blog-wraper" >
                                    <div class="single-blog">
                                        <div class="blog-head">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                $image_id = get_post_thumbnail_id(); // Get the post thumbnail ID
                                                $image_src = wp_get_attachment_image_src($image_id, 'thumbnail');

                                                if ($image_src) {
                                                    echo '<img src="' . esc_url($image_src[0]) . '" alt="' . esc_attr(get_the_title()) . '">';
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="blog-body">
                                            <div class="body-top">
                                                <div class="dates">
                                                    <span class="date"><?php echo get_the_date( 'd M Y' ); ?></span>
                                                </div>
                                                <div class="comments">
                                                    <?php
                                                    $comments_number = get_comments_number();
                                                    if ( 0 == $comments_number ) {
                                                        $comments_text = ' COMMENT';
                                                    } else if ( 1 == $comments_number ) {
                                                        $comments_text = ' COMMENT';
                                                    } else {
                                                        $comments_text = ' COMMENTS';
                                                    }
                                                    ?>
                                                    <span class="comment"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $comments_number ) ); printf( esc_html__( '%s', 'xgenious' ), esc_html( $comments_text ) ); ?></span>
                                                </div>
                                            </div>
                                            <h3 class="blog-heading report-third-heading">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <div class="blog-foot">
                                                <a href="<?php the_permalink(); ?>" class="load-more-btn">
                                                    <span><?php echo esc_html( 'LOAD MORE', 'xgenious' ); ?></span>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>

<?php
get_footer();
