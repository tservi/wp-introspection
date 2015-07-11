<?php

function create_table_row( $cst, $txt )
{
    echo "<tr>\r\n";
    echo "<td><strong>";
    _e($txt , 'wp_introspection');
    echo "</strong></td>\r\n<td>";
    echo $cst;
    echo "</td>\r\n";
    echo "</tr>\r\n";

}

if(is_admin())
{
    $db_name = DB_NAME;
    $db_user = DB_USER;
    $db_password = DB_PASSWORD;
    $db_host = DB_HOST;
    $db_charset = DB_CHARSET;
    $db_collate = DB_COLLATE;
    
    echo "<table>\r\n";
    create_table_row($db_name, "DB name");
    create_table_row($db_user, "DB user");
    create_table_row($db_password, "DB passowrd");
    create_table_row($db_host, "DB host");
    create_table_row($db_charset, "DB charset");
    create_table_row("'".$db_collate."'", "DB collate");
    echo "</table>\r\n";
    
    global $wpdb;
    $tables = $wpdb->get_results( 'show tables', ARRAY_N );
    echo "<br/>\r\n";
    echo "<ol class='tables'>\r\n";
    foreach( $tables as $v )
    {
            echo "<li>\r\n";
            echo  $v[0];
            $columns = $wpdb->get_results( 'show columns from ' . $v[0] , ARRAY_A);
            echo " ( " . count($columns) . " ";
            _e("rows", 'wp_introspection' );
            echo " )";
            echo "<ol class='columns' >\r\n";
            foreach($columns as $column)
            {
                echo "<li>";
                echo $column['Field'];
                echo " " ;
                echo "</li>\r\n";
            }
            echo "</ol>\r\n";
            echo "</li>\r\n";
    }
    echo "</ol>\r\n";
    echo "<strong>";
    _e('Total of tables : ', 'wp_introspection');
    echo count($tables);
    echo "</strong>";
    echo "<br/>\r\n";
    
    
    ?>
   
    <script language="javascript">
        //jQuery.noConflict();
        jQuery(document).ready(
             function($)
            {
                $('.columns').toggleClass("invisible")
                $('.tables li').click(
                    function () {
                    $(this).find(".columns").toggleClass("invisible")
                    
                    }
                )
            }
            )
        
    </script>
<?php
}
else
{
     _e('OOOups! You don\'t have the rights!!!' , 'wp_introspection');
}
?>
