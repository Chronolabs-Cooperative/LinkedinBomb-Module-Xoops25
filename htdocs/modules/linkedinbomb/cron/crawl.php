<?php

	include (dirname(dirname(__FILE__)).'/header.php');
	$start = microtime(true);
	set_time_limit(1200);
	if ($GLOBALS['linkedinbombModuleConfig']['cron_crawl']==true) {
		$criteria = new CriteriaCompo(new Criteria('`crawled`', time(), '<='));
		$criteria->setSort($GLOBALS['linkedinbombModuleConfig']['crawlsort']);
		$criteria->setOrder($GLOBALS['linkedinbombModuleConfig']['crawlorder']);
		if ($GLOBALS['linkedinbombModuleConfig']['limitoncrawl']>0)
			$criteria->setLimit($GLOBALS['linkedinbombModuleConfig']['limitoncrawl']);
		echo "<pre>\n";
		$persons_handler = xoops_getmodulehandler('persons', 'linkedinbomb');
		if ($persons = $persons_handler->getObjects($criteria, true)) {
			foreach($persons as $person_id => $person) {
				if (microtime(true)-$start<$GLOBALS['linkedinbombModuleConfig']['length_of_cron']) {
					echo 'Updating Profile of :: '.$person->getVar('first-name').' '.$person->getVar('last-name');
					$profile = microtime(true);
					$person->updateProfile();	
					echo ' in '. (microtime(true) - $profile) . ' seconds'."\n";
				}
				if (microtime(true)-$start>$GLOBALS['linkedinbombModuleConfig']['length_of_cron'])
					continue(3);
			}
		} 
		echo "</pre>\n";
	}
?>