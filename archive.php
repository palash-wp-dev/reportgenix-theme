<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xgenious
 */

get_header();
$page_layout_options = Xgenious_Group_Fields_Value::page_layout_options('archive');
?>

    <div id="primary" class="content-area archive-page-content-area padding-120">
        <main id="main" class="site-main">
            <div class="container_1430">
                <div class="row">
                    <div class="col-lg-12">
						<?php if ( have_posts() ) : ?>

						    <div class="row">
						        <?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;
							?>
						    </div>
                            
                            <div class="col-lg-12">
                                <div class="blog-pagination">
    								<?php Xgenious()->post_pagination();?>
                                </div>
                            </div>

						<?php
						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
                    </div>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php

get_footer();
