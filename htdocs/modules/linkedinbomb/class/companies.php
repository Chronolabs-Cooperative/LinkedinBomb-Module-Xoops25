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
class LinkedinbombCompanies extends XoopsObject
{

    function __construct($id = null)
    {
        $this->initVar('company_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('id', XOBJ_DTYPE_TXTBOX, null, false, 32);
		$this->initVar('universal-name', XOBJ_DTYPE_TXTBOX, null, false, 128);		
		$this->initVar('name', XOBJ_DTYPE_TXTBOX, null, false, 128);
		$this->initVar('ticker', XOBJ_DTYPE_TXTBOX, null, false, 10);
		$this->initVar('logo-url', XOBJ_DTYPE_URL, null, false, 500);
		$this->initVar('description', XOBJ_DTYPE_TXTBOX, null, false, 500);
		$this->initVar('company-type_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('industry', XOBJ_DTYPE_TXTBOX, null, false, 128);
		$this->initVar('size', XOBJ_DTYPE_TXTBOX, null, false, 128);
		$this->initVar('specialties_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('blog-rss-url', XOBJ_DTYPE_URL, null, false, 500);
        $this->initVar('twitter-id', XOBJ_DTYPE_TXTBOX, null, false, 64);
        $this->initVar('square-logo-url', XOBJ_DTYPE_URL, null, false, 500);
        $this->initVar('location_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('founded-year', XOBJ_DTYPE_TXTBOX, null, false, 4);
        $this->initVar('email-domain_ids', XOBJ_DTYPE_ARRAY, array(), false);
        $this->initVar('website-url', XOBJ_DTYPE_URL, null, false, 500);
        $this->initVar('status_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('created', XOBJ_DTYPE_INT, null, false); // Removed Unicode in 2.10
		$this->initVar('updated', XOBJ_DTYPE_INT, null, false); // Removed Unicode in 2.10
		
		if ($id>0) {
			$handler = new LinkedinbombCompaniesHandler($GLOBALS['xoopsDB']);
			$object = $handler->get($id);
			if (is_object($object)) {
				if (is_a($object, 'LinkedinbombCompanies')) {
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
    	if (isset($ret['company-type_id']))
	    	if ($ret['company-type_id']>0) {
	    		$company_type_handler = xoops_getmodulehandler('companies_type', 'linkedinbomb');
	    		$company_type = $company_type_handler->get($ret['company-type_id']);
	    		$ret['company-type'] = $company_type->toArray(); 
	    	}
    	if ($ret['status_id']>0) {
    		$status_handler = xoops_getmodulehandler('status', 'linkedinbomb');
    		$status = $status_handler->get($ret['status_id']);
    		$ret['status'] = $status->toArray(); 
    	}
    	if (count($ret['specialties_ids'])>0) {
    		$specialties_handler = xoops_getmodulehandler('specialties', 'linkedinbomb');
    		foreach($ret['specialties_ids'] as $specialties_id) {
    			if ($specialty = $specialties_handler->get($specialties_id)) {
    				$ret['specialties'][$specialties_id] = $specialty->toArray();
    			}
    		}
    	}
    	if (count($ret['location_ids'])>0) {
    		$locations_handler = xoops_getmodulehandler('locations', 'linkedinbomb');
    		foreach($ret['location_ids'] as $location_id) {
    			if ($location = $locations_handler->get($location_id)) {
    				$ret['locations'][$locations_id] = $location->toArray();
    			}
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
class LinkedinbombCompaniesHandler extends XoopsPersistableObjectHandler
{
    function __construct(&$db) 
    {
		$this->db = $db;
        parent::__construct($db, 'lib_companies', 'LinkedinbombCompanies', "company_id", "name");
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