<?php
echo "/".$action;
echo "<br/>";


?>

<textarea id="textarea_1" name="content" style="width:100%; height:400px;">
<?php
    $file = $_SESSION[ 'actual_path' ] . '/' . $action ;
    $content = file_get_contents( $file );
    echo $content;
?>
</textarea>

<script language="javascript" type="text/javascript">
editAreaLoader.init({
	id : "textarea_1"		// textarea id
	,syntax: "php"			// syntax to be uses for highgliting
	,start_highlight: true		// to display with highlight mode on start-up
});
</script>
