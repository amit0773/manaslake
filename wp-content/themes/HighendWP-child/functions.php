<?php
// Your php code goes here 

// Disable Admin Bar for everyone
if (!function_exists('df_disable_admin_bar')) {

	function df_disable_admin_bar() {
		
		// for the admin page
		remove_action('admin_footer', 'wp_admin_bar_render', 1000);
		// for the front-end
		remove_action('wp_footer', 'wp_admin_bar_render', 1000);
	  	
		// css override for the admin page
		function remove_admin_bar_style_backend() { 
			echo '<style>body.admin-bar #wpcontent, body.admin-bar #adminmenu { padding-top: 0px !important; }</style>';
		}	  
		add_filter('admin_head','remove_admin_bar_style_backend');
		
		// css override for the frontend
		function remove_admin_bar_style_frontend() {
			echo '<style type="text/css" media="screen">
			html { margin-top: 0px !important; }
			* html body { margin-top: 0px !important; }
			</style>';
		}
		add_filter('wp_head','remove_admin_bar_style_frontend', 99);
  	}
}
add_action('init','df_disable_admin_bar');






//Overrides downloadmanager default icon style

add_action('init', 'override_download_shortcode');
function override_download_shortcode(){
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'download-manager/download-manager.php') ) {
	remove_shortcode('wpdm_file');
	add_shortcode( 'wpdm_file', 'new_wpdm_downloadable_nsc' );
}

}

function new_wpdm_downloadable_nsc($params){
    global $wpdb; 
    extract($params);       
         
    $home = home_url('/');
    $password_field = '';
    $bg = '';
    
    $sap = count($_GET)>0?'&':'?';
        
    $data = $wpdb->get_row("select * from ahm_files where id='$id'",ARRAY_A);      
    $data['title'] = stripcslashes($data['title']);  
    $data['description'] = stripcslashes($data['description']);  
    if($title=='true') $title = "<h3>".$data['title']."</h3>";
    else  $title = '';
    if($desc=='true') $desc = wpautop($data['description'])."</br>";
    else  $desc = '';
    $desc = stripslashes($desc);
    if($data['show_counter']!=0)  $hc= 'has-counter';
    if($template=='') $template = 'wpdm-only-button';
    else  $template = "wpdm-{$template}";
    $wpdm_login_msg = get_option('wpdm_login_msg')?get_option('wpdm_login_msg'):'Login Required';
    $link_label = $data['link_label']?$data['link_label']:'Download';
    if($data['access']=='member'&&!is_user_logged_in()){    
    $url = get_option('siteurl')."/wp-login.php?redirect_to=".$_SERVER['REQUEST_URI'];
    $uuid = uniqid();
      
    if($data['icon']!='') $bg = "background-image: url(".plugins_url()."/download-manager/icon/{$data[icon]});";
    
    $html = "<div id='wpdm_file_{$id}' class='wpdm_file $template'>{$title}<div class='cont'>{$desc}{$loginform}<div class='btn_outer'><div class='btn_outer_c' style='{$bg}'><a class='btn_left $classrel $hc login-please' rel='{$id}' title='{$data[title]}' href='$url'  >$link_label</a>";    
    
    $html .= "<span class='btn_right counter'>Login Required</span>";                 
    $html .= "</div></div><div class='clear'></div></div></div>";
    }
    else {
    if($data['icon']!='') $bg = "background-image: url(\"".plugins_url()."/download-manager/icon/{$data[icon]}\");";    
    if($data['password']=='') { $url = home_url('/?wpdmact=process&did='.base64_encode($id.'.hotlink')); $classrel = ""; }
    else { $classrel='haspass'; /*$url = home_url('/?download='.$id);*/ $url = home_url('/');  $password_field = "<div class=passit>Enter password<br/><input type=password id='pass_{$id}' size=15 /><span class='perror'></span></div>"; }
    $html = "<div class='shortcode-wrapper shortcode-icon-column clearfix'><div class='feature-box standard-icon-box alignleft'><div class='feature-box-content'><h4 class='bold'><a class='btn_left $classrel $hc' rel='{$id}' title='{$data['title']}' href='$url'  ><i class='hb-moon-download-2 title-icon'></i>$link_label</a></h4></div></div></div>";

    }        
    return $html;    
}

function add_child_theme_js(){

	 wp_enqueue_script('hb-child-custom-js', site_url() . '/wp-content/themes/HighendWP-child/scripts/jquery.child.js', array(
            'jquery'
        ));
}
add_action('wp_enqueue_scripts', 'add_child_theme_js');
