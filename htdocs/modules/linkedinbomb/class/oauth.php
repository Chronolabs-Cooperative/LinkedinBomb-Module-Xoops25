<?php

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}

include_once(dirname(dirname(__FILE__)).'/include/linkedin.php');

/**
 * Class for Blue Room Xcenter
 * @author Simon Roberts <simon@xoops.org>
 * @copyright copyright (c) 2009-2003 XOOPS.org
 * @package kernel
 */
class LinkedinbombOauth extends XoopsObject
{

	
    function __construct($id = null)
    {
   	
        $this->initVar('oauth_id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('person_id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('profile_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('mode', XOBJ_DTYPE_ENUM, 'valid', false, false, false, false, array('valid','invalid','expired','disabled','other'));
		$this->initVar('access_oauth_token', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('access_oauth_token_secret', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('access_oauth_expires_in', XOBJ_DTYPE_INT, null, false);
		$this->initVar('request_oauth_token', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('request_oauth_token_secret', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('request_oauth_expires_in', XOBJ_DTYPE_INT, null, false);
		$this->initVar('username', XOBJ_DTYPE_TXTBOX, null, false, 64);
        $this->initVar('ip', XOBJ_DTYPE_TXTBOX, null, false, 64);
        $this->initVar('netbios', XOBJ_DTYPE_TXTBOX, null, false, 255);
        $this->initVar('uid', XOBJ_DTYPE_INT, null, false);
		$this->initVar('created', XOBJ_DTYPE_INT, null, false); // Removed Unicode in 2.10
		$this->initVar('updated', XOBJ_DTYPE_INT, null, false); // Removed Unicode in 2.10
		
		if ($id>0) {
			$handler = new LinkedinbombOauthHandler($GLOBALS['xoopsDB']);
			$object = $handler->get($id);
			if (is_object($object)) {
				if (is_a($object, 'LinkedinbombOauth')) {
					$this->assignVars($object->getValues());
				}
			}
			unset($object);
		}
    }

    function setVar($field, $value) {
    	if (isset($this->vars[$field])) {
	    	switch ($this->vars[$field]['data_type']) {
	    		case XOBJ_DTYPE_ARRAY:
	    			if (md5(serialize($value))!=md5(serialize($this->getVar($field))))
	    				parent::setVar($field, $value);
	    			break;
	    		default:
	    			if (is_array($value)) {
		    			if (md5(serialize($value))!=md5($this->getVar($field))) {
		    				parent::setVar($field, $value);
		    			}
	    			} elseif (md5($value)!=md5($this->getVar($field))) {
	    				parent::setVar($field, $value);
	    			}
	    			break;
	    	}
    	}
    }
            
    function setVars($arr, $not_gpc=false) {
    	foreach($arr as $field => $value) {
    		if (isset($this->vars[$field])) {
	    		switch ($this->vars[$field]['data_type']) {
	    			case XOBJ_DTYPE_ARRAY:
	    				if (md5(serialize($value))!=md5(serialize($this->getVar($field))))
	    					parent::setVar($field, $value);
	    				break;
	    			default:
			    		if (is_array($value)) {
			    			if (md5(serialize($value))!=md5($this->getVar($field))) {
			    				parent::setVar($field, $value);
			    			}
		    			} elseif (md5($value)!=md5($this->getVar($field))) {
		    				parent::setVar($field, $value);
		    			}
	    				break;
	    		}
    		}
    	}	
    }   
   
    function getAccessToken() {
    	$ret = array();
    	$ret['oauth_token'] = $this->getVar('access_oauth_token');
    	$ret['oauth_token_secret'] = $this->getVar('access_oauth_token_secret');
    	$ret['oauth_expires_in'] = time()-$this->getVar('access_oauth_expires_in');
    	return $ret;
    }
    
	function getRequestToken() {
    	$ret = array();
    	$ret['oauth_token'] = $this->getVar('request_oauth_token');
    	$ret['oauth_token_secret'] = $this->getVar('request_oauth_token_secret');
    	$ret['oauth_expires_in'] = time()-$this->getVar('request_oauth_expires_in');
    	return $ret;
    }
    
    function getName() {
    	return $this->getVar('mode').', '.$this->getVar('ip').', '.$this->getVar('uid');
    }
    
    function getForm($as_array=false, $title='') {
    	$class = explode('.',basename(__FILE__));
		unset($class[sizeof($class)-1]);
		$class = implode('.',$class);
		// Gets Title
		xoops_loadLanguage('forms', 'linkedinbomb');
		if (empty($title)) {
    		if ($this->isNew()) {
    			$title = constant("FRM_LINKEDIN_TITLE_NEW_".strtoupper($class));
    		} else {
    			$title = sprintf(constant("FRM_LINKEDIN_TITLE_EDIT_".strtoupper($class)), $this->getName());
    		}
    	}
    	// Gets Form
		$func = 'linkedin_form_item_'.$class;
		if (function_exists($func)) {
			return $func($this, $title, $as_array);
		}
    }
    
    function toArray() {
    	$ret = array();
    	foreach(parent::toArray() as $field => $value) {
    		$ret[str_replace('-', '_', $field)] = $value;
    	}
    	
    	if (isset($ret['created'])&&$ret['created']>0) {
    		$ret['created'] = date(_DATESTRING, $ret['created']);
    	}
    	if (isset($ret['updated'])&&$ret['updated']>0) {
    		$ret['updated'] = date(_DATESTRING, $ret['updated']);
    	}
    	if (isset($ret['emailed'])&&$ret['emailed']>0) {
    		$ret['emailed'] = date(_DATESTRING, $ret['emailed']);
    	}
    	if (is_array($form = $this->getForm(true, ''))) {
    		foreach($form as $field => $element) {
    			$ret['form'][$field] = $form[$field]->render();
    		}
    	} 
    	return $ret;
    }

    
}


/**
* XOOPS policies handler class.
* This class is responsible for providing data access mechanisms to the data source
* of XOOPS user class objects.
*
* @author  Simon Roberts <simon@chronolabs.coop>
* @package kernel
*/
class LinkedinbombOauthHandler extends XoopsPersistableObjectHandler
{

	var $_api_config = 	array(	'appKey'       => '',
	  							'appSecret'    => '',
	  							'callbackUrl'  => NULL	); 
	// Objects  
	var $_api 	 = 	NULL;
	var $_obj	 = 	NULL;
	
	function __construct(&$db) 
    {
		$this->db = $db;
        parent::__construct($db, 'lib_oauth', 'LinkedinbombOauth', "oauth_id", "mode");
        
        $module_handler = xoops_gethandler('module');
    	$config_handler = xoops_gethandler('config');
    	if (!isset($GLOBALS['linkedinbombModule']))
    		$GLOBALS['linkedinbombModule'] = $module_handler->getByDirname('linkedinbomb');
    	if (!isset($GLOBALS['linkedinbombModuleConfig']))
    		$GLOBALS['linkedinbombModuleConfig'] = $config_handler->getConfigList($GLOBALS['linkedinbombModule']->getVar('mid'));

    	$this->_api_config['appKey'] = $GLOBALS['linkedinbombModuleConfig']['appKey'];
    	$this->_api_config['appSecret'] = $GLOBALS['linkedinbombModuleConfig']['appSecret'];
    	$this->_api_config['callbackUrl'] = $GLOBALS['linkedinbombModuleConfig']['callbackUrl'] . '?' . LINKEDIN::_GET_TYPE . '=initiate&' . LINKEDIN::_GET_RESPONSE . '=1';
    	$this->_api = new LinkedIn($this->_api_config);

    	$_SESSION['oauth']['linkedin']['authorized'] = (isset($_SESSION['oauth']['linkedin']['authorized'])) ? $_SESSION['oauth']['linkedin']['authorized'] : FALSE;
        if($_SESSION['oauth']['linkedin']['authorized'] === TRUE) {
            $this->_api->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
          	$this->_api->setResponseFormat(LINKEDIN::_RESPONSE_XML);
        }
    }

    function getByCriteria($criteria = NULL) {
    	if ($this->getCount($criteria)==0)
    		return $this->create();
    	$criteria->setStart(0);
    	$criteria->setLimit(1);
    	$objects = $this->getObjects($criteria, false);
    	if (!is_object($objects[0]))
    		return $this->create();
    	return $objects[0];
    }
    
    function parseUserSession($id, $firstname, $lastname, $avatar) {
    	$member_handler = xoops_gethandler('member');
    	$persons_handler = xoops_getmodulehandler('persons', 'linkedinbomb');
  		$criteria = new Criteria('`username`', $id);
    	if ($this->getCount($criteria)==0) {
    		// Gets Avatar
    		$write = XOOPS_ROOT_PATH.'/uploads/'.substr(md5($avatar), mt_rand(0,22),10).'.jpg';
    		linkedinbomb_getandwrite($avatar, $write);
			if (!is_object($GLOBALS['xoopsUser'])) {
	    		// Created New User
	    		$user = $member_handler->createUser();
				$user->setVar('name', $firstname. ' ' . $lastname);
				$user->setVar('uname', $firstname.$lastname.mt_rand(0,22));
				$user->setVar('pass', md5(xoops_makepass()));
				$user->setVar('user_avatar', basename($write));
				$user->setVar('user_regdate', time());
				$user->setVar('last_login', time());
				$user->setVar('level', 1);
				$user = $member_handler->getUser($uid = $member_handler->insertUser($user, true));
				$GLOBALS['xoopsDB']->queryF("INSERT INTO `".$GLOBALS['xoopsDB']->prefix('groups_users_link')."` (`groupid`, `uid`) VALUES (".XOOPS_GROUP_USERS.",".$uid.')');
			} else {
				$user = $GLOBALS['xoopsUser'];
			}
			// Person Record
			$person = $persons_handler->create();
			$person->setVar('id', $id);
			$person->setVar('uid', $user->getVar('uid'));
			$person->setVar('first-name', $firstname);
			$person->setVar('last-name', $lastname);
			$person->setVar('picture-url', $avatar);
			$person->setDirty(true);
			$person_id = $persons_handler->insert($person, true);
			$person = $persons_handler->get($person_id);
			//Creates Oauth Record for harvesting
			$oauth = $this->create();
			$oauth->setVar('uid', $user->getVar('uid'));
			$oauth->setVar('person_id', $person_id);
			$oauth->setVar('ip', $ip = linkedinbomb_getIP());
			$oauth->setVar('netddy', gethostbyaddr($ip));
			$oauth->setVar('username', $id);
			$oauth->setVar('mode', 'valid');
			$oauth->setVar('created', time());
			$oauth->setVar('access_oauth_token', $_SESSION['oauth']['linkedin']['access']['oauth_token']);
			$oauth->setVar('access_oauth_token_secret', $_SESSION['oauth']['linkedin']['access']['oauth_token_secret']);
			$oauth->setVar('access_oauth_expires_in', time() + $_SESSION['oauth']['linkedin']['access']['oauth_expires_in']);
			$oauth->setVar('request_oauth_token', $_SESSION['oauth']['linkedin']['request']['oauth_token']);
			$oauth->setVar('request_oauth_token_secret', $_SESSION['oauth']['linkedin']['request']['oauth_token_secret']);
			$oauth->setVar('request_oauth_expires_in', time() + $_SESSION['oauth']['linkedin']['request']['oauth_expires_in']);
			$oauth->setDirty(true);
			$oauth = $this->get($_SESSION['oauth']['linkedin']['oauth_id'] = parent::insert($oauth, true));
			$person->setVar('oauth_id', $_SESSION['oauth']['linkedin']['oauth_id']);
			$person = $persons_handler->get($person_id = $persons_handler->insert($person, true));
			$this->_obj = $oauth;
			$persons_handler->insert($person->updateProfile(), true);
			
			return $user;
    	} else {
    		$oauths = $this->getObjects($criteria, false);
    		if (is_object($oauths[0])) {
    			$user = $member_handler->getUser($oauths[0]->getVar('uid'));
    			if ($user->getVar('level')>0) {
					$oauths[0]->setVar('ip', $ip = linkedinbomb_getIP());
					$oauths[0]->setVar('netddy', gethostbyaddr($ip));
					$oauths[0]->setVar('mode', 'valid');
					$oauths[0]->setVar('updated', time());
					$oauths[0]->setVar('access_oauth_token', $_SESSION['oauth']['linkedin']['access']['oauth_token']);
					$oauths[0]->setVar('access_oauth_token_secret', $_SESSION['oauth']['linkedin']['access']['oauth_token_secret']);
					$oauths[0]->setVar('access_oauth_expires_in', time() + $_SESSION['oauth']['linkedin']['access']['oauth_expires_in']);
					$oauths[0]->setVar('request_oauth_token', $_SESSION['oauth']['linkedin']['request']['oauth_token']);
					$oauths[0]->setVar('request_oauth_token_secret', $_SESSION['oauth']['linkedin']['request']['oauth_token_secret']);
					$oauths[0]->setVar('request_oauth_expires_in', time() + $_SESSION['oauth']['linkedin']['request']['oauth_expires_in']);
		    		$_SESSION['oauth']['linkedin']['oauth_id'] = parent::insert($oauths[0], true);
		    		$this->_obj = $oauths[0];
					$user->setVar('last_login', time());
					$person = $persons_handler->get($oauths[0]->getVar('person_id'));
					if (is_object($person)) {
						if ($person->getVar('picture-url')!=$avatar) {
	    					$write = XOOPS_ROOT_PATH.'/uploads/'.(strlen($user->getVar('user_avatar'))==0||$user->getVar('user_avatar')=='blank.gif'?substr(md5($avatar), mt_rand(0,22),10).'.jpg':$user->getVar('user_avatar'));
	    					linkedinbomb_getandwrite($avatar, $write);
							$person->setVar('picture-url', $avatar);
							$persons_handler->insert($person);
							$user->setVar('user_avatar', basename($write));
						}
						$persons_handler->insert($person->updateProfile(), true);
					}
					$user = $member_handler->getUser($member_handler->insertUser($user, true));
					return $user;
    			}
    		}
    	}
    	return false;
    }
    
    function insert($object, $force = true) {
    	if($object->isNew()) {
    	    $criteria = new CriteriaCompo();
    		foreach($object->vars as $field => $values) {
    			if (!in_array($field, array($this->keyName, 'searched', 'polled', 'emailed', 'sms', 'synced', 'created', 'updated')))
    				if ($values['data_type']!=XOBJ_DTYPE_ARRAY)	
    					if (!empty($values['value'])||intval($values['value'])<>0)
    						$criteria->add(new Criteria('`'.$field.'`', $object->getVar($field)));
    		}
    		if ($this->getCount($criteria)>0) {
    			$obj = $this->getByCriteria($criteria);
    			if (is_object($obj)) {
    				return $obj->getVar($this->keyName);
    			}
    		}
    		
    		$object->setVar('created', time());
    	} else {
    		if (!$object->isDirty())
    			return $object->getVar($this->keyName);
    		$object->setVar('updated', time());
    	}
    	if ($object->getVar('profile_id')>0&&$object->getVar('person_id')==0) {
    		$profile_handler = xoops_getmodulehandler('profiles', 'linkedinbomb');
    		$profile = $profile_handler->get($object->getVar('profile_id'));
    		$object->setVar('person_id', $profile->getVar('person_id'));
    	} elseif ($object->getVar('profile_id')==0&&$object->getVar('person_id')>0) {
    		$persons_handler = xoops_getmodulehandler('persons', 'linkedinbomb');
    		$person = $persons_handler->get($object->getVar('person_id'));
    		$object->setVar('profile_id', $person->getVar('profile_id'));
    	}
    	return parent::insert($object, $force);
    }
}

?>