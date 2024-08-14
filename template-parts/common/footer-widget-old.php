<?php
/**
 * this template parts for displaying footer widget area
 * @sicne 1.0.0
 * */
if (!is_active_sidebar('footer-widget')){
	return;
}
?>
<div class="newsletter-area section-bg-2 newsletter-margin padding-top-60">
	<div class="newsletter-shapes">
		<img src="<?php echo XGENIOUS_IMG; ?>/footer/shape1.svg" alt="star shape svg">
		<img src="<?php echo XGENIOUS_IMG; ?>/footer/shape2.svg" alt="half circle svg">
	</div>
	<div class="container container-1430">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="newsletter-contents text-center" id="newsleeter">
					
					<?php 
					$title_markup = cs_get_option('newsletter_title') ;
					$url = cs_get_option('newsletter_form') ?? '';
                    $title_markup = str_replace(['{c}','{/c}','{b}','{/b}'],['<span class="newsletter-contents-title-signup" >','</span>','<span class="newsletter-contents-title-span">','</span>'],$title_markup);
					
					printf('<h2 class="newsletter-contents-title">%1$s</h2>',$title_markup);
                    ?>
					
					<div class="newsletter-contents-form custom-form mt-4">
					<?php
                        $shortcode = cs_get_option('newsletter_form');
                        $shortcode = do_shortcode( shortcode_unautop( $shortcode ) );
                        echo $shortcode;
                    ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer-top newsletter-margin padding-top-40 padding-bottom-65">
	<div class="footer-shapes">
		<img src="<?php echo XGENIOUS_IMG.'/footer/shape3.svg';?>" alt="circle shape svg">
		<img src="<?php echo XGENIOUS_IMG.'/footer/shape4.svg';?>" alt="triangle shape svg">
	</div>
	<div class="container container_1430">
		<div class="row">
			<?php dynamic_sidebar('footer-widget');?>
		</div>
	</div> 
</div>