<?php

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}
/**
 * Class for Blue Room Xcenter
 * @author Simon Roberts <simon@xoops.org>
 * @copyright copyright (c) 2009-2003 XOOPS.org
 * @package kernel
 */
class LinkedinbombPersons extends XoopsObject
{

    function __construct($id = null)
    {
        $this->initVar('person_id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('profile_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('publication_ids', XOBJ_DTYPE_ARRAY, array(), false);
		$this->initVar('authors_ids', XOBJ_DTYPE_ARRAY, array(), false);
		$this->initVar('inventors_ids', XOBJ_DTYPE_ARRAY, array(), false);
		$this->initVar('id', XOBJ_DTYPE_TXTBOX, null, false, 32);		
		$this->initVar('first-name', XOBJ_DTYPE_TXTBOX, null, false, 128);
		$this->initVar('last-name', XOBJ_DTYPE_TXTBOX, null, false, 128);
		$this->initVar('headline', XOBJ_DTYPE_TXTBOX, null, false, 198);
		$this->initVar('picture-url', XOBJ_DTYPE_URL, null, false, 500);
		$this->initVar('site-standard-profile-request', XOBJ_DTYPE_URL, null, false, 500);
        $this->initVar('location_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('uid', XOBJ_DTYPE_INT, null, false);
        $this->initVar('oauth_id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('searched', XOBJ_DTYPE_INT, null, false);
		$this->initVar('created', XOBJ_DTYPE_INT, null, false); // Removed Unicode in 2.10
		$this->initVar('updated', XOBJ_DTYPE_INT, null, false); // Removed Unicode in 2.10
		$this->initVar('emailed', XOBJ_DTYPE_INT, null, false);
		$this->initVar('polled', XOBJ_DTYPE_INT, null, false);
		$this->initVar('crawled', XOBJ_DTYPE_INT, null, false);
		
		if ($id>0) {
			$handler = new LinkedinbombPersonsHandler($GLOBALS['xoopsDB']);
			$object = $handler->get($id);
			if (is_object($object)) {
				if (is_a($object, 'LinkedinbombPersons')) {
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
   
    
    
    function getName() {
    	return $this->getVar('street1').', '.$this->getVar('city').', '.$this->getVar('postal-code');
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
    
    function toArray($donotinclude_profile=false, $u=0) {
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
    	
        $locations_handler = xoops_getmodulehandler('locations', 'linkedinbomb');
	    if ($locations = $locations_handler->get($this->getVar('location_id'))) {
	    	$ret['location'] = $locations->toArray(true);
	    }
	    
    	$profiles_handler = xoops_getmodulehandler('profiles', 'linkedinbomb');
    	if ($ret['profile_id']>0&&$donotinclude_profile==false) {
    		$profile = $profiles_handler->get($ret['profile_id']);
    		if (is_object($profile)) {
    			$ret['profile'] = $profile->toArray(false, $u); 
    		} 
    	}
    	return $ret;
    }

    function updateProfile() {
    	$oauth_handler = xoops_getmodulehandler('oauth', 'linkedinbomb');
	    $profiles_handler = xoops_getmodulehandler('profiles', 'linkedinbomb');
	    $persons_handler = xoops_getmodulehandler('persons', 'linkedinbomb');
    	$aspr_handler = xoops_getmodulehandler('aspr', 'linkedinbomb');
    	$aspr_http_headers = xoops_getmodulehandler('aspr_http_headers', 'linkedinbomb');
    	
    	if ($this->getVar('oauth_id')>0) {
	    	$oauth = $oauth_handler->get($this->getVar('oauth_id'));
    		$oauth_handler->_api->setTokenAccess($oauth->getAccessToken());
          	$oauth_handler->_api->setResponseFormat(LINKEDIN::_RESPONSE_XML);
    	} else {
    		if (isset($_SESSION['oauth']['linkedin']['oauth_id']))
    			$oauth = $oauth_handler->get($_SESSION['oauth']['linkedin']['oauth_id']);
	    	$oauth_handler->_api->setTokenAccess($oauth->getAccessToken());
	        $oauth_handler->_api->setResponseFormat(LINKEDIN::_RESPONSE_XML);
    	}
    	if ($this->getVar('profile_id')!=0) {
    		$profile = $profiles_handler->get($this->getVar('profile_id'));
    	} else {
    		$profile = $profiles_handler->create();
    	}
    	$aspr = $aspr_handler->getByCriteria(new Criteria('person_id', $this->getVar('person_id')));
    	if ($aspr->isNew()) {
			$response = $oauth_handler->_api->profile('id='.$this->getVar('id').':(id,first-name,last-name,maiden-name,formatted-name,phonetic-first-name,phonetic-last-name,formatted-phonetic-name,headline,location:(name,country:(code)),industry,distance,relation-to-viewer:(distance),last-modified-timestamp,current-share,network,connections,num-connections,num-connections-capped,summary,specialties,proposal-comments,associations,honors,interests,positions,publications,patents,languages,skills,certifications,educations,courses,volunteer,three-current-positions,three-past-positions,num-recommenders,recommendations-received,phone-numbers,im-accounts,twitter-accounts,primary-twitter-account,bound-account-types,mfeed-rss-url,following,date-of-birth,main-address,site-standard-profile-request,api-standard-profile-request:(url,headers),public-profile-url,related-profile-views,picture-url)');
    	} else {
    		$http_headers = $aspr_http_headers->getObjects(new Criteria('aspr_id', $aspr->getVar('aspr_id')));
    		$headers = array();
    		foreach($http_headers as $http_header) {
    			$headers[] = $http_header->getVar('name').': '.$http_header->getVar('value');
    		}
    		$response = $oauth_handler->_api->extendedprofile(':(id,first-name,last-name,maiden-name,formatted-name,phonetic-first-name,phonetic-last-name,formatted-phonetic-name,headline,location:(name,country:(code)),industry,distance,relation-to-viewer:(distance),last-modified-timestamp,current-share,num-connections,num-connections-capped,summary,specialties,proposal-comments,associations,honors,interests,positions,publications,patents,languages,skills,certifications,educations,courses,volunteer,three-current-positions,three-past-positions,num-recommenders,recommendations-received,phone-numbers,im-accounts,twitter-accounts,primary-twitter-account,bound-account-types,mfeed-rss-url,following,date-of-birth,main-address,site-standard-profile-request,api-standard-profile-request:(url,headers),public-profile-url,related-profile-views,picture-url)', $aspr->getVar('url'), $headers);
    	}
		if($response['success'] === TRUE) {
			$data = linkedinbomb_object2array(new SimpleXMLElement($response['linkedin']));
			$profile->setVars($data);
			$profile->setVar('person_id', $this->getVar('person_id'));
			$profile = $profiles_handler->get($profile_id = $profiles_handler->insert($profile, true));
			$this->setVar('profile_id', $profile_id);
			$this->setVar('polled', time());
			$this->setVar('crawled', time()+$GLOBALS['linkedinbombModuleConfig']['crawlnext']);
			$persons_handler->insert($this, true);
			$profiles_handler->insert($profile->processData($data, $this));
			return $this;
    	}
    	return false;
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
class LinkedinbombPersonsHandler extends XoopsPersistableObjectHandler
{
    function __construct(&$db) 
    {
		$this->db = $db;
        parent::__construct($db, 'lib_persons', 'LinkedinbombPersons', "person_id", "id");
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
    
    function insert($object, $force = true) {
    	if (is_object($object)) {
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
	    			if (is_object($obj)&&!$obj->isNew()) {
	    				return $obj->getVar($this->keyName);
	    			}
	    		}
	    		$object->setVar('created', time());
	    	} else {
	    		if (!$object->isDirty())
	    			return $object->getVar($this->keyName);
	    		$object->setVar('updated', time());
	    	}
	    	if (isset($_SESSION['oauth']['linkedin']['oauth_id']))
	    		$object->setVar('oauth_id', $_SESSION['oauth']['linkedin']['oauth_id']);
	    		
	    	return parent::insert($object, $force);
    	}
    }
}

?>