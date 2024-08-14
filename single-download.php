<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package xgenious
 */

get_header();
$support_page_url = get_page_by_title('Support Policy');
$envato_product_id = get_post_meta(get_the_ID(),'xgenious_envato_product_id',true);

$_rating = get_post_meta(get_the_ID(),'xgenious_rating',true) ?? 5;
$_rating_count = get_post_meta(get_the_ID(),'xgenious_rating_count',true) ?? 1;;

//if rating not avilable extract it from envato
if(empty($_rating_count) && !empty($envato_product_id)){
    $rating_arrr = Xgenious_Envato::get_product_rating_by_id($envato_product_id,get_the_ID());
    $_rating = $rating_arrr['rating'] > 0 ?? 5;
    $_rating_count = $rating_arrr['rating_count'] > 0 ?? 1;
}

//if sales number not avilable extact it form envato
$item_sales = get_post_meta(get_the_ID(),'_edd_download_sales',true);
if(empty($item_sales) && !empty($envato_product_id)){
    $item_price = Xgenious_Envato::get_product_sales_by_id($envato_product_id);
    update_post_meta(get_the_ID(),'_edd_download_sales',$item_price);
}

//if item update date it not there extract it from envato by envato product id
$last_update = get_post_meta(get_the_ID(),'xgenious_updated_at',true);
if(empty($last_update) && !empty($envato_product_id)){
    $last_update = Xgenious_Envato::get_product_update_time_by_id($envato_product_id);
    update_post_meta(get_the_ID(),'xgenious_updated_at',$last_update);
}


$item_url = get_post_meta(get_the_ID(),'xgenious_item_url',true);
$comment_url = !empty($item_url) ? $item_url .'/comments' : '';
$support_url = !empty($item_url) ? $item_url .'/support' : 'https://xgenious51.freshdesk.com/';
$review_url = !empty($item_url) ? str_replace($envato_product_id,'reviews/'.$envato_product_id,$item_url) : '';
$product_type = get_post_meta(get_the_ID(),'xgenious_type',true);


$average_rating = !empty($_rating) ? ($_rating * 100 ) / 5 : 5;
$first_release = get_post_meta(get_the_ID(),'xgenious_published_at',true);

//
$xgenious_high_resolution = get_post_meta(get_the_ID(),'xgenious_high_resolution',true);
$xgenious_compatible_browsers = get_post_meta(get_the_ID(),'xgenious_compatible_browsers',true);
$xgenious_compatible_software = get_post_meta(get_the_ID(),'xgenious_compatible-software',true);
$xgenious_gutenberg_optimized = get_post_meta(get_the_ID(),'xgenious_gutenberg-optimized',true);
$xgenious_compatible_with = get_post_meta(get_the_ID(),'xgenious_compatible-with',true);
$xgenious_source_files_included = get_post_meta(get_the_ID(),'xgenious_source-files-included',true);
$xgenious_software_framework = get_post_meta(get_the_ID(),'xgenious_software_framework',true);
$xgenious_columns = get_post_meta(get_the_ID(),'xgenious_columns',true);
$xgenious_layout = get_post_meta(get_the_ID(),'xgenious_layout',true);

$xgenious_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full');
$thumbnail_url = is_array($xgenious_thumbnail) && !empty($xgenious_thumbnail[0]) ? $xgenious_thumbnail[0] : '' ;
$_rating = $_rating > 0 ? $_rating : 5;
?>



	<div id="primary" class="content-area download-single-page">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-selected="true"><?php esc_html_e('Overview','xgenious');?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo esc_url($comment_url);?>" target="_blank" ><?php esc_html_e('Comments','xgenious');?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo esc_url($review_url);?>" target="_blank"><?php esc_html_e('Reviews','xgenious');?></a>
							</li>
                            <li class="nav-item">
								<a class="nav-link" href="<?php echo esc_url($support_url);?>" target="_blank"><?php esc_html_e('Support','xgenious');?></a> 
