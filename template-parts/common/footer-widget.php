<?php
/**
 * this template parts for displaying footer widget area
 * @sicne 1.0.0
 * */
if (!is_active_sidebar('footer-widget')){
	return;
}
$copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text'): esc_html__('Copyright © 2023 Cortex. All rights reserved.','xgenious');
$copyright_text = str_replace('{copy}','&copy;',$copyright_text);
$copyright_text = str_replace('{year}',date('Y'),$copyright_text);
?>
<div class="report-free-trial pt-80 pb-80" style="background-image:url('<?php echo XGENIOUS_IMG; ?>/BG09.png')">
	<div class="container">
		<div class="free-trial-wraper d-flex justify-content-between align-items-center">
			<div class="heading">
                <?php
                 $footer_area_title = ! empty( cs_get_option( 'footer_area_title' ) ) ? cs_get_option( 'footer_area_title' ) : '';
                 printf( esc_html__( '%s', 'xgenious' ), esc_html( $footer_area_title ) );
                ?>
            </div>
			<div class="free-trial-btn">
                <?php
                $footer_button_one_link = ! empty( cs_get_option( 'footer_button_one_link' ) ) ? cs_get_option( 'footer_button_one_link' ) : '';
                $footer_button_one_enable = cs_get_option('footer_button_one_enable');

                $footer_button_two_link = ! empty( cs_get_option( 'footer_button_two_link' ) ) ? cs_get_option( 'footer_button_two_link' ) : '';
                $footer_button_two_enable = cs_get_option('footer_button_one_enable');
                ?>
                <?php
                if ( ! empty( $footer_button_one_enable ) && '1' == $footer_button_one_enable ) :
                $footer_button_one_text = cs_get_option('footer_button_one_text');
                ?>
				<a href="<?php echo esc_url( $footer_button_one_link ); ?>" class="report-cmn-btn blue-btn me-md-3">
                    <?php printf(esc_html__('%s', 'xgenious'), esc_html($footer_button_one_text)); ?>
                    <span class="ms-2"><i class="fa-solid fa-arrow-right"></i></span>
                    <?php endif; ?>
                </a>
                <?php
                if ( ! empty( $footer_button_two_enable ) && '1' == $footer_button_two_enable ) :
                $footer_button_two_text = cs_get_option('footer_button_two_text');
                ?>
				<a href="<?php echo esc_url( $footer_button_two_link ); ?>" class="report-cmn-btn black-btn">
                    <?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $footer_button_two_text ) ); ?>
                    <span class="ms-2"><i class="fa-solid fa-arrow-right"></i></span>
                    <?php endif; ?>
                </a>
			</div>
		</div>
	</div>
</div>
<footer class="reportgenix-footer-area pt-120">
	<div class="container">
		<div class="footer-area-wraper pb-120">
			<div class="row g-lg-4 g-sm-5 g-4">
				<?php dynamic_sidebar('footer-widget');?>
			</div>
		</div>
	</div>
	<div class="copyright-area">
        <div class="container">
			<div class="copyright-area-wraper">
				<span class="copyright-left text-center">
					<?php echo wp_kses($copyright_text,Xgenious()->kses_allowed_html(array('a'))); ?>
				</span>
                <?php
                $args = array(
                    'theme_location' => 'footer-bottom',
                    'container' => 'div',
                    'container_class' => 'copyright-right',
                    'container_id' => 'reportgenix-bottom-menu',
                );
                wp_nav_menu( $args );
                ?>
			</div>
        </div>
    </div>
</footer>
