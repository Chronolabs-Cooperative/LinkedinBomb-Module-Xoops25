<?php
	
	require('header.php');
	
	$op = isset($_REQUEST['op'])?$_REQUEST['op']:"email";
	$fct = isset($_REQUEST['fct'])?$_REQUEST['fct']:"list";
	$limit = !empty($_REQUEST['limit'])?intval($_REQUEST['limit']):30;
	$start = !empty($_REQUEST['start'])?intval($_REQUEST['start']):0;
	$order = !empty($_REQUEST['order'])?$_REQUEST['order']:'DESC';
	$sort = !empty($_REQUEST['sort'])?''.$_REQUEST['sort'].'':'created';
	$id = !empty($_REQUEST['id'])?(is_array($_REQUEST['id'])?array_unique($_REQUEST['id']):intval($_REQUEST['id'])):0;
	
	switch($op) {
		default:
		case "email":
			switch ($fct) {
				case 'send':

					xoops_load('XoopsMultiMailer');
		    		xoops_loadLanguage('email', 'linkedinbomb');
		    		
		    		$xoopsMailer =& getMailer();
					$xoopsMailer->setHTML(true);
					$xoopsMailer->setTemplateDir($GLOBALS['xoops']->path('/modules/linkedinbomb/language/'.$GLOBALS['xoopsConfig']['language'].'/mail_templates/'));
					$xoopsMailer->setTemplate('linkedin_email_message.html');
					if (!empty($_REQUEST[$_REQUEST['profile_id']]['subject']))
						$xoopsMailer->setSubject($_REQUEST[$_REQUEST['profile_id']]['subject']);
					else {
						header('Location: '.$_SERVER['PHP_SELF']);
						exit;
					} 

					$xoopsMailer->setToEmails($GLOBALS['xoopsConfig']['adminmail']);
					if (!empty($_REQUEST[$_REQUEST['profile_id']]['to']))
						$xoopsMailer->setToEmails($_REQUEST[$_REQUEST['profile_id']]['to']);
					else {
						header('Location: '.$_SERVER['PHP_SELF']);
						exit;
					} 
					
					if (!empty($_REQUEST[$_REQUEST['profile_id']]['from']))
						$xoopsMailer->setFromEmail($_REQUEST[$_REQUEST['profile_id']]['from']);
					else {
						header('Location: '.$_SERVER['PHP_SELF']);
						exit;
					} 
					
					if (!empty($_REQUEST[$_REQUEST['profile_id']]['name']))
						$xoopsMailer->setFromName($_REQUEST[$_REQUEST['profile_id']]['name']);
					else {
						header('Location: '.$_SERVER['PHP_SELF']);
						exit;
					} 
					
					if (!empty($_REQUEST[$_REQUEST['profile_id']]['message']))
						$xoopsMailer->assign("MESSAGE", $GLOBALS['myts']->displayTarea($_REQUEST[$_REQUEST['profile_id']]['message'], true, true, true, true, true));
					else {
						header('Location: '.$_SERVER['PHP_SELF']);
						exit;
					} 
					$xoopsMailer->assign("SITEURL", XOOPS_URL);
					$xoopsMailer->assign("SITENAME", $GLOBALS['xoopsConfig']['sitename']);
					$xoopsMailer->assign("SITEEMAIL", $GLOBALS['xoopsConfig']['adminmail']);
					
					if($xoopsMailer->send() ){
						$profiles_handler = xoops_getmodulehandler('profiles', 'linkedinbomb');
						$profile = $profiles_handler->get($_REQUEST['profile_id']);
						$profile->setVar('emailed', time());
						$profiles_handler->insert($profile);
					}
					redirect_header($_SERVER['PHP_SELF'], 10, 'Email Sent Successfully');
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
			   			$criteria = new CriteriaCompo(new Criteria('profile_id', '('.implode(',', $profile_ids).')', 'IN'));
			   		} else {
			   			$criteria = new CriteriaCompo(new Criteria('person_id', 0, '<>'));
			   		}

			   		$criteria->add(new Criteria('`im-account-name`', '%@%', 'LIKE'));
			   		
			   		
			 		$pagenav = new XoopsPageNav($profiles_ims_handler->getCount($criteria), $limit, $start, 'start', 'limit='.$limit.'&sort='.$sort.'&order='.$order.'&op='.$op.'&fct='.$fct.'&filter='.$filter.'&fct='.$fct.'&filter='.$filter);
					$GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav());
					$GLOBALS['xoopsTpl']->assign('adminmail', $GLOBALS['xoopsConfig']['adminmail']);
					$GLOBALS['xoopsTpl']->assign('fromname', $GLOBALS['xoopsConfig']['sitename']);
			
			   		$criteria->setStart($start);
			   		$criteria->setLimit($limit);
			   		$criteria->setSort($sort);
			   		$criteria->setOrder($order);
			   		
			   		if ($ims = $profiles_ims_handler->getObjects($criteria, true)) {
			   			foreach($ims as $im_id => $email) {
			   				if (checkemail($email->getVar('im-account-name')))
			   					$GLOBALS['xoopsTpl']->append('emails', $email->toArray(true));
			   			}
			   		}
					
					$GLOBALS['xoopsTpl']->display('db:linkedinbomb_cpanel_email_list.html');
			   		break;
			}
			break;
	}
	
	xoops_cp_footer();
?>