<!--								<a class="nav-link" data-toggle="tab" href="#support" role="tab" aria-selected="false">--><?php //esc_html_e('Support','xgenious');?><!--</a>-->
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="overview" role="tabpanel" >
								<?php
								while ( have_posts() ) :
									the_post();
									get_template_part( 'template-parts/content', 'download-single' );
								endwhile; // End of the loop.
								?>
                            </div>
							<div class="tab-pane fade" id="support" role="tabpanel" >
                                <div class="download-support-area">
                                    <h4 class="title"><?php esc_html_e('Contact The Author','xgenious');?></h4>
                                    <p><?php esc_html_e('We provides limited support for this item through email contact form.','xgenious');?></p>
                                    <h4 class="title"><?php esc_html_e('Item support includes:','xgenious');?></h4>
                                    <ul class="correct-list">
                                        <li><?php esc_html_e('Availability of the author to answer questions','xgenious');?></li>
                                        <li><?php esc_html_e('Answering technical questions about item’s features','xgenious');?></li>
                                        <li><?php esc_html_e('Assistance with reported bugs and issues','xgenious');?></li>
                                        <li><?php esc_html_e('Help with included 3rd party assets','xgenious');?></li>
                                    </ul>
                                    <h4 class="title"><?php esc_html_e('However, item support does not include:','xgenious');?></h4>
                                    <ul class="close-list">
                                        <li><?php esc_html_e('Customization services','xgenious');?></li>
                                        <li><?php esc_html_e('Installation services','xgenious');?></li>
                                    </ul>
                                    <p class="policy-link"><?php esc_html_e('View the ','xgenious'); ?>
                                        <a href="<?php echo esc_url(get_the_permalink($support_page_url)); ?>"><?php esc_html_e('item support policy','xgenious');?></a>
                                    </p>
                                    <a href="#" class="contact-author-btn" data-toggle="modal" data-target="#support-modal"><?php esc_html_e('Contact Author','xgenious');?></a>
                                </div>
                            </div>
						</div>
					</div>
					<div class="col-lg-4">
                        <div class="download-widget-area">
                            <div class="widget download-widget">
                                <div class="regular-license">
                                    <h4 class="title"><?php esc_html_e('Regular License','xgenous');?></h4>
                                    <div class="price-wrap">
	                                    <?php  edd_price(get_the_ID()); ?>
                                    </div>
                                </div>
                                <div class="envato-quote">
                                    <ul class="check-list">
                                        <li><?php esc_html_e('Free technical support','xgenous');?></li>
                                        <li><?php esc_html_e('Future product updates','xgenous');?></li>
                                        <li><?php esc_html_e('Quality checked by Envato','xgenous');?></li>
                                        <li><?php esc_html_e('Lowest price guarantee','xgenous');?></li>
                                        <li><?php esc_html_e('6 months support from Xgenious','xgenous');?></li>
                                    </ul>
                                </div>
                                <!--- https://codecanyon.net/checkout/from_item/33858909?license=regular&aid=xgenious&aso=xgenius&aca=website -->
	                            <?php  if ($product_type == 'envato') printf('<div class="btn-wrapper"><a href="%1$s" target="_blank" class="envato_purcahse_btn">%2$s</a></div>',esc_url('https://codecanyon.net/checkout/from_item/'.$envato_product_id.'?license=regular&aid=xgenious&aso=xgenius-website&aca=purchase-btn-click'),esc_attr('Purchase Now','xgenious')); ?>
                            </div>
