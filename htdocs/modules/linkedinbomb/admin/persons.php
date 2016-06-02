<?php
	
	require('header.php');
	
	$op = isset($_REQUEST['op'])?$_REQUEST['op']:"persons";
	$fct = isset($_REQUEST['fct'])?$_REQUEST['fct']:"list";
	$limit = !empty($_REQUEST['limit'])?intval($_REQUEST['limit']):30;
	$start = !empty($_REQUEST['start'])?intval($_REQUEST['start']):0;
	$order = !empty($_REQUEST['order'])?$_REQUEST['order']:'DESC';
	$sort = !empty($_REQUEST['sort'])?''.$_REQUEST['sort'].'':'created';
	$id = !empty($_REQUEST['id'])?(is_array($_REQUEST['id'])?array_unique($_REQUEST['id']):intval($_REQUEST['id'])):0;
		
	switch($op) {
		default:
		case "about":
			switch ($fct) {
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
			   		
			   		$pagenav = new XoopsPageNav($persons_handler->getCount($criteria), $limit, $start, 'start', 'limit='.$limit.'&sort='.$sort.'&order='.$order.'&op='.$op.'&fct='.$fct.'&filter='.$filter.'&fct='.$fct.'&filter='.$filter);
					$GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav());
			
			   		$criteria->setStart($start);
			   		$criteria->setLimit($limit);
			   		$criteria->setSort($sort);
			   		$criteria->setOrder($order);
			   		
			   		if ($persons = $persons_handler->getObjects($criteria, true)) {
			   			foreach($persons as $person_id => $person) {
			   				$GLOBALS['xoopsTpl']->append('persons', $person->toArray(false));
			   			}
			   		}
					$GLOBALS['xoopsTpl']->display('db:linkedinbomb_cpanel_persons_list.html');
			   		break;
			}
			break;
	}
	
	xoops_cp_footer();
?>