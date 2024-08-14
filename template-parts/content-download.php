<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xgenious
 */
$xgenious = Xgenious();
$img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false ;
$img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'xgenious_product',false) : '';
$img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
$img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';

$terms = get_the_terms( get_the_ID(), 'download_category' );
$taxonomy_markup = '';
if(!empty($terms)){
    foreach($terms as $term){
        $meta = get_term_meta( $term->term_id, 'xgenious_taxonomy_options', true );
        if(!empty($meta['category_image'])){
            $taxonomy_markup .= sprintf(' <a href="%1$s" class="single-wordpress-theme-logo"><img src="%2$s" alt="%3$s"></a>',
                get_term_link($term->term_id,'download_category'),
                esc_url($meta['category_image']['url']),
                esc_url($meta['category_image']['title'])
            );
        }
    }
}

// print_r($terms);
// //download metabox
// $_cut_price = get_post_meta(get_the_ID(),'xgenious_cut_price',true);
// $_rating = get_post_meta(get_the_ID(),'xgenious_rating',true);
// $_rating = !empty($_rating) ? $_rating : '';
// $_rating_count = get_post_meta(get_the_ID(),'xgenious_rating_count',true);
// $demo_url = get_post_meta(get_the_ID(),'xgenious_demo_url',true);
// $product_type = get_post_meta(get_the_ID(),'xgenious_type',true);
// $envato_product_id = get_post_meta(get_the_ID(),'xgenious_envato_product_id',true);
// $average_rating = !empty($_rating) ? ($_rating * 100 ) / 5 : 0;

//  //if sales number not avilable extact it form envato
//     $item_sales = get_post_meta(get_the_ID(),'_edd_download_sales',true);
//     if($item_sales == 0 && !empty($envato_product_id)){
//         $item_price = \Xgenious_Envato::get_product_sales_by_id($envato_product_id);
//         update_post_meta(get_the_ID(),'_edd_download_sales',$item_price);
//     }
                        
?>
<div class="col-lg-6 col-md-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('single-wordpress-theme section-bg-3 theme-padding radius-10'); ?>>
        <div class="single-wordpress-theme-thumb">
            <a href="<?php the_permalink();?>"> <img src="<?php echo esc_url($img_url);?>" alt="<?php echo esc_attr($img_alt);?>"></a>
           <?php echo wp_kses_post($taxonomy_markup);?>
        </div>
        <div class="single-wordpress-theme-contents mt-4">
            <h3 class="single-wordpress-theme-contents-title"> <a href="<?php the_permalink();?>"> <?php the_title();?> </a> </h3>
            <!--<p class="single-wordpress-theme-contents-para mt-3"> <?php //xgenious_excerpt(20);?> </p>-->
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
</div>
