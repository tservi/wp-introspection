<?php

/*
  Plugin Name: WP Introspection
  Plugin URI: https://github.com/tservi/wp-introspection
  Description: This plugin lets you inspect wp.
  Author: t-servi.com
  Version: 0.0.1
  Author URI: https://www.t-servi.com/
  License: GPLv2 or later
  License URI: http://www.gnu.org/licenses/gpl-2.0.html
  Text Domain: wp_introspection
  Domain Path: /languages/
 */


// starting the session if it is not !
function register_session_if_not_activated_before(){
    if( !session_id() )
        session_start();
}
add_action('init','register_session_if_not_activated_before');

// loading the dashicons 
add_action( 'wp_enqueue_scripts', 'load_dashicons' );
function load_dashicons() {
wp_enqueue_style( 'dashicons' );
} 

add_action( 'admin_head', 'admin_wp_introspection_css_link' );

function admin_wp_introspection_css_link()
{
echo '<link rel="stylesheet" type="text/css" href="' . plugin_dir_url( __FILE__ )  . '/css/style.css">';
}

add_action( 'admin_head', 'admin_wp_introspection_javascript_link' );

function admin_wp_introspection_javascript_link()
{
echo '<script language="javascript" src="https://code.jquery.com/jquery-2.1.3.js" ></script>';
// voir http://www.cdolivet.com/editarea/?page=editArea
echo '<script language="javascript" src="http://www.cdolivet.com/editarea/editarea/edit_area/edit_area_full.js" ></script>';
//echo '<script language="javascript" src="https://code.jquery.com/ui/1.11.3/jquery-ui.js" ><script>';


?>

<?php

}

// starting the development of the plugin

add_action( 'plugins_loaded', 'wp_introspection_load_textdomain' );
function wp_introspection_load_textdomain() {
  load_plugin_textdomain( 'wp_introspection', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

add_action('admin_menu', 'wp_introspection_admin_menu');
 
function wp_introspection_admin_menu(){
        add_menu_page( 'Introspection', 'Introspection', 'manage_options', 'wp_introspection', 'wp_introspection_init','dashicons-info' );
}
 
 
 
function wp_introspection_init(){
    
        $error_message = '';
        $document_root = $_SERVER['DOCUMENT_ROOT'] ;
        $link = "?page=wp_introspection";
        
        
        if(strlen($error_message)>0)
            {
                echo "<div class='error_div'>" . $error_message . "</div>";
            }
        
        echo "<h1>WP Introspection</h1>";
    
        //var_dump($GLOBALS['wp_scripts']);
        $all_tabs= [
                    ["hd","Hard Disk","choosefilesordirectories.php"],
                    ["mysql", "MySql","mysql.php"],
                    ["objects", "Objects" , "objects.php"]
                    ];
        
        echo "<div id='tabs'>";
        _e("What to inspect : " , 'wp_introspection');
        foreach($all_tabs as $tab )
        {
            echo "<div class='tab'";
            if($_REQUEST['tab']==$tab[0])
            {echo " id='activ' ";}
            echo ">";
            echo "<a href='".$link."&tab=".$tab[0]."'>";
            _e($tab[1] , 'wp_introspection');
            echo "</a>\r\n";
            echo "</div>";  
                
        }
        
        
        echo "</div>";
        $found = FALSE;
        foreach($all_tabs as $tab)
        {
            if($_REQUEST['tab'] ==$tab[0])
            {
                include_once($tab[2]);
                $found = TRUE;
            }
        }
        
        if(!$found)
        {
            include_once("choosefilesordirectories.php");   
        }
        
}
?>