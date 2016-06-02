<?php

	include ('header.php');
	
	if (!is_object($GLOBALS['xoopsUser']))
	{
		redirect_header(XOOPS_URL, 8, _NOPERM);
		exit;
	}
	
	if (strlen($GLOBALS['xoopsUser']->getVar('email'))>0)
	{
		redirect_header(XOOPS_URL, 8, _NOPERM);
		exit;
	}
	$error = '';
	if (!empty($_POST)) {
		if (checkEmail($_POST['email'])) {
			$member_handler = xoops_gethandler('member');
			$GLOBALS['xoopsUser']->setVar('email', $_POST['email']);
			$GLOBALS['xoopsUser']->setVar('pass', md5($pass = xoops_makepass()));
			$member_handler->insertUser($GLOBALS['xoopsUser'], true);
			xoops_loadLanguage('email', 'vs');
			$xoopsMailer =& getMailer();
			$xoopsMailer->setHTML(true);
			$xoopsMailer->setTemplateDir($GLOBALS['xoops']->path('/modules/linkedinbomb/language/'.$GLOBALS['xoopsConfig']['language'].'/mail_templates/'));
			$xoopsMailer->setTemplate('linkedin_email_user_created.html');
			$xoopsMailer->setSubject(sprintf(_EMAIL_LINKEDIN_CREATE_USER,  $GLOBALS['xoopsUser']->getVar('name')));						
			$xoopsMailer->assign("SITEURL", XOOPS_URL);
			$xoopsMailer->assign("SITENAME", $GLOBALS['xoopsConfig']['sitename']);
			$xoopsMailer->assign("EMAIL", $GLOBALS['xoopsUser']->getVar('email'));
			$xoopsMailer->assign("NAME", $GLOBALS['xoopsUser']->getVar('name'));
			$xoopsMailer->assign("UNAME", $GLOBALS['xoopsUser']->getVar('uname'));						
			$xoopsMailer->assign("PASS", $pass);
			$xoopsMailer->setToEmails(strtolower($_POST['email']));
			$success = $xoopsMailer->send();
			redirect_header(XOOPS_URL.'/modules/linkedinbomb/index.php', 8, _MN_MSG_EMAIL_SAVED_AND_PASSWORD_SENT);
			exit;
		}
		$error = _MN_MSG_INVALID_EMAIL_ADDRESS;
	}
	
	$xoopsOption['template_main'] = 'linkedinbomb_get_email.html';
	include($GLOBALS['xoops']->path('/header.php'));
	if ($error!='') {
		xoops_error($error);
	}
	$GLOBALS['xoopsTpl']->assign('php_self', $_SERVER['PHP_SELF']);
	$GLOBALS['xoopsTpl']->assign('form', linkedinbomb_get_email());
	include($GLOBALS['xoops']->path('/footer.php'));
	
	?>