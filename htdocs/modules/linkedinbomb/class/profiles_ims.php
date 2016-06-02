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
class LinkedinbombProfiles_ims extends XoopsObject
{

    function __construct($id = null)
    {
        $this->initVar('ims_id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('profile_id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('person_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('im-account-type', XOBJ_DTYPE_TXTBOX, null, false, 32);
		$this->initVar('im-account-name', XOBJ_DTYPE_TXTBOX, null, false, 255);		
		$this->initVar('created', XOBJ_DTYPE_INT, null, false); // Removed Unicode in 2.10
		$this->initVar('updated', XOBJ_DTYPE_INT, null, false); // Removed Unicode in 2.10
		
		if ($id>0) {
			$handler = new LinkedinbombProfiles_imsHandler($GLOBALS['xoopsDB']);
			$object = $handler->get($id);
			if (is_object($object)) {
				if (is_a($object, 'LinkedinbombProfiles_ims')) {
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
    	return $this->getVar('im-account-type').': '.$this->getVar('im-account-name');
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
    
    function toArray($include_profile=false) {
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
    	if ($include_profile==true) {
    		$profile_handler = xoops_getmodulehandler('profiles', 'linkedinbomb');
    		$ret['profile'] = $profile_handler->get($this->getVar('profile_id'))->toArray();

    		$page_desc_configs = array();
			$page_desc_configs['name'] = $this->getVar('profile_id').'[message]';
			$page_desc_configs['value'] = '';
			$page_desc_configs['rows'] = 35;
			$page_desc_configs['cols'] = 60;
			$page_desc_configs['width'] = "100%";
			$page_desc_configs['height'] = "400px";
			$messager = new XoopsFormEditor('', 'dhtmltextarea', $page_desc_configs);
			$ret['messager'] = $messager->render();
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
class LinkedinbombProfiles_imsHandler extends XoopsPersistableObjectHandler
{
    function __construct(&$db) 
    {
		$this->db = $db;
        parent::__construct($db, 'lib_profiles_ims', 'LinkedinbombProfiles_ims', "ims_id", "im-account-type");
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
    	if ($object->getVar('profile_id')>0&&$object->getVar('person_id')==0) {
    		$profile_handler = xoops_getmodulehandler('profiles', 'linkedinbomb');
    		$profile = $profile_handler->get($object->getVar('profile_id'));
    		$object->setVar('person_id', $profile->getVar('person_id'));
    	} elseif ($object->getVar('profile_id')==0&&$object->getVar('person_id')>0) {
    		$persons_handler = xoops_getmodulehandler('persons', 'linkedinbomb');
    		$person = $persons_handler->get($object->getVar('person_id'));
    		$object->setVar('profile_id', $person->getVar('profile_id'));
    	}
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