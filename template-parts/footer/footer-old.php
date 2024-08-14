<?php
/**
 * The template for displaying the footer style one
 *
 * @package xgenious
 */
$copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text'): esc_html__('Xgenious Theme Developed by Ir-Tech','xgenious');
$copyright_text = str_replace('{copy}','&copy;',$copyright_text);
$copyright_text = str_replace('{year}',date('Y'),$copyright_text);
?>

<footer class="footer-area">
    <?php get_template_part('template-parts/common/footer-widget'); ?>
    <div class="copyright-area">
        <div class="container container_1430">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-inner">
	                    <?php
	                    echo wp_kses($copyright_text,Xgenious()->kses_allowed_html(array('a')));
	                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>