<?php
	
	require_once('header.php');
	
	switch($op) {
		case "filter":
			header('Location: '.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
			exit;
		default:
					
			$GLOBALS['xoopsTpl']->assign('form', linkedinbomb_filter_form(isset($_SESSION['country_id'])?$_SESSION['country_id']:0, isset($_SESSION['location_id'])?$_SESSION['location_id']:0, isset($_SESSION['skill_ids'])?$_SESSION['skill_ids']:array()));
			$GLOBALS['xoopsTpl']->assign('php_self', $_SERVER['PHP_SELF']);
			$GLOBALS['xoopsTpl']->display('db:linkedinbomb_cpanel_filter_default.html');	
			
	}
	
?>