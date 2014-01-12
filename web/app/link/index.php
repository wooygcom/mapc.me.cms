<?php
	$req_gotourl = (isset($_REQUEST['gotourl'])) ? $_REQUEST['gotourl'] : 'about:blank';
?>

<html>
	<head>
		<title>WooYG.com - Ctrl+D 를 누르세요.</title>
	</head>
	<frameset rows="35,*" frameborder="no" border="0">
		<frame src="top.php" name="TopFrm" scrolling="no" marginwidth="0"  marginheight="0">
		<frame src="<?php echo $req_gotourl ?>" id="subpage" name="subpage" marginwidth="0" marginheight="0">
	</frameset>
</html>
