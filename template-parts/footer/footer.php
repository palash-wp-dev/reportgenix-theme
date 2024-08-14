<?php
/**
 * The template for displaying the footer style one
 *
 * @package xgenious
 */
$copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text'): esc_html__('Xgenious All Rights Reserved.','xgenious');
$copyright_text = str_replace('{copy}','&copy;',$copyright_text);
$copyright_text = str_replace('{year}',date('Y'),$copyright_text);
?>

<div class="footerWrap">
    <?php get_template_part('template-parts/common/footer-widget'); ?>
</div>