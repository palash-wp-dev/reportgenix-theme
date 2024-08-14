<?php
$prefix = 'xgenious';
$page_id = Xgenious()->page_id();
$page_layout_meta = get_post_meta($page_id,$prefix.'_page_container_options',true);
$navbar_class = !empty($page_layout_meta['navbar_type']) ?  $page_layout_meta['navbar_type'] : 'navbar-default';
$logo_type = !empty($page_layout_meta['logo_type']) && $page_layout_meta['logo_type'] === "dark_logo" ?  $page_layout_meta['logo_type'] : '';
?>
<div class="reportgenix-nav">
<nav class="navbar navbar-area navbar-expand-lg <?php echo esc_attr($navbar_class);?> <?php echo esc_attr($logo_type)?>">
	<div class="container nav-container nav-container-02">
		<div class="responsive-mobile-menu ms-auto">
			<div class="logo-wrapper">
                <?php
                    $logo_type =  $logo_type === "dark_logo" ? 'header_white_logo' : 'header_one_logo';
                    $header_one_logo = cs_get_option($logo_type);
                    if (has_custom_logo() && empty($header_one_logo['id'])){
                        the_custom_logo();
                    }elseif (!empty($header_one_logo['id'])){
	                    printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>',get_home_url(),$header_one_logo['url'],$header_one_logo['alt']);
                    }
                    else{
                        printf('<a class="site-title" href="%1$s">%2$s</a>',get_home_url(),get_bloginfo('title'));
                    }
                ?>
			</div>
			<!-- <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#xgenious_main_menu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button> -->
            <div class="responsive-mobile-menu1 d-lg-none ms-auto">
                <a href="#" class="click-nav-right-icon">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#reportgenix-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
		</div>
        <?php
            $menu_args = array(
                'theme_location' => 'main-menu',
                'menu_class' => 'navbar-nav',
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'reportgenix-menu'
            );
            $menu_args['walker'] = new Xgenious_Megamenu_Walker();
            wp_nav_menu($menu_args);
        ?>
        <div class="nav-right-content-main-wraper d-lg-flex d-none">
            <?php 
                $navbar_button_status = cs_get_option('navbar_button_enable');
                if(!empty($navbar_button_status) && $navbar_button_status == 1):?>
                    <div class="xgn-nav-right-content"> 
                        <div class="xgn-nav-right-content-flex"> 
                            <div class="xgn-nav-right-content-item nav-right-content-item-1"> 
                                <a href="<?php echo esc_url(get_permalink(cs_get_option('navbar_button_link')));?>" class="xgn-nav-btn reportgenix-nav-btn reportgenix-nav-btn-01"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="icon-text"> <?php echo esc_html(cs_get_option('navbar_button_text'));?></span> </a> 
                            </div>
                        </div>
                    </div>
            <?php endif;?>
            <?php 
                $navbar_button_status = cs_get_option('navbar_button_two_enable');
                if(!empty($navbar_button_status) && $navbar_button_status == 1):?>
                    <div class="xgn-nav-right-content"> 
                        <div class="xgn-nav-right-content-flex"> 
                            <div class="xgn-nav-right-content-item nav-right-content-item-2"> 
                                <a href="<?php echo esc_url(get_permalink(cs_get_option('navbar_button_two_link')));?>" class="xgn-nav-btn reportgenix-nav-btn reportgenix-nav-btn-02"> <span class="icon-text"> <?php echo esc_html(cs_get_option('navbar_button_two_text'));?></span>
                                <span class="icon-two"> <i class="fa-solid fa-arrow-right"></i></span> </a> 
                            </div>
                        </div>
                    </div>
            <?php endif;?>
            <?php if (class_exists('WooCommerce')):?>
                <a class="xgenious-header-cart" href="<?php echo wc_get_cart_url(); ?>"
                title="<?php _e( 'View your shopping cart' ); ?>">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                    <span class="cart-badge"><?php echo sprintf (  '%d', WC()->cart->get_cart_contents_count() ); ?></span>
                </a>
            <?php endif;?>
        </div>
	</div>
</nav>
</div>



