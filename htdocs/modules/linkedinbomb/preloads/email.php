<?php

defined('XOOPS_ROOT_PATH') or die('Restricted access');

class LinkedinbombEmailPreload extends XoopsPreloadItem
{
	function eventCoreIncludeCommonEnd($args)
    {
		if (is_object($GLOBALS['xoopsUser'])&&empty($_POST)) {
			if (strlen($GLOBALS['xoopsUser']->getVar('email'))==0) {
				if (strpos($_SERVER['PHP_SELF'], 'linkedinbomb/getemail.php')==0) {
					redirect_header(XOOPS_URL.'/modules/linkedinbomb/getemail.php', 10, _MI_LINKEDIN_NO_EMAIL_ADDRESS_WITH_USER);
					exit;
				}
			}
		}    	
    }
    
    
}
?>