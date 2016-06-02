<?php
	include_once('header.php');
	$xoopsOption['template_main'] = 'linkedinbomb_profile.html';
	include($GLOBALS['xoops']->path('/header.php'));
	
	$persons_handler=xoops_getmodulehandler('persons', 'linkedinbomb');
	$oauth_handler=xoops_getmodulehandler('oauth', 'linkedinbomb');
	$profiles_handler=xoops_getmodulehandler('profiles', 'linkedinbomb');
	
	$oauth = $oauth_handler->get($_SESSION['oauth']['linkedin']['oauth_id']);
	if (is_object($oauth)) {
		$person = $persons_handler->get($oauth->getVar('person_id'));
		if (is_object($person)) {
			$profile = $profiles_handler->get($person->getVar('profile_id'));
			if ($oauth->getVar('profile_id')!=$person->getVar('profile_id')) {
			 	$oauth->getVar('profile_id', $person->getVar('profile_id'));
			 	$oauth_handler->insert($oauth);
			}
			$GLOBALS['xoopsTpl']->assign('profile', $profile->toArray());
		}
	}
	include($GLOBALS['xoops']->path('/footer.php'));
	exit;
?>