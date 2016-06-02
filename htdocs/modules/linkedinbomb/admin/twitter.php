<?php
	
	require('header.php');
	
	$op = isset($_REQUEST['op'])?$_REQUEST['op']:"twitter";
	$fct = isset($_REQUEST['fct'])?$_REQUEST['fct']:"list";
	$limit = !empty($_REQUEST['limit'])?intval($_REQUEST['limit']):30;
	$start = !empty($_REQUEST['start'])?intval($_REQUEST['start']):0;
	$order = !empty($_REQUEST['order'])?$_REQUEST['order']:'DESC';
	$sort = !empty($_REQUEST['sort'])?''.$_REQUEST['sort'].'':'created';
	$id = !empty($_REQUEST['id'])?(is_array($_REQUEST['id'])?array_unique($_REQUEST['id']):intval($_REQUEST['id'])):0;
	
	switch($op) {
		default:
		case "twitter":
			switch ($fct) {
				case 'send':
					$scheduler_handler = xoops_getmodulehandler('scheduler', 'twitterbomb');
					$campaign_handler = xoops_getmodulehandler('campaign', 'twitterbomb');
					$campaign = $campaign_handler->get($_POST[$_POST['profile_id']]['campaign']);
					if (!is_object($campaign)||empty($_POST[$_POST['profile_id']]['tweet'])) {
						header('Location: '.$_SERVER["PHP_SELF"]);
						exit;
					}
					$scheduler = $scheduler_handler->create();
					$scheduler->setVar('catid', $campaign->getVar('catid'));
					$scheduler->setVar('cid', $campaign->getVar('cid'));
					$scheduler->setVar('mode', 'direct');
					$scheduler->setVar('when', time());
					$scheduler->setVar('uid', $GLOBALS['xoopsUser']->getVar('uid'));
					$scheduler->setVar('pre', $_POST[$_POST['profile_id']]['pretext']);
					$scheduler->setVar('text', $_POST[$_POST['profile_id']]['tweet']);
					$scheduler_handler->insert($scheduler);
					redirect_header($_SERVER["PHP_SELF"], 10, 'Tweet Scheduled on Twitterbomb Watch');
					exit;
					
				default:
				case 'list':
					xoops_cp_header();
					
					$GLOBALS['xoTheme']->addScript(XOOPS_URL.'/modules/linkedinbomb/js/linkedinbomb_toggle.js', array('type'=>'text/javascript'));
					$GLOBALS['xoTheme']->addStylesheet(XOOPS_URL.'/modules/linkedinbomb/css/profile.css', array('type'=>'text/css'));
					
					$indexAdmin = new ModuleAdmin();
			   		echo $indexAdmin->addNavigation(strtolower(basename($_SERVER['REQUEST_URI'])));
			   		include(dirname(__FILE__).'/filter.php');
			   		
			   		if (isset($_SESSION['location_id'])) {
			   			$location_profile_ids = $profiles_handler->getIDs(new Criteria('location_id', $_SESSION['location_id']));
			   		} else {
			   			$location_profile_ids = array();
			   		}
					if (isset($_SESSION['skill_ids'])) {
			   			$skills_profile_ids = $skills_handler->getProfileIDs(new Criteria('skill_id', '('.implode(',', ($_SESSION['skill_ids'])).')', 'IN'));
			   		} else {
			   			$skills_profile_ids = array();
			   		}	
					if (count($skills_profile_ids))
						foreach($location_profile_ids as $key => $id) {
				   			if (!in_array($id, $skills_profile_ids))	
				   				unset($location_profile_ids[$key]);
				   		}
				   	if (count($location_profile_ids))	
				   		foreach($skills_profile_ids as $key => $id) {
				   			if (!in_array($id, $location_profile_ids))	
				   				unset($skills_profile_ids[$key]);
				   		}
			   		$profile_ids = array_unique(array_merge($location_profile_ids,$skills_profile_ids));
			   		if (count($profile_ids)) {
			   			$criteria = new Criteria('profile_id', '('.implode(',', $profile_ids).')', 'IN');
			   		} else {
			   			$criteria = new Criteria('person_id', 0, '<>');
			   		}
			   		$pagenav = new XoopsPageNav($profiles_providers_handler->getCount($criteria), $limit, $start, 'start', 'limit='.$limit.'&sort='.$sort.'&order='.$order.'&op='.$op.'&fct='.$fct.'&filter='.$filter.'&fct='.$fct.'&filter='.$filter);
					$GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav());
			   		$criteria->setStart($start);
			   		$criteria->setLimit($limit);
			   		$criteria->setSort($sort);
			   		$criteria->setOrder($order);
			   		
			   		if ($providers = $profiles_providers_handler->getObjects($criteria, true)) {
			   			foreach($providers as $provider_id => $provider) {
			   				$GLOBALS['xoopsTpl']->append('providers', $provider->toArray(true));
			   			}
			   		}
					$GLOBALS['xoopsTpl']->display('db:linkedinbomb_cpanel_providers_list.html');
			   		break;
			}
			break;
	}
	
	xoops_cp_footer();
?>