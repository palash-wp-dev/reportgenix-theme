<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xgenious
 */

get_header();
$archive_page_items = !empty(cs_get_option('download_archive_item')) ? cs_get_option('download_archive_item') : 9;
//custom archive query
$paged = get_query_var('page') ? get_query_var('page') : 1;
$paged       = absint( $paged );
$query_args          = array(
	'post_type'      => 'download',
	'post_status'    => 'publish',
	'posts_per_page' => $archive_page_items,
	'orderby'        => 'ID',
	'order'          => 'DESC',
	'paged' => $paged,
);

$orderby             = isset( $_GET['orderby'] ) && ! empty( $_GET['orderby'] ) ? $_GET['orderby'] : '';
$category            = isset( $_GET['cat'] ) && ! empty( $_GET['cat'] ) ? $_GET['cat'] : '';
if ( ! empty( $orderby ) ) {
	switch ( $orderby ) {
		case( "best_sold" ):
			$query_args['meta_key'] = '_edd_download_sales';
			$query_args['orderby'] = 'meta_value_num';
			break;
		case( "best_ratings" ):
			$query_args['meta_key'] = 'xgenious_rating_count';
			$query_args['orderby'] = 'meta_value_num';
			break;
		case( "high_price" ):
			$query_args['meta_key'] = 'edd_price';
			$query_args['orderby'] = 'meta_value_num';
			break;
		case( "low_price" ):
			$query_args['meta_key'] = 'edd_price';
			$query_args['orderby'] = 'meta_value_num';
			$query_args['order'] = 'ASC';
			break;
		default:
			break;
	}

}
if ( ! empty( $category ) ) {
	$query_args['tax_query'] = array(
		array(
			'taxonomy' => 'download_category',
			'field'    => 'slug',
			'terms'    => $category,
		)
	);
}
$search_query = isset( $_GET['search'] ) && ! empty( $_GET['search'] ) ? $_GET['search'] : '';
if (!empty($search_query)){
	//custom search
	$query_args = array (
		'post_type'      => 'download',
		'post_status'    => 'publish',
		'posts_per_page' => $archive_page_items,
		'orderby'        => 'ID',
		'order'          => 'DESC',
		'paged' => $paged,
		's' => $search_query
	);
}


$all_downloads = new WP_Query( $query_args );

$enable_featured_product = cs_get_option('enable_featured_product');
$featured_product_elementor_template = cs_get_option('featured_product_elementor_template');
?>
    <div id="primary" class="content-area archive-page-content-area download-archive-page padding-120">
        <main id="main" class="site-main">
            <div class="container container_1430">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <?php
                        
                        if(!empty($enable_featured_product) && $enable_featured_product == 1):
                		if(!empty($featured_product_elementor_template) && defined("ELEMENTOR_VERSION")): ?>
                			<div class="our_product_page_featured_product"> <?php echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($featured_product_elementor_template); ?></div>
                			
                	    <?php 
                	    endif; 
                	    endif; 
                        ?>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="download-archive-top-content">
	                        <form action="<?php home_url('/');?>" method="get" id="ordering_form">
                            <div class="category-dropdown">
                                <select name="cat" id="category" onchange="document.getElementById('ordering_form').submit();">
                                    <option value=""><?php esc_html_e('Select Category','xgenious');?></option>
                                    <?php
                                        $all_category = get_terms('download_category');
                                        foreach ($all_category as $cat){
	                                        $seleted = $cat->slug == $category ? 'selected' : '';
	                                        printf('<option %3$s value="%1$s">%2$s (%4$s)</option>',esc_attr($cat->slug), esc_attr($cat->name),$seleted,esc_attr($cat->count));
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="order-dropdown">
                                <select name="orderby" id="orderby" onchange="document.getElementById('ordering_form').submit();">
                                    <?php
                                        $orderby_arr = array(
											'newsest' => esc_html__('Newest Items','xgenious'),
											'best_sold' => esc_html__('Best Selling Items','xgenious'),
											'best_ratings' => esc_html__('Best Ratings','xgenious'),
											'high_price' => esc_html__('Highest Price','xgenious'),
											'low_price' => esc_html__('Lowest Price','xgenious'),
                                        );
                                        foreach ($orderby_arr as $key => $value){
                                            $seleted = $key == $orderby ? 'selected' : '';
                                            printf('<option %3$s value="%1$s">%2$s</option>',$key, $value,$seleted);
                                        }
                                    ?>
                                </select>
                            </div>
	                        </form>
                        </div>
                    </div>
                    <div class="col-lg-12">

						<?php

						if ( $all_downloads->have_posts() ) :

							?>
							<div class="row">
							<?php
							/* Start the Loop */
							while ( $all_downloads->have_posts() ) :
								$all_downloads->the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'download' );

							endwhile;
							?>
	                        </div>
                            <div class="xgenious-downloads-pagination">
								<?php
								$big = 999999999;
								$pagination_args = array(
									'base'     => str_replace('%_%', 1 == $paged ? '' : "?page=%#%", "?page=%#%"),
									'format'   => '?page=%#%',
									'total'    => $all_downloads->max_num_pages,
									'current'  => max( 1, $paged ),
									'show_all' => false,
									'prev_text' => '<i class="fa fa-angle-double-left"></i>',
									'next_text' => '<i class="fa fa-angle-double-right"></i>',
									'prev_next' => true,
								);
								echo paginate_links( $pagination_args );
                                ?>
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
