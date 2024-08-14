<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit(); //exit if access directly
}
$xgenious = Xgenious();
global  $theme_customize_css;
$theme_customize_css = '';

ob_start();


$theme_customize_css = ob_get_clean();
