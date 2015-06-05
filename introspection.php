<?php

/*
  Plugin Name: Introspection
  Plugin URI: 
  Description: This plugin lets you inspect wp.
  Author: t-servi.com
  Version: 0.0.1
  Author URI: https://www.t-servi.com/
  License: GPLv2 or later
  License URI: http://www.gnu.org/licenses/gpl-2.0.html
  Text Domain: introspection
  Domain Path: /lang/
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

add_action( 'admin_head', 'admin_introspection_css_link' );

function admin_introspection_css_link()
{
echo '<link rel="stylesheet" type="text/css" href="' . plugin_dir_url( __FILE__ )  . '/style.css">';
}

add_action( 'admin_head', 'admin_introspection_jquery_link' );

function admin_introspection_jquery_link()
{
echo '<script language="javascript" src="https://code.jquery.com/jquery-2.1.3.js" ></script>';
// voir http://www.cdolivet.com/editarea/?page=editArea
echo '<script language="javascript" src="http://www.cdolivet.com/editarea/editarea/edit_area/edit_area_full.js" ></script>';
//echo '<script language="javascript" src="https://code.jquery.com/ui/1.11.3/jquery-ui.js" ><script>';

/*
<script src="http://cdn.jsdelivr.net/ace/1.1.9/ace.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/ext-searchbox.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/ext-spellcheck.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/ext-static_highlight.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/ext-textarea.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/keybinding-emacs.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/keybinding-vim.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-abap.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-asciidoc.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-c9search.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-c_cpp.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-clojure.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-coffee.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-coldfusion.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-csharp.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-css.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-curly.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-dart.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-diff.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-django.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-dot.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-glsl.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-golang.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-groovy.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-haml.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-haxe.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-html.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-jade.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-java.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-javascript.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-json.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-jsp.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-jsx.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-latex.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-less.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-liquid.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-lisp.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-livescript.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-lua.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-luapage.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-lucene.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-makefile.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-markdown.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-objectivec.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-ocaml.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-perl.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-pgsql.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-php.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-powershell.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-python.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-r.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-rdoc.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-rhtml.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-ruby.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-scad.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-scala.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-scheme.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-scss.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-sh.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-sql.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-stylus.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-svg.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-tcl.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-tex.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-text.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-textile.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-tm_snippet.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-typescript.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-vbscript.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-velocity.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-xml.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-xquery.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/mode-yaml.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-ambiance.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-chaos.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-chrome.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-clouds.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-clouds_midnight.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-cobalt.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-crimson_editor.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-dawn.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-dreamweaver.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-eclipse.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-github.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-idle_fingers.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-kr.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-merbivore.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-merbivore_soft.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-mono_industrial.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-monokai.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-pastel_on_dark.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-solarized_dark.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-solarized_light.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-textmate.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-tomorrow.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-tomorrow_night.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-tomorrow_night_blue.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-tomorrow_night_bright.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-tomorrow_night_eighties.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-twilight.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-vibrant_ink.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/theme-xcode.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/worker-coffee.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/worker-css.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/worker-javascript.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/worker-json.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/worker-php.js"></script>
<script src="http://cdn.jsdelivr.net/ace/1.1.9/worker-xquery.js"></script>
*/

?>

<?php

}

// starting the development of the plugin

add_action('admin_menu', 'introspection_admin_menu');
 
function introspection_admin_menu(){
        add_menu_page( 'Introspection', 'Introspection', 'manage_options', 'introspection', 'introspcetion_init','dashicons-info' );
}
 
 
 
function introspcetion_init(){
    
        $error_message = '';
        $document_root = $_SERVER['DOCUMENT_ROOT'] ;
        $link = "?page=introspection";
        
        
        if(strlen($error_message)>0)
            {
                echo "<div class='error_div'>" . $error_message . "</div>";
            }
        
        echo "<h1>Introspection</h1>";
    
        //var_dump($GLOBALS['wp_scripts']);
    
        echo "<div id='tabs'>";
        _e("What to inspect : " , 'introspection');
        echo "<div class='tab'";
        if($_REQUEST['tab']!='mysql')
        {echo " id='activ' ";}
        echo ">";
        echo "<a href='".$link."&tab=hd'>";
        _e("Hard Disk" , 'introspection');
        echo "</a>\r\n";
        echo "</div>";  
        echo "<div class='tab'";
        if($_REQUEST['tab']=='mysql')
        {echo " id='activ' ";}
        echo ">";
        echo "<a href='".$link."&tab=mysql'>Mysql</a>\r\n" ;
        echo "</div>";
        echo "</div>";
        
        if($_REQUEST['tab'] == 'mysql')
        {
            include_once("mysql.php");
        }
        else
        {
            include_once("choosefilesordirectories.php");   
        }
         
        
}
?>