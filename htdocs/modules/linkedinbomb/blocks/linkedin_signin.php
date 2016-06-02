<?php

	function b_linkedin_block_signin_show($options) {
		$_SESSION['oauth']['linkedin']['authorized'] = (isset($_SESSION['oauth']['linkedin']['authorized'])) ? $_SESSION['oauth']['linkedin']['authorized'] : FALSE;
		if ($_SESSION['oauth']['linkedin']['authorized']===true)	
			return false;
		xoops_loadLanguage('blocks', 'linkedinbomb');
		return array('display' => ($_SESSION['oauth']['linkedin']['authorized']===false?true:false));		
	}
	
	function b_linkedin_block_signin_edit($options) {
		
	}
	
?>