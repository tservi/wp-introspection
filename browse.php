<?php

if(is_admin())
{
    
    echo "<br/>";
    
    
    $dir = $_SESSION['actual_path'];
    $cdir = array_diff(scandir($dir), array('..', '.')) ; //scandir($dir);
    //var_dump($cdir);
    echo "<table>\r\n";
    foreach ($cdir as $key => $value)
    {
        echo "<tr>\r\n";
        echo "<td>\r\n";
        echo "<a href='". $link . "&action=" . urlencode($value)  . "' class='";
        if( is_dir($dir. DIRECTORY_SEPARATOR . $value ))
        {echo 'directory_link';}
        else
        {
            if( strpos($value,'php') == strlen($value)-3 )
            { echo 'php_link'; }
            else
            { echo 'file_link'; }
        }
        echo "'>" . $value . "</a>\r\n";
        echo "</td>\r\n";
        echo "</tr>\r\n";
    }
    echo "</table>\r\n";
}
else
{
     _e('OOOups! You don\'t have the rights!!!' , 'wp_introspection');
}

?>