<!--                            --><?php //if (!empty($item_sales)):?>
<!--                            <div class="widget download-widget">-->
<!--                                <div class="sales-count">-->
<!--                                    <h4 class="sales"><i class="fa fa-shopping-cart" aria-hidden="true"></i> --><?php //echo esc_html($item_sales);?><!-- <span>--><?php //esc_html_e(' Sales','xgenious');?><!--</span></h4>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            --><?php //endif;?>
	                        <?php if (!empty($_rating_count) && $_rating_count >= 3 ):?>
                            <!--<div class="widget download-widget">-->
                            <!--   <div class="rating-wrap">-->
                            <!--        <h5 class="rating-title"><?php //esc_html_e('Item Rating: ','xgenious');?> </h5>-->
                            <!--       <div class="ratings">-->
                            <!--           <span class="hide-rating"></span>-->
                            <!--           <span class="show-rating" style="width: <?php //echo esc_attr($average_rating.'%');?>"></span>-->
                            <!--       </div>-->
	                           <!--    <span class="count">(<?php //echo esc_html($_rating_count);?>)</span>-->
                            <!--   </div>-->
                            <!--</div>-->
                            <?php endif;?>
                            <div class="widget download-widget">
                                <!--<?php //if(!empty($last_update)):?>-->
                                <!--<div class="info-block-area">-->
                                <!--    <h5 class="title"><?php esc_html_e('Last Update','xgenious');?></h5>-->
                                <!--    <span class="details"><?php echo date('d F Y',strtotime($last_update));?></span>-->
                                <!--</div>-->
                                <!--<?php //endif;?>-->
                                <!--<div class="info-block-area">-->
	                               <!-- <h5 class="title"><?php esc_html_e('First Release','xgenious');?></h5>-->
	                               <!-- <span class="details"><?php echo date('d F Y',strtotime($first_release));?></span>-->
                                <!--</div>-->
	                            <div class="info-block-area">
	                                <h5 class="title"><?php esc_html_e('Documentation','xgenious');?></h5>
	                                <span class="details"><?php esc_html_e('Yes','xgenious');?></span>
                                </div>
	                            <?php if (!empty($xgenious_high_resolution) && $xgenious_high_resolution == 1):?>
		                            <div class="info-block-area">
			                            <h5 class="title"><?php esc_html_e('High Resolution','xgenious');?></h5>
			                            <span class="details"><?php esc_html_e('Yes','xgenious');?></span>
		                            </div>
	                            <?php endif;?>
	                            <?php if (!empty($xgenious_compatible_browsers)):?>
		                            <div class="info-block-area">
			                            <h5 class="title"><?php esc_html_e('Compatible Browsers','xgenious');?></h5>
			                            <span class="details"><?php echo esc_html($xgenious_compatible_browsers);?></span>
		                            </div>
	                            <?php endif;?>
	                            <?php if (!empty($xgenious_compatible_software)):?>
		                            <div class="info-block-area">
			                            <h5 class="title"><?php esc_html_e('Software Version','xgenious');?></h5>
			                            <span class="details"><?php echo esc_html($xgenious_compatible_software);?></span>
		                            </div>
	                            <?php endif;?>
	                            <?php if (!empty($xgenious_gutenberg_optimized) && $xgenious_gutenberg_optimized == 1):?>
		                            <div class="info-block-area">
			                            <h5 class="title"><?php esc_html_e('Gutenberg Optimized','xgenious');?></h5>
			                            <span class="details"><?php esc_html_e('Yes','xgenious');?></span>
		                            </div>
	                            <?php endif;?>
	                            <?php if (!empty($xgenious_compatible_with) ):?>
		                            <div class="info-block-area">
			                            <h5 class="title"><?php esc_html_e('Compatible With','xgenious');?></h5>
										<span class="details">
										<?php 
											if(is_array($xgenious_compatible_with)){
												echo esc_html(implode(' , ',$xgenious_compatible_with));
											}
										?>
										</span>
		                            </div>
	                            <?php endif;?>
                                <?php if (!empty($xgenious_software_framework) ):?>
		                            <div class="info-block-area">
			                            <h5 class="title"><?php esc_html_e('Software Framework','xgenious');?></h5>
			                            <span class="details"><?php echo esc_html($xgenious_software_framework);?></span>
		                            </div>
	                            <?php endif;?>

	                            <?php if (!empty($xgenious_columns) ):?>
		                            <div class="info-block-area">
			                            <h5 class="title"><?php esc_html_e('Columns','xgenious');?></h5>
			                            <span class="details"><?php echo esc_html($xgenious_columns);?></span>
		                            </div>
	                            <?php endif;?>
	                            <?php if (!empty($xgenious_layout) ):?>
		                            <div class="info-block-area">
			                            <h5 class="title"><?php esc_html_e('Layout','xgenious');?></h5>
			                            <span class="details"><?php echo esc_html($xgenious_layout);?></span>
		                            </div>
	                            <?php endif;?>

	                            <?php if (!empty($xgenious_source_files_included) ):?>
		                            <div class="info-block-area">
			                            <h5 class="title"><?php esc_html_e('Files Included','xgenious');?></h5>
			                            <span class="details"><?php echo esc_html($xgenious_source_files_included);?></span>
		                            </div>
	                            <?php endif;?>
	                            <?php
	                            $tags = wp_get_post_terms(get_the_ID(),'download_tag');
	                            if(!empty($tags)):?>
	                            <div class="info-block-area">
		                            <h5 class="title"><?php esc_html_e('Tags','xgenious');?></h5>
		                            <div class="tags">
										<?php
											foreach ($tags as $terms){
												printf('<a href="%1$s">%2$s</a>',get_term_link($terms->term_id,'download_tag'),$terms->name);
											}
										?>
                                    </div>
	                            </div>
	                            <?php endif;?>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

    <!-- Modal -->
    <div class="modal fade item-support-modal" id="support-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content download-support-modal">
                <div class="modal-header">
                    <h5 class="modal-title" ><?php esc_html_e('Send an email to the author','xgenious');?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
	            <form action="" class="item-support-mail-form" method="post" enctype="multipart/form-data">
	                <div class="modal-body">

	                        <?php wp_nonce_field('xgenious_item_support');?>
	                        <input type="hidden" name="action" value="xgenious_item_support_mail">
	                        <input type="hidden" name="item_title" value="<?php echo esc_html(strip_tags(get_the_title()))?>">
	                        <input type="hidden" name="subject" value="<?php echo 'Support Message For'. esc_html(strip_tags(get_the_title()))?>">
	                        <div class="form-group">
	                            <input type="text" name="name" class="form-control" placeholder="<?php esc_html_e('Your Name','xgenious');?>">
	                        </div>
	                        <div class="form-group">
	                            <input type="email" name="email" class="form-control" placeholder="<?php esc_html_e('Your Email','xgenious');?>">
	                        </div>
	                        <div class="form-group textarea">
	                            <textarea name="message" id="support_message" class="form-control" cols="30" rows="10" placeholder="<?php esc_html_e('Your Message','xgenous');?>"></textarea>
	                        </div>
	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php esc_html_e('Cancel','xgenious');?></button>
	                    <button type="button" class="btn btn-primary item-support-form-submit-btn"><?php esc_html_e('Send Message','xgenoius');?></button>
	                </div>
	            </form>
            </div>
        </div>
    </div>
<?php
get_footer();
