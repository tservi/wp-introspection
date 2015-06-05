<?php

$link .= '&tab=hd' ;
$browse = True;

if(!isset($_SESSION['actual_path']))
    {
        $_SESSION['actual_path'] = getcwd();
    }
if(isset($_REQUEST['action']))
    {
        $action = $_REQUEST['action'];
        if($action == '.')
        {
            $_SESSION['actual_path'] = getcwd() ;
        }
        elseif( $action == '..' )
        {
            
        }
        elseif( $action == 'go_home' )
        {
            $_SESSION['actual_path'] = $document_root ;
        }
        elseif( $action == 'jump' )
        {
            if(isset($_REQUEST['path']))
                {
                    $_SESSION['actual_path'] = urldecode($_REQUEST['path']) ;
                }
            else
                {
                    $error_message = 'no path found where to jump' ;   
                }
        }
        elseif( is_dir($_SESSION['actual_path'] . DIRECTORY_SEPARATOR . $action ) )
        {
            $_SESSION['actual_path'] .= DIRECTORY_SEPARATOR . $action ; 
        }
        else
        {
            $browse = False;   
        }
    }
    

_e("Your document root on this system : " , 'wp_introspection');
echo "<a href='". $link . "&action=go_home' class='home_link'>" ;
echo $document_root;
echo "</a>";
echo "<br/>";
_e("Your actual position on the hdd : ", 'wp_introspection');
echo "<a href='". $link . "&action=go_home' class='home_link'>" ;
echo $document_root;
echo "</a>";
$reste=[] ;
if( $_SESSION['actual_path'] != $document_root )
    {
        $reste = explode($document_root . DIRECTORY_SEPARATOR , $_SESSION['actual_path']); // !!!! array !!!!!                
    }
$directories = explode( DIRECTORY_SEPARATOR , $reste[count($reste)-1]); // !!!! array !!!!
$path = $document_root;
foreach($directories as $directory)
    {
        $path .= DIRECTORY_SEPARATOR . $directory ;
        echo DIRECTORY_SEPARATOR;
        echo "<a href='". $link . "&action=jump&path=" . urlencode($path) . "' class='breadcrumb_link'>";
        echo $directory;
        echo "</a>";
        
    }


if($browse)
    { include('browse.php'); }
else
    { include('editor.php'); }

?>