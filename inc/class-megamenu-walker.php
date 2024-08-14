<?php

/**
 * Package Appside
 * Author Irtech
 * @since 2.0.0
 * */

if (!defined('ABSPATH')){
	exit(); //exit if access directly
}

class Xgenious_Megamenu_Walker extends Walker_Nav_Menu{

    
    

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$object = $item->object;
		$type = $item->type;
		$title = $item->title;
		$description = $item->description;
		$permalink = $item->url;
		$megamenu_data = get_post_meta( $item->ID, '_xgenious_menu_options', true );
		//If globally disable mega menu then remove
		$megamenu = '';
		
		$all_li_classes = is_array($item->classes) ?  implode(" ", $item->classes) :   $item->classes;
		$output .= "<li class='" . $all_li_classes ;

		if($depth == 0 && !empty($megamenu_data['enable_mega_menu']) && $megamenu_data['enable_mega_menu'] == 1)
		{
			$output .= "  xgenious-megamenu ";
		}

        if(!empty($megamenu_data['subtitle'])){
            $output .= "  has-subtitle ";
        }
        
		$output .= "'>";
        if(!empty($megamenu_data['subtitle'])){
            $subtitle_theme = $megamenu_data['subtitle_theme'] ?? '';
            $output .= '<span class="subtitle '.$subtitle_theme.'">'.$megamenu_data['subtitle'].'</span>';
        }
		$output .= '<a href="'.esc_url($permalink).'">';
		$output .= $title;
		$output .= '</a>';
		
	    if(!empty($megamenu_data['enable_mega_menu']) && $megamenu_data['enable_mega_menu'] == 1){
	        if($depth == 0 && !empty($megamenu_data['elementor_template']))
    		{
    			if(!empty($megamenu_data['elementor_template']) && defined("ELEMENTOR_VERSION"))
    			{
    				$output .= '<div class="elementor-megamenu-wrap xgenious-megamenu-wapper"> '. \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($megamenu_data['elementor_template']).'</div>';
    			}
    		}
	    }
		
	}
}