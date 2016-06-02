<?php

	xoops_load('xoopscache');
	if (!class_exists('XoopsCache')) {
		// XOOPS 2.4 Compliance
		xoops_load('cache');
		if (!class_exists('XoopsCache')) {
			include_once XOOPS_ROOT_PATH.'/class/cache/xoopscache.php';
		}
	}
    $module_handler = xoops_gethandler('module');
    $config_handler = xoops_gethandler('config');
    $GLOBALS['linkedinbombModule'] = $module_handler->getByDirname('linkedinbomb');
    if (is_object($GLOBALS['linkedinbombModule'])) {
    	$GLOBALS['linkedinbombModuleConfig'] = $config_handler->getConfigList($GLOBALS['linkedinbombModule']->getVar('mid'));
		switch ($GLOBALS['linkedinbombModuleConfig']['crontype']) {
			case 'preloader':
				if (!$read = XoopsCache::read('linkedinbomb_pause_preload')) {
					XoopsCache::write('linkedinbomb_pause_preload', true, $GLOBALS['linkedinbombModuleConfig']['interval_of_cron']);
					ob_start();
					include(XOOPS_ROOT_PATH.'/modules/linkedinbomb/cron/all.php');
					ob_end_clean();
				}
				break;
		}
    }