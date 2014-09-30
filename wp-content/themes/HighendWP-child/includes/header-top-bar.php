<?php 
if ( !is_home() && !is_archive() && !is_404() && !is_search())  {
    if ( vp_metabox('layout_settings.hb_header_widgets') == "hide" ) return;
    if ( !hb_options('hb_top_header_bar') && vp_metabox('layout_settings.hb_header_widgets') == "default" ) {
        return;
    }
    if ( vp_metabox('misc_settings.hb_special_header_style') ) return;
} else {
    if ( !hb_options('hb_top_header_bar') ) 
        return;
}

$top_header_container = hb_options('hb_top_header_container');

if ( isset($_GET['header']) ){
    $header_val = $_GET['header'];
    
    if ($header_val == '1-2' || $header_val == '1-4' || $header_val == '2-2' || $header_val == '2-4' || $header_val == '3-2'){
        return;
    }

    if ($header_val == 'wide'){
        $top_header_container = 'container-wide';
    }
}

global $woocommerce;

$cart_url = "";
$cart_total = "";

if ( class_exists('Woocommerce') ) {
    $cart_url = $woocommerce->cart->get_cart_url();
    $cart_total = $woocommerce->cart->get_cart_total();
}
?>
   
<!-- BEGIN #header-bar -->
<div id="header-bar" class="style-1 clearfix">

    <!-- BEGIN .container or .container-wide -->
    <div class="<?php
        if ( hb_options('hb_header_layout_style') == 'nav-type-1 nav-type-4' ) {
            echo 'container';
        } else {
            echo $top_header_container;
        }
        ?>"><!--<div id="top-map-widget" class="top-widget float-left">
        <a href="#" id="show-nav-menu" class="sm-font"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu.png"/> MENU</a>
		</div>-->
