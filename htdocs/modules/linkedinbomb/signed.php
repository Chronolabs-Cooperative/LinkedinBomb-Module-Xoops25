<?php

	include_once ('header.php');
	
	$oauth_handler = xoops_getmodulehandler('oauth', 'linkedinbomb');
	
	$response = $oauth_handler->_api->profile('~:(id,first-name,last-name,picture-url)');
	if($response['success'] === TRUE) {
		set_time_limit(1200);
		$profile = linkedinbomb_object2array(new SimpleXMLElement($response['linkedin']));
		if (!empty($profile['id'])) {
			
			$user = $oauth_handler->parseUserSession($profile['id'], $profile['first-name'], $profile['last-name'], $profile['picture-url']);

			// Regenrate a new session id and destroy old session
		    $GLOBALS["sess_handler"]->regenerate_id(true);
		    $_SESSION['xoopsUserId'] = $user->getVar('uid');
		    $_SESSION['xoopsUserGroups'] = $user->getGroups();
		    $user_theme = $user->getVar('theme');
		    if (in_array($user_theme, $xoopsConfig['theme_set_allowed'])) {
		        $_SESSION['xoopsUserTheme'] = $user_theme;
		    }
		
		    // Set cookie for rememberme
		    if (!empty($xoopsConfig['usercookie'])) {
		        if (!empty($_POST["rememberme"])) {
		            setcookie($xoopsConfig['usercookie'], $_SESSION['xoopsUserId'] . '-' . md5($user->getVar('pass') . XOOPS_DB_NAME . XOOPS_DB_PASS . XOOPS_DB_PREFIX), time() + 31536000, '/', XOOPS_COOKIE_DOMAIN, 0);
		        } else {
		            setcookie($xoopsConfig['usercookie'], 0, -1, '/', XOOPS_COOKIE_DOMAIN, 0);
		        }
		    }
		    header('Location: ' . XOOPS_URL.'/modules/linkedinbomb/index.php');
		    //include(dirname(__FILE__).'/index.php');
		}
    } else {
        // request failed
        echo "Error retrieving profile information:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response) . "</pre>";
    } 
	?>
	