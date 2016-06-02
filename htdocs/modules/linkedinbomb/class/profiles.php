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
class LinkedinbombProfiles extends XoopsObject
{

    function __construct($id = null)
    {
        $this->initVar('profile_id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('person_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('maiden-name', XOBJ_DTYPE_TXTBOX, null, false, 128);
		$this->initVar('formatted-name', XOBJ_DTYPE_TXTBOX, null, false, 198);
		$this->initVar('phonetic-first-name', XOBJ_DTYPE_TXTBOX, null, false, 198);
		$this->initVar('phonetic-last-name', XOBJ_DTYPE_TXTBOX, null, false, 198);
		$this->initVar('formatted-phonetic-name', XOBJ_DTYPE_TXTBOX, null, false, 198);
		$this->initVar('headline', XOBJ_DTYPE_TXTBOX, null, false, 500);
		$this->initVar('location_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('industry', XOBJ_DTYPE_TXTBOX, null, false, 198);		
		$this->initVar('distance', XOBJ_DTYPE_TXTBOX, null, false, 64);
        $this->initVar('relation-to-viewer', XOBJ_DTYPE_TXTBOX, null, false, 64);
        $this->initVar('current-status', XOBJ_DTYPE_TXTBOX, null, false, 140);
        $this->initVar('last-modified-timestamp', XOBJ_DTYPE_INT, null, false);
        $this->initVar('current-share', XOBJ_DTYPE_TXTBOX, null, false, 255);
        $this->initVar('network', XOBJ_DTYPE_TXTBOX, null, false, 128);
        $this->initVar('connections', XOBJ_DTYPE_TXTBOX, null, false, 32);
        $this->initVar('num-connections', XOBJ_DTYPE_TXTBOX, null, false, 32);
        $this->initVar('num-connections-capped', XOBJ_DTYPE_TXTBOX, null, false, 32);
		$this->initVar('connections_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('positions_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('publications_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('patents_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('languages_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('skills_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('companies_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('educations_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('courses_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('volunteer_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('three-current-positions_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('three-past-positions_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('summary', XOBJ_DTYPE_OTHER, '', false);
        $this->initVar('specialties', XOBJ_DTYPE_OTHER, '', false);
        $this->initVar('proposal-comments', XOBJ_DTYPE_OTHER, '', false);
        $this->initVar('associations', XOBJ_DTYPE_OTHER, '', false);
        $this->initVar('honors', XOBJ_DTYPE_OTHER, '', false);
        $this->initVar('interests', XOBJ_DTYPE_OTHER, '', false);
        $this->initVar('num-recommenders', XOBJ_DTYPE_INT, '', false);
        $this->initVar('phone_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('im_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('twitter_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('primary_twitter_id', XOBJ_DTYPE_INT, false, false);
        $this->initVar('date-of-birth', XOBJ_DTYPE_TXTBOX, '', false, 10);
        $this->initVar('main-address', XOBJ_DTYPE_TXTBOX, '', false, 255);
        $this->initVar('picture-url', XOBJ_DTYPE_URL, '', false, 500);
        $this->initVar('site-standard-profile-request', XOBJ_DTYPE_ARRAY, array(), false, 500);
        $this->initVar('api-standard-profile-request_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('public-profile-url', XOBJ_DTYPE_URL, '', false, 500);
        $this->initVar('searched', XOBJ_DTYPE_INT, null, false); // Removed Unicode in 2.10
		$this->initVar('emailed', XOBJ_DTYPE_INT, null, false); // Removed Unicode in 2.10
		$this->initVar('sms', XOBJ_DTYPE_INT, null, false); // Removed Unicode in 2.10
		$this->initVar('created', XOBJ_DTYPE_INT, null, false); // Removed Unicode in 2.10
		$this->initVar('updated', XOBJ_DTYPE_INT, null, false); // Removed Unicode in 2.10
		
		if ($id>0) {
			$handler = new LinkedinbombProfilesHandler($GLOBALS['xoopsDB']);
			$object = $handler->get($id);
			if (is_object($object)) {
				if (is_a($object, 'LinkedinbombProfiles')) {
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
   
    
    function getCountryID($code) {
    	$countries_handler = xoops_getmodulehandler('countries', 'linkedinbomb');
    	$criteria = new Criteria('`code`', strtoupper($code));
    	if ($countries = $countries_handler->getObjects($criteria, false)) {
    		if (is_object($countries[0])) {
    			return $countries[0]->getVar('country_id');
    		}
    	}
    	return 0;
    }
    
	function getAddressID($data, $person, $identity=0) {
    	$addresses_handler = xoops_getmodulehandler('addresses', 'linkedinbomb');
    	if ($identity==0)
    		$address = $addresses_handler->create();
    	else 
    		$address = $addresses_handler->get($identity);
    	$address->setVars($data);
    	return $addresses_handler->insert($address, true);
    }
    
	function getContactInfoIDS($data, $person, $identities=array()) {
    	$contact_info_handler = xoops_getmodulehandler('contact_info', 'linkedinbomb');
    	$contact_infos = $contact_info_handler->getObjects(new Criteria('`contact-info_id`', '('.implode(',', $identities).')', 'IN'), true);
    	if (count($contact_infos)>0) {
    		foreach($contact_infos as $id => $object) {
    			$found=false;
	    		foreach($data as $key => $value) {
	    			if ($key==$object->getVar('type')&&$value==$object->getVar('value')) {
	    				$found=true;
	    			}
	    		}
	    		if ($found==false) {
	    			$contact_info_handler->delete($object);
	    			unset($contact_infos[$id]);
	    		}
    		}
    		$ids = array_keys($contact_infos);
    		foreach($data as $key => $value) {
				$found=false;    			
    			foreach($contact_infos as $id => $object) {
    				if ($key==$object->getVar('type')&&$value==$object->getVar('value')) {
		    			$found=true;
		    		}
    			}
    			if ($found==true) {
	    			unset($data[$key]);
	    		}
	    	}
	    	if (count($data)>0) {
	    		foreach($data as $key => $value) {
	    			$contact = $contact_info_handler->create();
	    			$contact->setVar('type', $key);
	    			$contact->setVar('value', $value);
	    			$ids[] = $contact_info_handler->insert($contact, true);
	    		}
	    	}
    	} elseif (count($data)>0) {
    		$ids = array();
    		foreach($data as $key => $value) {
    			$contact = $contact_info_handler->create();
    			$contact->setVar('type', $key);
    			$contact->setVar('value', $value);
    			$ids[] = $contact_info_handler->insert($contact, true);
    		}
    	}
    	return $ids;
    }
    
    
    function getLocationID($location, $person, $identity=0) {
    	$locations_handler = xoops_getmodulehandler('locations', 'linkedinbomb');
    	if ($identity!=0)
    		$loc = $locations_handler->get($identity);
    	else
    		$loc = $locations_handler->create();
    	foreach($location as $key => $value) {
    		switch ($key) {
    			case 'name':
    				$loc->setVar('name', $value);
    				break;
    			case 'contact-info':
    				$loc->setVar('contact-info_ids', $this->getContactInfoIDS($value, $person, $location->getVar('contact-info_ids')));
    				break;
    			case 'address':
    				$loc->setVar('address_id', $this->getAddressID($value, $person, $location->getVar('address_id')));
    				break;
    			case 'country':
    				$loc->setVar('country_id', $this->getCountryID($value['code']));
    				break;	
    		}
    	}	
    	return $locations_handler->insert($loc, true);
    }
    
    function scanForPersons($data, $connecting_person_id = 0, $aspr_idb = 0) {
    	if ($connecting_person_id!=0&&$aspr_idb!=$GLOBALS['aspr_id']) {
    		$aspr_idb = $GLOBALS['aspr_id'];
    	}
    	$connections_handler = xoops_getmodulehandler('connections', 'linkedinbomb');
    	if (is_array($data))
	    	if (in_array('person', array_keys($data))) {
	    		if (isset($data['person'][0])) {
	    			foreach($data['person'] as $value) {
	    				$id = $this->getPersonID($value);
	    				if ($connecting_person_id!=0&&isset($value)&&count($value)>0) {
			    			$criteria = new CriteriaCompo();
			    			if ($this->getVar('profile_id')!=0)
			    				$criteria->add(new Criteria('`request_profile_id`', $this->getVar('profile_id')));
			    			if ($this->getVar('person_id')!=0)
			    				$criteria->add(new Criteria('`request_person_id`', $this->getVar('person_id')));
			    			if ($connecting_person_id!=0)
			    				$criteria->add(new Criteria('`connection_person_id`', $connecting_person_id));
			    			if ($id!=0)
			    				$criteria->add(new Criteria('`person_id`', $id));
	    					$connection = $connections_handler->getByCriteria($criteria);
	    					$connection->setVar('request_profile_id', $this->getVar('profile_id'));
	    					$connection->setVar('request_person_id', $this->getVar('person_id'));
	    					$connection->setVar('connection_person_id', $connecting_person_id);
	    					$connection->setVar('person_id', $id);
	    					$connection->setVar('connection_aspr_id', $aspr_idb);
	    					$connection->setVar('aspr_id', $GLOBALS['aspr_id']);
	    					$conn_ids[] = $connections_handler->insert($connection, true);
	    				}
	    				$this->scanForPersons($value, 0, $aspr_idb);
	    			}
	    		} elseif (isset($data['person']['id'])) {
	    			$id = $this->getPersonID($data['person']);
	    			if ($connecting_person_id!=0&&isset($value)&&count($value)>0) {
			    		$criteria = new CriteriaCompo();
			    		if ($this->getVar('profile_id')!=0)
			    			$criteria->add(new Criteria('`request_profile_id`', $this->getVar('profile_id')));
			    		if ($this->getVar('person_id')!=0)
			    			$criteria->add(new Criteria('`request_person_id`', $this->getVar('person_id')));
			    		if ($connecting_person_id!=0)
			    			$criteria->add(new Criteria('`connection_person_id`', $connecting_person_id));
			    		if ($id!=0)
			    			$criteria->add(new Criteria('`person_id`', $id));
	    				$connection = $connections_handler->getByCriteria($criteria);
	    				$connection->setVar('request_profile_id', $this->getVar('profile_id'));
	    				$connection->setVar('request_person_id', $this->getVar('person_id'));
	    				$connection->setVar('connection_person_id', $connecting_person_id);
	    				$connection->setVar('person_id', $id);
	    				$connection->setVar('connection_aspr_id', $aspr_idb);
	    				$connection->setVar('aspr_id', $GLOBALS['aspr_id']);
	    				$conn_ids[] = $connections_handler->insert($connection, true);
	    			}
	    			$this->scanForPersons($data['person'], 0, $aspr_idb);
	    		}
	    	} else {
	    		foreach($data as $key => $value) {
	    			$this->scanForPersons($data[$key], 0, $aspr_idb);
	    		}
	 		}
    }
    
    function getPersonID($data, $as_object = false) {
    	$persons_handler = xoops_getmodulehandler('persons', 'linkedinbomb');
    	$criteria = new Criteria('`id`', $data['id']);
    	$person = $persons_handler->getByCriteria($criteria);
    	$person->setVars($data);
    	$person = $persons_handler->get($person_id = $persons_handler->insert($person, true));    	
    	if (isset($data['site-standard-profile-request']['url'][0])) {
    		$person->setVar('site-standard-profile-request', $data['site-standard-profile-request']['url'][0]);
    	}
    	if (isset($data['location'])) {
    		$person->setVar('location_id', $this->getLocationID($data['location'], $person, $person->getVar('location_id'))); 
    	}
    	if (isset($data['api-standard-profile-request'])) {
			$person->setVar('aspr_id', $GLOBALS['aspr_id'] = $this->getAsprID($data['api-standard-profile-request'], $person_id));
    	} else {
    		$person->setVar('aspr_id', $GLOBALS['aspr_id'] = 0);
    	}
    	$person_id = $persons_handler->insert($person, true);
    	if ($as_object==true)
    		return $person;
    	else
    		return $person_id;
    }
    
    function getAsprID($data, $person_id=0) {
   	    $aspr_handler = xoops_getmodulehandler('aspr', 'linkedinbomb');
   		$criteria = new CriteriaCompo();
   		if ($person_id!=0)
   			$criteria->add(new Criteria('person_id', $person_id));
   		if ($this->getVar('person_id')!=0)
   			$criteria->add(new Criteria('request_person_id', $this->getVar('person_id')));
   		if ($this->getVar('profile_id')!=0)
   			$criteria->add(new Criteria('request_profile_id', $this->getVar('profile_id')));
		$aspr = $aspr_handler->getByCriteria($criteria, false);
   		$aspr->setVar('person_id', $person_id);
   		$aspr->setVar('request_person_id', $this->getVar('person_id'));
   		$aspr->setVar('request_profile_id', $this->getVar('profile_id'));
   		$aspr->setVar('url', $data['url']);
   		$aspr = $aspr_handler->get($aspr_id = $aspr_handler->insert($aspr, true));
   		$aspr->setVar('http_headers_ids', $this->getAsprHeadersIDS($data['headers']['http-header'], $aspr_id, $aspr->getVar('http_headers_ids'), array()));
   		return $aspr_handler->insert($aspr, true);
    }

    function getAsprHeadersIDS($data, $aspr_id=0, $ids = array(), $ret = array()) {
    	$aspr_http_headers_handler = xoops_getmodulehandler('aspr_http_headers', 'linkedinbomb');
    	if (count($ids)>0) {
    		$criteria = new Criteria('`http_headers_id`', '('.implode(',', $ids).')', 'IN');
    		$aspr_http_headers_handler->deleteAll($criteria);
    	}	
    	if (in_array('name', array_keys($data))) {
    		$aspr_http_header = $aspr_http_headers_handler->create();
    		$aspr_http_header->setVars($data);
    		$aspr_http_header->setVar('aspr_id', $aspr_id);
    		$ret[] = $aspr_http_headers_handler->insert($aspr_http_header, true);
    	} else {
    		foreach($data as $key => $value) {
    			$ret = $this->getAsprHeadersIDS($value, $aspr_id, array(), $ret);
    		}
    	}
    	return $ret;
    }
    
    function getConnectionsIDS($data, $connectedperson, $ret = array()) {
    	$connections_handler = xoops_getmodulehandler('connections', 'linkedinbomb');
    	static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
				    		$person = $this->getPersonID($data[$key], true);
				    		$criteria = new CriteriaCompo();
				    		if ($this->getVar('profile_id')!=0)
				    			$criteria->add(new Criteria('`request_profile_id`', $this->getVar('profile_id')));
				    		if ($this->getVar('person_id')!=0)
				    			$criteria->add(new Criteria('`request_person_id`', $this->getVar('person_id')));
				    		if ($connectedperson->getVar('profile_id')!=0)
				    			$criteria->add(new Criteria('`connection_profile_id`', $connectedperson->getVar('profile_id')));
				    		if ($connectedperson->getVar('person_id')!=0)
				    			$criteria->add(new Criteria('`connection_person_id`', $connectedperson->getVar('person_id')));
				    		if ($person->getVar('person_id')!=0)
				    			$criteria->add(new Criteria('`person_id`', $person->getVar('person_id')));
				    		if ($person->getVar('profile_id')!=0)
				    			$criteria->add(new Criteria('`profile_id`', $person->getVar('profile_id')));
				    		if ($person->getVar('aspr_id')!=0)
				    			$criteria->add(new Criteria('`aspr_id`', $person->getVar('aspr_id')));
				    		$connection = $connections_handler->getByCriteria($criteria);
				    		$connection->setVar('request_profile_id', $this->getVar('profile_id'));
				    		$connection->setVar('request_person_id', $this->getVar('person_id'));
				    		$connection->setVar('connection_person_id', $connectedperson->getVar('person_id'));
				    		$connection->setVar('connection_profile_id', $connectedperson->getVar('profile_id'));
				    		$connection->setVar('person_id', $person->getVar('person_id'));
				    		$connection->setVar('profile_id', $person->getVar('profile_id'));
				    		$connection->setVar('connection_aspr_id', $connectedperson->getVar('aspr_id'));
				    		$connection->setVar('aspr_id', $person->getVar('aspr_id'));
				    		$ret[] = $connections_handler->insert($connection, true);
				    		break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
		    					$person = $this->getPersonID($data[$key][$i], true);
					    		$criteria = new CriteriaCompo();
					    		if ($this->getVar('profile_id')!=0)
					    			$criteria->add(new Criteria('`request_profile_id`', $this->getVar('profile_id')));
					    		if ($this->getVar('person_id')!=0)
					    			$criteria->add(new Criteria('`request_person_id`', $this->getVar('person_id')));
					    		if ($connectedperson->getVar('profile_id')!=0)
					    			$criteria->add(new Criteria('`connection_profile_id`', $connectedperson->getVar('profile_id')));
					    		if ($connectedperson->getVar('person_id')!=0)
					    			$criteria->add(new Criteria('`connection_person_id`', $connectedperson->getVar('person_id')));
					    		if ($person->getVar('person_id')!=0)
					    			$criteria->add(new Criteria('`person_id`', $person->getVar('person_id')));
					    		if ($person->getVar('profile_id')!=0)
					    			$criteria->add(new Criteria('`profile_id`', $person->getVar('profile_id')));
					    		if ($person->getVar('aspr_id')!=0)
					    			$criteria->add(new Criteria('`aspr_id`', $person->getVar('aspr_id')));
					    		$connection = $connections_handler->getByCriteria($criteria);
					    		$connection->setVar('request_profile_id', $this->getVar('profile_id'));
					    		$connection->setVar('request_person_id', $this->getVar('person_id'));
					    		$connection->setVar('connection_person_id', $connectedperson->getVar('person_id'));
					    		$connection->setVar('connection_profile_id', $connectedperson->getVar('profile_id'));
					    		$connection->setVar('person_id', $person->getVar('person_id'));
					    		$connection->setVar('profile_id', $person->getVar('profile_id'));
					    		$connection->setVar('connection_aspr_id', $connectedperson->getVar('aspr_id'));
					    		$connection->setVar('aspr_id', $person->getVar('aspr_id'));
					    		$ret[] = $connections_handler->insert($connection, true);	
	    					}		
	    					break;	
	    			}
	    		}
	    	}
    	} else {
    		$person = $this->getPersonID($data, true);
    		if (is_object($person)) {
				$criteria = new CriteriaCompo();
				if ($this->getVar('profile_id')!=0)
					$criteria->add(new Criteria('`request_profile_id`', $this->getVar('profile_id')));
				if ($this->getVar('person_id')!=0)
					$criteria->add(new Criteria('`request_person_id`', $this->getVar('person_id')));
				if ($connectedperson->getVar('profile_id')!=0)
					$criteria->add(new Criteria('`connection_profile_id`', $connectedperson->getVar('profile_id')));
				if ($connectedperson->getVar('person_id')!=0)
					$criteria->add(new Criteria('`connection_person_id`', $connectedperson->getVar('person_id')));
				if ($person->getVar('person_id')!=0)
					$criteria->add(new Criteria('`person_id`', $person->getVar('person_id')));
				if ($person->getVar('profile_id')!=0)
					$criteria->add(new Criteria('`profile_id`', $person->getVar('profile_id')));
				if ($person->getVar('aspr_id')!=0)
					$criteria->add(new Criteria('`aspr_id`', $person->getVar('aspr_id')));
				$connection = $connections_handler->getByCriteria($criteria);
				$connection->setVar('request_profile_id', $this->getVar('profile_id'));
				$connection->setVar('request_person_id', $this->getVar('person_id'));
				$connection->setVar('connection_person_id', $connectedperson->getVar('person_id'));
				$connection->setVar('connection_profile_id', $connectedperson->getVar('profile_id'));
				$connection->setVar('person_id', $person->getVar('person_id'));
				$connection->setVar('profile_id', $person->getVar('profile_id'));
				$connection->setVar('connection_aspr_id', $connectedperson->getVar('aspr_id'));
	    		$connection->setVar('aspr_id', $person->getVar('aspr_id'));
	    		$ret[] = $connections_handler->insert($connection, true);
    		}	
    	}
    	$total = 0;
    	return $ret;
    }
    
    function getPositionsIDS($data, $person, $ret = array()) {
    	static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
    						$ret[] = $this->getPositionID($data[$key], $person);
    						break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
	    						$ret[] = $this->getPositionID($data[$key][$i], $person);
	    					}
	    					break;
	    			}	
	    		}
	    	}
    	} else {
	    	$ret[] = $this->getPositionID($data, $person);
    	}
	    return $ret;
    }
    
    function getPositionID($data, $person) {
		$profiles_positions_handler = xoops_getmodulehandler('profiles_positions', 'linkedinbomb');
		$criteria = new CriteriaCompo();
		if (isset($data['id']))
			$criteria->add(new Criteria('`id`', $data['id']));
		if (isset($data['title']))
			$criteria->add(new Criteria('`title`', $data['title']));
		if (isset($data['company']))
			$criteria->add(new Criteria('`company_id`', $company_id = $this->getCompanyID($data['company'], $person)));
		if ($person->getVar('person_id')!=0)
    		$criteria->add(new Criteria('`person_id`', $person->getVar('person_id')));
    	if ($person->getVar('profile_id')!=0)
    		$criteria->add(new Criteria('`profile_id`', $person->getVar('profile_id')));
		$position = $profiles_positions_handler->getByCriteria($criteria);
		$position->setVars($data);
		$position->setVar('profile_id', $this->getVar('profile_id'));
		if (isset($data['start-date']))
			$position->setVar('start-date', $data['start-date']['month'].'/'.$data['start-date']['year']);
		if (isset($data['end-date']))
			$position->setVar('end-date', $data['end-date']['month'].'/'.$data['end-date']['year']);
		if ($company_id!=0)
			$position->setVar('company_id', $company_id);
		return $profiles_positions_handler->insert($position, true);
    }
    
	function getCompanyID($data, $person) {
		$companies_handler = xoops_getmodulehandler('companies', 'linkedinbomb');
		$criteria = new CriteriaCompo();
		if (isset($data['id']))
			$criteria->add(new Criteria('`id`', $data['id']));
		if (isset($data['name']))
			$criteria->add(new Criteria('`name`', $data['name'], 'LIKE'));			
		if (isset($data['industry']))
			$criteria->add(new Criteria('`industry`', $data['industry'], 'LIKE'));			
		$company = $companies_handler->getByCriteria($criteria);
		$company->setVars($data);
		if (isset($data['company-type']))
			$company->setVar('company-type_id', $this->getCompanyTypeID($data['company-type']));
		if (isset($data['specialties']))
			$company->setVar('specialties_ids', $this->getSpecialtiesIDS($data['specialties']));
		if (isset($data['locations']))
			$company->setVar('locations_ids', $this->getLocationsIDS($data['locations']));
		if (isset($data['status']))
			$company->setVar('status_id', $this->getStatusID($data['status']));
		return $companies_handler->insert($company, true);
    }
    
	function getStatusID($data) {
    	$status_handler = xoops_getmodulehandler('status', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['code']))
			$criteria->add(new Criteria('`code`', $data['code']));
		if (isset($data['name']))
			$criteria->add(new Criteria('`name`', $data['name'], 'LIKE'));			
		$status = $status_handler->getByCriteria($criteria);
		$status->setVars($data);
		return $status_handler->insert($status, true);
    }
    
    function getCompanyTypeID($data) {
    	$companies_type_handler = xoops_getmodulehandler('companies_type', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['code']))
			$criteria->add(new Criteria('`code`', $data['code']));
		if (isset($data['name']))
			$criteria->add(new Criteria('`name`', $data['name'], 'LIKE'));			
		$companies_type = $companies_type_handler->getByCriteria($criteria);
		$companies_type->setVars($data);
		return $companies_type_handler->insert($companies_type, true);
    }
    
	function getSpecialityID($data) {
    	$specialties_handler = xoops_getmodulehandler('specialties', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
    	if (is_array($data)) {
			if (isset($data['speciality']))
				$criteria->add(new Criteria('`specialty`', $data['speciality']));
    	} elseif (is_string($data)) {
    		if (empty($data))
    			return false;
    		$criteria->add(new Criteria('`specialty`', $data));
    	}
    	$speciality = $specialties_handler->getByCriteria($criteria);
    	if (is_array($data)) {
			$speciality->setVars($data);
    	} elseif (is_string($data)) {
    		$speciality->setVar('speciality', $data);
    	}
		return $specialties_handler->insert($speciality, true);
    }
    
    function getSpecialtiesIDS($data, $ret = array()) {
        static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
    						$ret[] = $this->getSpecialityID($data[$key], $person);
    						break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
	    						$ret[] = $this->getSpecialityID($data[$key][$i], $person);
	    					}
	    					break;
	    			}	
	    		}
	    	}
    	} else {
	    	$ret[] = $this->getSpecialityID($data, $person);
    	}
    	return $ret;
    }
    
	function getLocationsIDS($data, $ret = array()) {
        static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
    						$ret[] = $this->getLocationID($data[$key], $person);
    						break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
	    						$ret[] = $this->getLocationID($data[$key][$i], $person);
	    					}
	    					break;
	    			}	
	    		}
	    	}
    	} else {
	    	$ret[] = $this->getLocationID($data, $person);
    	}
    	return $ret;
     }
    
    function getPublicationsIDS($data, $person, $ret = array()) {
        static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
    						$ret[] = $this->getPublisherID($data[$key], $person);
    						break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
	    						$ret[] = $this->getPublisherID($data[$key][$i], $person);
	    					}
	    					break;
	    			}	
	    		}
	    	}
    	} else {
	    	$ret[] = $this->getPublisherID($data, $person);
    	}
    	return $ret;
    }
    
    function getPublisherID($data, $person) {
    	$profiles_publications_handler = xoops_getmodulehandler('profiles_publications', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['id']))
			$criteria->add(new Criteria('`id`', $data['id']));
		if (isset($data['title']))
			$criteria->add(new Criteria('`title`', $data['title'], 'LIKE'));			
		if (isset($data['publisher']))
			$criteria->add(new Criteria('`publisher`', $data['publisher'], 'LIKE'));			
		$publication = $profiles_publications_handler->getByCriteria($criteria);
		$publication->setVars($data);
		$publication->setVar('profile_id', $person->getVar('profile_id'));
		$publication->setVar('person_id', $person->getVar('person_id'));
		if (isset($data['date'])&&is_array($data['date']))
			$publication->setVar('date', $data['date']['year'].'/'.$data['date']['month'].'/'.$data['date']['day']);
		elseif (isset($data['date']))
			$publication->setVar('date', $data['date']);
		$publication = $profiles_publications_handler->get($publication_id = $profiles_publications_handler->insert($publication, true));
		if (isset($data['authors']))
			$publication->setVar('authors_ids', $this->getPublicationAuthorsIDS($data['authors'], $person, $publication_id, array()));
		return $profiles_publications_handler->insert($publication, true);
    	
    }
    
    function getPublicationAuthorsIDS($data, $person, $publication_id, $ret = array()) {
        static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
    						$ret[] = $this->getPublicationAuthorID($data[$key], $person);
    						break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
	    						$ret[] = $this->getPublicationAuthorID($data[$key][$i], $person);
	    					}
	    					break;
	    			}	
	    		}
	    	}
    	} else {
	    	$ret[] = $this->getPublicationAuthorID($data, $person);
    	}
    	return $ret;
    }
    
    function getPublicationAuthorID($data, $person, $publication_id) {
    	$profiles_publications_authors_handler = xoops_getmodulehandler('profiles_publications_authors', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['id']))
			$criteria->add(new Criteria('`id`', $data['id']));
		if (isset($data['name']))
			$criteria->add(new Criteria('`name`', $data['name'], 'LIKE'));			
		if (!empty($publication_id))
			$criteria->add(new Criteria('`publication_id`', $publication_id));			
		$author = $profiles_publications_authors_handler->getByCriteria($criteria);
		$author->setVars($data);
		$author->setVar('profile_id', $person->getVar('profile_id'));
		$author->setVar('person_id', $person->getVar('person_id'));
		$author->setVar('publication_id', $publication_id);
		if (isset($data['person']))
			$author->setVar('author_person_id', $this->getPersonID($data['person'], $person));
		return $profiles_publications_authors_handler->insert($author, true);
    }

    function getPatentsIDS($data, $person, $ret = array()) {
        static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
    						$ret[] = $this->getPatentID($data[$key], $person);
    						break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
	    						$ret[] = $this->getPatentID($data[$key][$i], $person);
	    					}
	    					break;
	    			}	
	    		}
	    	}
    	} else {
	    	$ret[] = $this->getPatentID($data, $person);
    	}
    	return $ret;
    }

    function getPatentsID($data, $person) {
    	$profiles_patents_handler = xoops_getmodulehandler('profiles_patents', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['id']))
			$criteria->add(new Criteria('`id`', $data['id']));
		if (isset($data['title']))
			$criteria->add(new Criteria('`title`', $data['title'], 'LIKE'));			
		if (isset($data['number']))
			$criteria->add(new Criteria('`number`', $data['number'], 'LIKE'));			
		$patent = $profiles_patents_handler->getByCriteria($criteria);
		$patent->setVars($data);
		$patent->setVar('profile_id', $person->getVar('profile_id'));
		$patent->setVar('person_id', $person->getVar('person_id'));
		$patent->setVar('date', $data['date']['year'].'/'.$data['date']['month'].'/'.$data['date']['day']);
		$patent = $profiles_patents_handler->get($patent_id = $profiles_patents_handler->insert($patent, true));
		if (isset($data['status']))
			$patent->setVar('status_id', $this->getPatentStatusID($data['status'], $person, $patent_id));
		if (isset($data['office']))
			$patent->setVar('office_id', $this->getPatentOfficeID($data['office'], $person, $patent_id));
		if (isset($data['inventors']))
			$patent->setVar('inventors_ids', $this->getPatentInventorsIDS($data['inventors'], $person, $patent_id));
			
			
			return $profiles_patents_handler->insert($patent, true);
    	
    }

	function getPatentStatusID($data, $person, $patent_id) {
    	$profiles_patents_status_handler = xoops_getmodulehandler('profiles_patents_status', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (!empty($patent_id))
			$criteria->add(new Criteria('`patent_id`', $patent_id));
    	if (isset($data['id']))
			$criteria->add(new Criteria('`id`', $data['id']));
		if (isset($data['name']))
			$criteria->add(new Criteria('`name`', $data['name'], 'LIKE'));			
		$status = $profiles_patents_status_handler->getByCriteria($criteria);
		$status->setVars($data);
		$status->setVar('profile_id', $person->getVar('profile_id'));
		$status->setVar('person_id', $person->getVar('person_id'));
		$status->setVar('patent_id', $patent_id);
		return $profiles_patents_status_handler->insert($status, true);
    }

    function getPatentOfficeID($data, $person, $patent_id) {
    	$profiles_patents_office_handler = xoops_getmodulehandler('profiles_patents_office', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (!empty($patent_id))
			$criteria->add(new Criteria('`patent_id`', $patent_id));
		if (isset($data['name']))
			$criteria->add(new Criteria('`name`', $data['name'], 'LIKE'));			
		$office = $profiles_patents_office_handler->getByCriteria($criteria);
		$office->setVars($data);
		$office->setVar('profile_id', $person->getVar('profile_id'));
		$office->setVar('person_id', $person->getVar('person_id'));
		$office->setVar('patent_id', $patent_id);
		return $profiles_patents_office_handler->insert($office, true);
    }

    function getPatentInventorsIDS($data, $person, $patent_id = 0,$ret = array()) {
        static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
    						$ret[] = $this->getPatentInventorID($data[$key], $person);
    						break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
	    						$ret[] = $this->getPatentInventorID($data[$key][$i], $person);
	    					}
	    					break;
	    			}	
	    		}
	    	}
    	} else {
	    	$ret[] = $this->getPatentInventorID($data, $person);
    	}
    	return $ret;
    }
    
    function getPatentInventorID($data, $person, $patent_id) {
    	$profiles_patents_inventors_handler = xoops_getmodulehandler('profiles_patents_inventors', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (!empty($patent_id))
			$criteria->add(new Criteria('`patent_id`', $patent_id));
		if (isset($data['name']))
			$criteria->add(new Criteria('`name`', $data['name'], 'LIKE'));			
		if (isset($data['id']))
			$criteria->add(new Criteria('`id`', $data['id'], 'LIKE'));			
		$inventors = $profiles_patents_inventors_handler->getByCriteria($criteria);
		$inventors->setVars($data);
		$inventors->setVar('profile_id', $person->getVar('profile_id'));
		$inventors->setVar('person_id', $person->getVar('person_id'));
		$inventors->setVar('patent_id', $patent_id);
		if (isset($data['person'])) {
			$inventors->setVar('inventor_person_id', $this->getPersonID($data['person'], false));
		}
		return $profiles_patents_inventors_handler->insert($inventors, true);
    }

    function getLanguagesIDS($data, $person, $ret = array()) {
        static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
    						$ret[] = $this->getLanguagesID($data[$key], $person);
    						break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
	    						$ret[] = $this->getLanguagesID($data[$key][$i], $person);
	    					}
	    					break;
	    			}	
	    		}
	    	}
    	} else {
	    	$ret[] = $this->getLanguagesID($data, $person);
    	}
    	return $ret;
    	
    }

    function getLanguagesID($data, $person) {
    	$profiles_languages_handler = xoops_getmodulehandler('profiles_languages', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['language']))
			$criteria->add(new Criteria('`language_id`', $language_id = $this->getLanguageID($data['language'], $person)));
		else 
			$language_id = 0;
		if (isset($data['proficiency']))
			$criteria->add(new Criteria('`proficiency_id`', $proficiency_id = $this->getProficienciesID($data['proficiency'], $person), 'LIKE'));
		else 
			$proficiency_id = 0;			
		if ($person->getVar('profile_id'))
			$criteria->add(new Criteria('`profile_id`', $person->getVar('profile_id')));			
		$language = $profiles_languages_handler->getByCriteria($criteria);
		$language->setVar('language_id', $language_id);
		$language->setVar('proficiency_id', $proficiency_id);
		$language->setVar('profile_id', $person->getVar('profile_id'));
		$language->setVar('person_id', $person->getVar('person_id'));
		return $profiles_languages_handler->insert($language, true);
    }

    function getLanguageID($data, $person) {
    	$languages_handler = xoops_getmodulehandler('languages', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['name']))
			$criteria->add(new Criteria('`name`', $data['name'], 'LIKE'));
		$language = $languages_handler->getByCriteria($criteria);
		$language->setVars($data);
		return $languages_handler->insert($language, true);
    }
    
	function getProficienciesID($data, $person) {
    	$proficiencies_handler = xoops_getmodulehandler('proficiencies', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['name']))
			$criteria->add(new Criteria('`name`', $data['name'], 'LIKE'));
		if (isset($data['level']))
			$criteria->add(new Criteria('`level`', $data['level'], 'LIKE'));
		$proficiency = $proficiencies_handler->getByCriteria($criteria);
		$proficiency->setVars($data);
		return $proficiencies_handler->insert($proficiency, true);
    }

    function getSkillsIDS($data, $person, $ret = array()) {
        static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
    						$ret[] = $this->getSkillsID($data[$key], $person);
    						break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
	    						$ret[] = $this->getSkillsID($data[$key][$i], $person);
	    					}
	    					break;
	    			}	
	    		}
	    	}
    	} else {
	    	$ret[] = $this->getSkillsID($data, $person);
    	}
    	return $ret;
    }

    function getSkillsID($data, $person) {
    	$profiles_skills_handler = xoops_getmodulehandler('profiles_skills', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
    	if (isset($data['years']))
			$criteria->add(new Criteria('`years_id`', $years_id = $this->getYearsID($data['years'], $person)));
		else 
			$years_id = 0;
		if (isset($data['skill']))
			$criteria->add(new Criteria('`skill_id`', $skill_id = $this->getSkillID($data['skill'], $person)));
		else 
			$skill_id = 0;
		if (isset($data['proficiency']))
			$criteria->add(new Criteria('`proficiency_id`', $proficiency_id = $this->getProficienciesID($data['proficiency'], $person), 'LIKE'));
		else 	
			$proficiency_id = 0;			
		if ($person->getVar('profile_id'))
			$criteria->add(new Criteria('`profile_id`', $person->getVar('profile_id')));			
		$skill = $profiles_skills_handler->getByCriteria($criteria);
		$skill->setVar('years_id', $years_id);
		$skill->setVar('skill_id', $skill_id);
		$skill->setVar('proficiency_id', $proficiency_id);
		$skill->setVar('profile_id', $person->getVar('profile_id'));
		$skill->setVar('person_id', $person->getVar('person_id'));
		return $profiles_skills_handler->insert($skill, true);
    }

    function getYearsID($data, $person) {
    	$years_handler = xoops_getmodulehandler('years', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['id']))
			$criteria->add(new Criteria('`id`', $data['id'], 'LIKE'));
    	if (isset($data['name']))
			$criteria->add(new Criteria('`name`', $data['name'], 'LIKE'));
		$year = $years_handler->getByCriteria($criteria);
		$year->setVars($data);
		return $years_handler->insert($year, true);
    }

    function getSkillID($data, $person) {
    	$skills_handler = xoops_getmodulehandler('skills', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['name']))
			$criteria->add(new Criteria('`name`', $data['name'], 'LIKE'));
		$skill = $skills_handler->getByCriteria($criteria);
		$skill->setVars($data);
		if (!in_array($person->getVar('profile_id'), $skill->getVar('profile_ids'))) {
			$ret = $skill->getVar('profile_ids');
			$ret[]=$person->getVar('profile_id');
			$skill->setVar('profile_ids', $ret);
		}
		return $skills_handler->insert($skill, true);
    }    

    function getCertificationsIDS($data, $person, $ret = array()) {
        static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
    						$ret[] = $this->getCertificationsID($data[$key], $person);
    						break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
	    						$ret[] = $this->getCertificationsID($data[$key][$i], $person);
	    					}
	    					break;
	    			}	
	    		}
	    	}
    	} else {
	    	$ret[] = $this->getCertificationsID($data, $person);
    	}
    	return $ret;
    }

    function getCertificationsID($data, $person) {
    	$profiles_companies_handler = xoops_getmodulehandler('profiles_companies', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['id']))
			$criteria->add(new Criteria('`id`', $data['id'], 'LIKE'));
    	if (isset($data['name']))
			$criteria->add(new Criteria('`name`', $data['name'], 'LIKE'));			
		if ($person->getVar('profile_id'))
			$criteria->add(new Criteria('`profile_id`', $person->getVar('profile_id')));			
		$certification = $profiles_companies_handler->getByCriteria($criteria);
		$certification->setVars($data);
		if (isset($data['authority']))
			$certification->setVar('authority_id', $this->getAuthoritiesID($data['authority'], $person));
		$certification->setVar('profile_id', $person->getVar('profile_id'));
		$certification->setVar('person_id', $person->getVar('person_id'));
		return $profiles_companies_handler->insert($certification, true);
    }

    function getAuthoritiesID($data, $person) {
    	$authorities_handler = xoops_getmodulehandler('authorities', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['id']))
			$criteria->add(new Criteria('`id`', $data['id']));
    	if (isset($data['name']))
			$criteria->add(new Criteria('`name`', $data['name'], 'LIKE'));
		$authority = $authorities_handler->getByCriteria($criteria);
		$authority->setVars($data);
		return $authorities_handler->insert($authority, true);
    }    

    function getEducationsIDS($data, $person, $ret = array()) {
        static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
    						$ret[] = $this->getEducationsID($data[$key], $person);
    						break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
	    						$ret[] = $this->getEducationsID($data[$key][$i], $person);
	    					}
	    					break;
	    			}	
	    		}
	    	}
    	} else {
	    	$ret[] = $this->getEducationsID($data, $person);
    	}
    	return $ret;
    }

    function getEducationsID($data, $person) {
    	$profiles_educations_handler = xoops_getmodulehandler('profiles_educations', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['id']))
			$criteria->add(new Criteria('`id`', $data['id'], 'LIKE'));
    	if (isset($data['school-name']))
			$criteria->add(new Criteria('`school-name`', $data['school-name'], 'LIKE'));			
    	if (isset($data['field-of-study']))
			$criteria->add(new Criteria('`field-of-study`', $data['field-of-study'], 'LIKE'));			
    	if (isset($data['degree']))
			$criteria->add(new Criteria('`degree`', $data['degree'], 'LIKE'));			
		if ($person->getVar('profile_id'))
			$criteria->add(new Criteria('`profile_id`', $person->getVar('profile_id')));			
		$education = $profiles_educations_handler->getByCriteria($criteria);
		$education->setVars($data);
		if (isset($data['start-date']))
			$education->setVar('start-date', $data['start-date']['year']);
		if (isset($data['end-date']))
			$education->setVar('end-date', $data['end-date']['year']);
		$education->setVar('profile_id', $person->getVar('profile_id'));
		$education->setVar('person_id', $person->getVar('person_id'));
		return $profiles_educations_handler->insert($education, true);
    }    

    function getCoursesIDS($data, $person, $ret = array()) {
        static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
    						$ret[] = $this->getCoursesID($data[$key], $person);
    						break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
	    						$ret[] = $this->getCoursesID($data[$key][$i], $person);
	    					}
	    					break;
	    			}	
	    		}
	    	}
    	} else {
	    	$ret[] = $this->getCoursesID($data, $person);
    	}
    	return $ret;
    }

    function getCoursesID($data, $person) {
    	$profiles_courses_handler = xoops_getmodulehandler('profiles_courses', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['id']))
			$criteria->add(new Criteria('`id`', $data['id'], 'LIKE'));
    	if (isset($data['school-name']))
			$criteria->add(new Criteria('`name`', $data['name'], 'LIKE'));			
    	if (isset($data['number']))
			$criteria->add(new Criteria('`number`', $data['number'], 'LIKE'));			
		if ($person->getVar('profile_id'))
			$criteria->add(new Criteria('`profile_id`', $person->getVar('profile_id')));			
		$course = $profiles_courses_handler->getByCriteria($criteria);
		$course->setVars($data);
		$course->setVar('profile_id', $person->getVar('profile_id'));
		$course->setVar('person_id', $person->getVar('person_id'));
		return $profiles_courses_handler->insert($course, true);
    }    

    function getVolunteerIDS($data, $person, $ret = array()) {
        static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
    						$ret[] = $this->getVolunteerID($data[$key], $person);
    						break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
	    						$ret[] = $this->getVolunteerID($data[$key][$i], $person);
	    					}
	    					break;
	    			}	
	    		}
	    	}
    	} else {
	    	$ret[] = $this->getVolunteerID($data, $person);
    	}
    	return $ret;
    }

    function getVolunteerID($data, $person) {
    	$profiles_volunteer_handler = xoops_getmodulehandler('profiles_volunteer', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['id']))
			$criteria->add(new Criteria('`id`', $data['id'], 'LIKE'));
    	if (isset($data['role']))
			$criteria->add(new Criteria('`role`', $data['role'], 'LIKE'));			
		if ($person->getVar('profile_id'))
			$criteria->add(new Criteria('`profile_id`', $person->getVar('profile_id')));			
		$volunteer = $profiles_volunteer_handler->getByCriteria($criteria);
		$volunteer->setVars($data);
		$volunteer->setVar('organization_id', $this->getOrganizationID($data['cause'], $person));
		$volunteer->setVar('cause_id', $this->getCauseID($data['cause'], $person));
		$volunteer->setVar('profile_id', $person->getVar('profile_id'));
		$volunteer->setVar('person_id', $person->getVar('person_id'));
		return $profiles_volunteer_handler->insert($volunteer, true);
    }    

    function getOrganizationID($data, $person) {
    	$organization_handler = xoops_getmodulehandler('organization', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['id']))
			$criteria->add(new Criteria('`id`', $data['id']));
    	if (isset($data['name']))
			$criteria->add(new Criteria('`name`', $data['name'], 'LIKE'));
		$organization = $organization_handler->getByCriteria($criteria);
		$organization->setVars($data);
		return $organization_handler->insert($organization, true);
    }    
    
    function getCauseID($data, $person) {
    	$causes_handler = xoops_getmodulehandler('causes', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['id']))
			$criteria->add(new Criteria('`id`', $data['id']));
    	if (isset($data['name']))
			$criteria->add(new Criteria('`name`', $data['name'], 'LIKE'));
		$cause = $causes_handler->getByCriteria($criteria);
		$cause->setVars($data);
    	if (!in_array($person->getVar('profile_id'), $cause->getVar('profile_ids'))) {
			$ret = $cause->getVar('profile_ids');
			$ret[]=$person->getVar('profile_id');
			$cause->setVar('profile_ids', $ret);
		}
		return $causes_handler->insert($cause, true);
    }    

    function getRecommendationsIDS($data, $person, $ret = array()) {
        static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
    						$ret[] = $this->getRecommendationsID($data[$key], $person);
    						break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
	    						$ret[] = $this->getRecommendationsID($data[$key][$i], $person);
	    					}
	    					break;
	    			}	
	    		}
	    	}
    	} else {
	    	$ret[] = $this->getRecommendationsID($data, $person);
    	}
    	return $ret;
    	
    }

    function getRecommendationsID($data, $person) {
    	$profiles_recommendations_handler = xoops_getmodulehandler('profiles_recommendations', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['id']))
			$criteria->add(new Criteria('`id`', $data['id'], 'LIKE'));
    	if (isset($data['role']))
			$criteria->add(new Criteria('`recommendation-type`', $data['recommendation-type']['code'], 'LIKE'));			
		if ($person->getVar('profile_id'))
			$criteria->add(new Criteria('`profile_id`', $person->getVar('profile_id')));			
		$recommendation = $profiles_recommendations_handler->getByCriteria($criteria);
		$recommendation->setVars($data);
		if (isset($data['recommendation-type']['code']))
			$recommendation->setVar('recommendation-type', $data['recommendation-type']['code']);
		$recommendation->setVar('recommender_person_id', $this->getPersonID($data['recommender'], $person));
		$recommendation->setVar('profile_id', $person->getVar('profile_id'));
		$recommendation->setVar('person_id', $person->getVar('person_id'));
		return $profiles_recommendations_handler->insert($recommendation, true);
    }    
    
    function getPhonesIDS($data, $person, $ret = array()) {
        static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
    						$ret[] = $this->getPhonesID($data[$key], $person);
    						break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
	    						$ret[] = $this->getPhonesID($data[$key][$i], $person);
	    					}
	    					break;
	    			}	
	    		}
	    	}
    	} else {
	    	$ret[] = $this->getPhonesID($data, $person);
    	}
    	return $ret;
   
    }

    function getPhonesID($data, $person) {
    	$profiles_phones_handler = xoops_getmodulehandler('profiles_phones', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['phone-type']))
			$criteria->add(new Criteria('`phone-type`', $data['phone-type'], 'LIKE'));
		if ($person->getVar('profile_id'))
			$criteria->add(new Criteria('`profile_id`', $person->getVar('profile_id')));			
		$phone = $profiles_phones_handler->getByCriteria($criteria);
		$phone->setVars($data);
		$phone->setVar('profile_id', $person->getVar('profile_id'));
		$phone->setVar('person_id', $person->getVar('person_id'));
		return $profiles_phones_handler->insert($phone, true);
    }    

    function getInstantMessagingIDS($data, $person, $ret = array()) {
	    static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
    						$ret[] = $this->getInstantMessagingID($data[$key], $person);
    						break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
	    						$ret[] = $this->getInstantMessagingID($data[$key][$i], $person);
	    					}
	    					break;
	    			}	
	    		}
	    	}
    	} else {
	    	$ret[] = $this->getInstantMessagingID($data, $person);
    	}
    	return $ret;

    }

    function getInstantMessagingID($data, $person) {
    	$profiles_ims_handler = xoops_getmodulehandler('profiles_ims', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['im-account-type']))
			$criteria->add(new Criteria('`im-account-type`', $data['im-account-type'], 'LIKE'));
		if ($person->getVar('profile_id'))
			$criteria->add(new Criteria('`profile_id`', $person->getVar('profile_id')));			
		$im = $profiles_ims_handler->getByCriteria($criteria);
		$im->setVars($data);
		$im->setVar('profile_id', $person->getVar('profile_id'));
		$im->setVar('person_id', $person->getVar('person_id'));
		return $profiles_ims_handler->insert($im, true);
    }    

    function getProvidersIDS($data, $person, $ret = array()) {
	    static $total = 0;
    	$keys = array();
    	foreach(array_keys($data) as $key) {
    		$keys[$key] = $key;	
    	}
    	if (in_array('@attributes', $keys)) {
    		$total = $data['@attributes']['total'];
    		unset($keys['@attributes']);
	    	
	    	if (count($keys)==1) {
	    		foreach($keys as $key) {
	    			switch($total) {
	    				case 0:
	    					break;
	    				case 1:
    						$ret[] = $this->getProvidersID($data[$key], $person);
    						break;
	    				default:
	    					for($i=0;$i<$total;$i++) {
	    						$ret[] = $this->getProvidersID($data[$key][$i], $person);
	    					}
	    					break;
	    			}	
	    		}
	    	}
    	} else {
	    	$ret[] = $this->getProvidersID($data, $person);
    	}
    	return $ret;
    }

    function getProvidersID($data, $person) {
    	$profiles_providers_handler = xoops_getmodulehandler('profiles_providers', 'linkedinbomb');
    	$criteria = new CriteriaCompo();
		if (isset($data['provider-account-id']))
			$criteria->add(new Criteria('`provider-account-id`', $data['provider-account-id'], 'LIKE'));
		if ($person->getVar('profile_id'))
			$criteria->add(new Criteria('`profile_id`', $person->getVar('profile_id')));			
		$provider = $profiles_providers_handler->getByCriteria($criteria);
		$provider->setVars($data);
		$provider->setVar('profile_id', $person->getVar('profile_id'));
		$provider->setVar('person_id', $person->getVar('person_id'));
		return $profiles_providers_handler->insert($provider, true);
    }    
    
    function processData($data, $person, $level=0) {
    	
    	if ($level==0)
    		$this->scanForPersons($data);
    	
    	foreach($data as $key => $value) {
    		switch ($key){
    			case 'location':
    				$this->setVar('location_id', $this->getLocationID($value, $person, $this->getVar('location_id')));
    				break;
    			case 'relation-to-viewer':
    				$this->setVar('relation-to-viewer', $value['distance']);
    				break;
    			case 'connections':
    				$this->setVar('connections_ids', $this->getConnectionsIDS($value, $person, array()));
    				break;
				case 'positions':
    				$this->setVar('positions_ids', $this->getPositionsIDS($value, $person, array()));
    				break;
    			case 'publications':
    				$this->setVar('publications_ids', $this->getPublicationsIDS($value, $person, array()));
    				break;
    			case 'languages':
    				$this->setVar('languages_ids', $this->getLanguagesIDS($value, $person, array()));
    				break;     				
    			case 'skills':
    				$this->setVar('skills_ids', $this->getSkillsIDS($value, $person, array()));
    				break;     				
    			case 'companies':
    				$this->setVar('companies_ids', $this->getCertificationsIDS($value, $person, array()));
    				break;
    			case 'educations':
    				$this->setVar('educations_ids', $this->getEducationsIDS($value, $person, array()));
    				break;
    			case 'courses':
    				$this->setVar('courses_ids', $this->getCoursesIDS($value, $person, array()));
    				break;
    			case 'volunteer':
    				$this->setVar('courses_ids', $this->getVolunteerIDS($value, $person, array()));
    				break;
    			case 'recommendations-received':
    				$this->setVar('recommendations_ids', $this->getRecommendationsIDS($value, $person, array()));
    				break;
    			case 'three-current-positions':
    				$this->setVar('three-current-positions_ids', $this->getPositionsIDS($value, $person, array()));
    				break;
    			case 'three-past-positions':
    				$this->setVar('three-past-positions_ids', $this->getPositionsIDS($value, $person, array()));
    				break;
    			case 'phone-numbers':
    				$this->setVar('phone_ids', $this->getPhonesIDS($value, $person, array()));
    				break;
    			case 'im-accounts':
    				$this->setVar('im_ids', $this->getInstantMessagingIDS($value, $person, array()));
    				break;
    			case 'twitter-accounts':
    				$this->setVar('twitter_ids', $this->getProvidersIDS($value, $person, array()));
    				break;
    			case 'primary-twitter-account':
    				$this->setVar('primary_twitter_id', $this->getProvidersID($value, $person, array()));
    				break;	
    		}	
    	}
    	$this->setVar('polled', time());
    	return $this;
    }
    
    function getName() {
    	$ret = $this->getVar('street1').', '.$this->getVar('city').', '.$this->getVar('postal-code');
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
    
    function toArray($include_person=false, $u=0) {
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

    	if ($include_person=true) {
			$persons_handler = xoops_getmodulehandler('persons', 'linkedinbomb');
		    if ($persons = $persons_handler->get($this->getVar('person_id'))) {
		    	$ret['person'] = $persons->toArray(true);
		    }
    	}
    	
    	$locations_handler = xoops_getmodulehandler('locations', 'linkedinbomb');
	    if ($locations = $locations_handler->get($this->getVar('location_id'))) {
	    	$ret['location'] = $locations->toArray(true);
	    }

    	$criteria = new Criteria('profile_id', $ret['profile_id']);
		$profiles_certifications_handler = xoops_getmodulehandler('profiles_certifications', 'linkedinbomb');
	    if ($certifications = $profiles_certifications_handler->getObjects($criteria, true)) {
	    	foreach($certifications as $certification_id => $certification) {
	    		$ret['certifications'][$certification_id] = $certification->toArray();
	    	}
	    }

	    $profiles_companies_handler = xoops_getmodulehandler('profiles_companies', 'linkedinbomb');
    	if ($companies = $profiles_companies_handler->getObjects($criteria, true)) {
	    	foreach($companies as $company_id => $company) {
	    		$ret['companies'][$company_id] = $company->toArray();
	    	}
	    }
	    
	    $profiles_courses_handler = xoops_getmodulehandler('profiles_courses', 'linkedinbomb');
    	if ($courses = $profiles_courses_handler->getObjects($criteria, true)) {
	    	foreach($courses as $course_id => $course) {
	    		$ret['courses'][$course_id] = $course->toArray();
	    	}
	    }
	    
	    $profiles_educations_handler = xoops_getmodulehandler('profiles_educations', 'linkedinbomb');
        if ($educations = $profiles_educations_handler->getObjects($criteria, true)) {
	    	foreach($educations as $education_id => $education) {
	    		$ret['educations'][$education_id] = $education->toArray();
	    	}
	    }
	    
	    $profiles_ims_handler = xoops_getmodulehandler('profiles_ims', 'linkedinbomb');
        if ($ims = $profiles_ims_handler->getObjects($criteria, true)) {
	    	foreach($ims as $im_id => $im) {
	    		$ret['ims'][$im_id] = $im->toArray();
	    	}
	    }	    

	    $profiles_languages_handler = xoops_getmodulehandler('profiles_languages', 'linkedinbomb');
        if ($languages = $profiles_languages_handler->getObjects($criteria, true)) {
	    	foreach($languages as $language_id => $language) {
	    		$ret['languages'][$language_id] = $language->toArray();
	    	}
	    }
	    	    
	    $profiles_patents_handler = xoops_getmodulehandler('profiles_patents', 'linkedinbomb');
	    if ($patents = $profiles_patents_handler->getObjects($criteria, true)) {
	    	foreach($patents as $patent_id => $patent) {
	    		$ret['patents'][$patent_id] = $patent->toArray();
	    	}
	    }
	    
	    $profiles_phones_handler = xoops_getmodulehandler('profiles_phones', 'linkedinbomb');
        if ($phones = $profiles_phones_handler->getObjects($criteria, true)) {
	    	foreach($phones as $phone_id => $phone) {
	    		$ret['phones'][$phone_id] = $phone->toArray();
	    	}
	    }	 
	       
	    $profiles_positions_handler = xoops_getmodulehandler('profiles_positions', 'linkedinbomb');
        if ($positions = $profiles_positions_handler->getObjects($criteria, true)) {
	    	foreach($positions as $position_id => $position) {
	    		$ret['positions'][$position_id] = $position->toArray();
	    	}
	    }	 
	       
	    $profiles_providers_handler = xoops_getmodulehandler('profiles_providers', 'linkedinbomb');
        if ($providers = $profiles_providers_handler->getObjects($criteria, true)) {
	    	foreach($providers as $provider_id => $provider) {
	    		$ret['providers'][$provider_id] = $provider->toArray();
	    	}
	    }
	    
    
	    $profiles_publications_handler = xoops_getmodulehandler('profiles_publications', 'linkedinbomb');
        if ($publications = $profiles_publications_handler->getObjects($criteria, true)) {
	    	foreach($publications as $publication_id => $publication) {
	    		$ret['publications'][$publication_id] = $publication->toArray();
	    	}
	    }	 
	       
	    $profiles_recommendations_handler = xoops_getmodulehandler('profiles_recommendations', 'linkedinbomb');
        if ($recommendations = $profiles_recommendations_handler->getObjects($criteria, true)) {
	    	foreach($recommendations as $recommendation_id => $recommendation) {
	    		$ret['recommendations'][$recommendation_id] = $recommendation->toArray();
	    	}
	    }	 
	       
	    $profiles_skills_handler = xoops_getmodulehandler('profiles_skills', 'linkedinbomb');
        if ($skills = $profiles_skills_handler->getObjects($criteria, true)) {
	    	foreach($skills as $skill_id => $skill) {
	    		$ret['skills'][$skill_id] = $skill->toArray();
	    	}
	    }	 
	       
	    $profiles_volunteer_handler = xoops_getmodulehandler('profiles_volunteer', 'linkedinbomb');
        if ($volunteers = $profiles_volunteer_handler->getObjects($criteria, true)) {
	    	foreach($volunteers as $volunteer_id => $volunteer) {
	    		$ret['volunteer'][$volunteer_id] = $volunteer->toArray();
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
class LinkedinbombProfilesHandler extends XoopsPersistableObjectHandler
{
    function __construct(&$db) 
    {
		$this->db = $db;
        parent::__construct($db, 'lib_profiles', 'LinkedinbombProfiles', "profile_id", "person_id");
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
    	return parent::insert($object, $force);
    }
}

?>