<!-- menu-->

	<!-- end menu -->
    <?php
    $header_left_text = hb_options('hb_top_header_info_text');
    $header_left_email = hb_options('hb_top_header_email');



    // Map Dropdown
    if ( hb_options('hb_top_header_map') ) { ?>
    <!-- BEGIN .top-widget Map -->
    <div id="top-map-widget" class="top-widget float-right">
        <a href="#" id="show-map-button"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/map.png" title="Location" alt="Location" /></a>
    </div>
	<div id="top-map-widget" class="top-widget float-right">
        <a href="#" id="show-map-button2"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/play.png" title="Video" alt="Video" /></a>
    </div>
	
	  
    <!-- END .top-widget -->
    <?php } 

    // Email
    if ( $header_left_email ) {
    ?>
        <!-- BEGIN .top-widget Email -->
        <div class="top-widget float-right ">
            <a  href="mailto:<?php echo $header_left_email; ?>"><img title="Mail" src="<?php echo get_stylesheet_directory_uri(); ?>/images/mail.png" alt="Mail" /></a>
        </div>
        <!-- END .top-widget -->
    <?php } 

	    if ( $header_left_text ) {            
        ?>
        <!-- BEGIN .top-widget Information -->
        <div  class="top-widget float-left <?php if (!$header_left_email) echo 'clear-r-margin'; ?>">
            <p><?php echo $header_left_text; ?></p>
        </div>
        <!-- END .top-widget -->
    <?php } 
	
	
    // Login
    if ( hb_options('hb_top_header_login') ) { ?>
    <!-- BEGIN .top-widget -->
   <!-- <div id="top-login-widget" class="top-widget float-right clear-r-margin">
                    
        <?php
            if ( !is_user_logged_in() ) {
        ?>
                <a href="#"><?php _e('Login', 'hbthemes'); ?><i class="icon-angle-down"></i></a>
               
                <div class="hb-dropdown-box login-dropdown">
                    <?php get_template_part ( 'includes/login' , 'form'); ?>
                    <div class="big-overlay"><i class="hb-moon-user"></i></div>
                </div>
               
        <?php 
            } else { 
                global $current_user;
                get_currentuserinfo();
                $admin_link_url = admin_url();

                if ( class_exists('Woocommerce') && !current_user_can( 'manage_options' ) ){
                    $myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
                    if ( $myaccount_page_id ) {
                        $admin_link_url = get_permalink( $myaccount_page_id );
                    }
                }
        ?>
                <a href="<?php echo $admin_link_url; ?>"><i class="hb-moon-user"></i><?php echo $current_user->display_name; ?><i class="icon-angle-down"></i></a>
                
                <div class="hb-dropdown-box logout-dropdown">
                    <ul>
                        <?php if ( is_user_logged_in() && class_exists('Woocommerce') && !current_user_can( 'manage_options' ) ) { ?>
                        <li>
                            <a href="<?php echo $admin_link_url; ?>" class="my-account"><i class="hb-moon-user"></i><?php _e('My Account','hbthemes'); ?></a>
                        </li>
                        <?php } else { ?>
                        <li>
                            <a href="<?php echo admin_url(); ?>"><i class="hb-moon-cog"></i><?php _e('Dashboard', 'hbthemes'); ?></a>
                        </li>
                        <?php } ?>

                        <?php if ( class_exists('Woocommerce') ) { ?>
                        <li>
                            <a href="<?php echo $cart_url; ?>" class="cart-contents"><i class="hb-moon-cart-checkout"></i><?php _e('My Cart','hbthemes'); ?></a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="<?php echo wp_logout_url( get_permalink() ); ?>"><i class="hb-moon-exit-2"></i><?php _e('Logout', 'hbthemes'); ?></a>
                        </li>
                    </ul>
                </div>
        <?php } ?>

    </div>-->
    <!-- END .top-widget -->
    <?php } ?>
    <?php
    // Language Selector
    if ( hb_options('hb_top_header_languages')  && function_exists('icl_get_languages') ) { 
        $languages = icl_get_languages('skip_missing=0&orderby=code');
    ?> 
        <!-- BEGIN .top-widget -->
        <div class="top-widget float-right">
            <a href="#" id="hb-current-lang"><span class="lang-val"><?php _e('Language', 'hbthemes'); ?></span><i class="icon-angle-down"></i></a>

            <!-- BEGIN .hb-dropdown-box -->
            <div class="hb-dropdown-box language-selector">

            <?php if ( $languages ) { ?>
                <ul>
                    <?php foreach ( $languages as $language ) {  ?>
                        <li>
                            <?php if ( $language['active'] ) { ?>
                                <a class="active-language">
                            <?php } else { ?>
                                <a href="<?php echo $language['url']; ?>">
                            <?php } ?>
                                <span class="lang-img">
                                    <img src="<?php echo $language['country_flag_url']; ?>" height="12" alt="lang" width="18">
                                </span>
                                <span class="icl_lang_sel_native"><?php echo $language['native_name']; ?></span>
                            </a>
                        </li>
                    <?php } ?>
                    
                </ul>
                

            <?php } ?>
            </div>
            <!-- END .hb-dropdown-box -->
        </div>
        <!-- END .top-widget -->
    <?php } 

    // WooCommerce checkout
    if ( hb_options('hb_top_header_checkout') && class_exists('Woocommerce') ) { ?>
        <?php /*
        <!-- BEGIN .top-widget -->
        <div id="top-cart-widget" class="top-widget float-right">
            <a href="<?php echo $cart_url; ?>"><i class="hb-moon-cart-checkout"></i><?php echo $cart_total; ?><i class="icon-angle-down"></i></a>

            <div class="hb-dropdown-box cart-dropdown">
            <?php
                // Check for WooCommerce 2.0 and display the cart widget
                if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) {
                    the_widget( 'WC_Widget_Cart', 'title= ' );
                } else {
                    the_widget( 'WooCommerce_Widget_Cart', 'title= ' );
                }
            ?>
        </div> */

        echo hb_woo_cart();
    } 

    // Custom link
    $header_custom_link = hb_options('hb_top_header_link');
    if ( $header_custom_link ) {
    ?>
        <!-- BEGIN .top-widget Custom Link -->
        <div id="top-custom-link-widget" class="top-widget float-right">
            <a href="<?php echo hb_options('hb_top_header_link_link'); ?>"><i class="<?php echo hb_options('hb_top_header_link_icon'); ?>"></i><?php echo hb_options('hb_top_header_link_txt'); ?></a>
        </div>
  
      <!-- END .top-widget -->
    <?php } 

    if ( hb_options('hb_top_header_socials_enable') ) { ?>

        <!-- BEGIN .top-widget -->

        <!-- END .top-widget -->

    <?php } ?>

    </div>
    <!-- END .container or .container-wide -->
	<div id="header-dropdown">
    <div id="contact-map" data-map-level="<?php echo hb_options('hb_map_zoom'); ?>" data-map-lat="<?php echo hb_options('hb_map_latitude') ?>" data-map-lng="<?php echo hb_options('hb_map_longitude'); ?>" data-map-img="<?php echo hb_options('hb_custom_marker_image'); ?>" data-overlay-color="<?php if ( hb_options('hb_enable_map_color') ) { echo hb_options('hb_map_focus_color'); } else { echo 'none'; } ?>"></div>
    <div class="close-map"><i class="hb-moon-close-2"></i></div>
</div>
<div id="header-dropdown2" class="download">
    <div id="download" >
	<div class="container">
	
		
		<div class="row  main-row">
			<div class="col-3">
			<?php echo do_shortcode('[image_banner url="670" text_color="dark"][video_embed embed_style="in_lightbox" url="https://www.youtube.com/watch?v=yObmPNHeuXA" width="30%"][/image_banner]'); ?>
			</div>
			<div class="col-3">
			<?php echo do_shortcode('[image_banner url="674" text_color="dark"][video_embed embed_style="in_lightbox" url="https://www.youtube.com/watch?v=9Haver6KTX4" width="30%"][/image_banner]'); ?>
			</div>
			<div class="col-3">
			<?php echo do_shortcode('[image_banner url="683" text_color="dark"][video_embed embed_style="in_lightbox" url="https://www.youtube.com/watch?v=VLM4l8Fvryc" width="30%"][/image_banner]'); ?>
			</div>
			<div class="col-3">
			<?php echo do_shortcode('[image_banner url="787" text_color="dark"][video_embed embed_style="in_lightbox" url="https://www.youtube.com/watch?v=3scc21z3DLw" width="30%"][/image_banner]'); ?>
			</div>

		</div>
		<!-- END .row -->

	</div>
	</div>
    <div class="close-map"><i class="hb-moon-close-2"></i></div>
</div>
</div>
<!-- END #header-bar -->

<?php 
global $hb_gmap;
$hb_gmap = null;

// Check if options are ok
$hb_gmap = array();

$hb_gmap[1]['lat'] = hb_options('hb_map_1_latitude');
$hb_gmap[1]['lng'] = hb_options('hb_map_1_longitude');
$hb_gmap[1]['ibx'] = hb_options('hb_location_1_info');

$count = 1;
for($i = 2; $i <= 5; $i++){
    if( hb_options('hb_enable_location_' . $i) ) {
        $count++;
        $hb_gmap[$count]['lat'] = hb_options('hb_map_' . $i . '_latitude');
        $hb_gmap[$count]['lng'] = hb_options('hb_map_' . $i . '_longitude');
        $hb_gmap[$count]['ibx'] = hb_options('hb_location_' . $i . '_info');
    }   
}

function json_hb_map() {
    global $hb_gmap; 
    return $hb_gmap;
}

wp_localize_script( 'hb_map', 'hb_gmap', json_hb_map() );

$data_map_img = 'data-map-img=""';
if ( hb_options('hb_enable_custom_pin') ){
    $data_map_img = ' data-map-img="' . hb_options('hb_custom_marker_image') . '"';
}
?>
	



