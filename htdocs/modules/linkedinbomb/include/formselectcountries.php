<?php
/**
 * select form element
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         kernel
 * @subpackage      form
 * @since           2.0.0
 * @author          Kazumi Ono (AKA onokazu) http://www.myweb.ne.jp/, http://jp.xoops.org/
 * @author          Taiwen Jiang <phppp@users.sourceforge.net>
 * @version         $Id: formselect.php 8066 2011-11-06 05:09:33Z beckmi $
 */
defined('XOOPS_ROOT_PATH') or die('Restricted access');

xoops_load('XoopsFormElement');

/**
 * A select field
 *
 * @author 		Kazumi Ono <onokazu@xoops.org>
 * @author 		Taiwen Jiang <phppp@users.sourceforge.net>
 * @author 		John Neill <catzwolf@xoops.org>
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/
 * @package 	kernel
 * @subpackage 	form
 * @access 		public
 */
class LinkedinbombFormSelectCountries extends XoopsFormSelect
{

    /**
     * Constructor
     *
     * @param string $caption Caption
     * @param string $name "name" attribute
     * @param mixed $value Pre-selected value (or array of them).
     * @param int $size Number or rows. "1" makes a drop-down-list
     * @param bool $multiple Allow multiple selections?
     */
    function LinkedinbombFormSelectCountries($caption, $name, $value = null, $size = 1, $multiple = false)
    {
        $this->XoopsFormSelect($caption, $name, $value, $size, $multiple);
        $locations_handler = xoops_getmodulehandler('locations', 'linkedinbomb');
        if ($locations = $locations_handler->getObjects(NULL, true)) {
        	foreach($locations as $key => $object)
        		$countryids[$object->getVar('country_id')] = $object->getVar('country_id');
        } 
        $countries_handler = xoops_getmodulehandler('countries', 'linkedinbomb');
        if (count($countryids)>0)
        	$criteria = new CriteriaCompo(new Criteria('country_id', '('.implode(',', $countryids).')', 'IN'));
        else
        	$criteria = new CriteriaCompo(new Criteria('country_id', 0, '<>'));
        $criteria->setSort('`code`');
        $criteria->setOrder('ASC');
        if ($countries = $countries_handler->getObjects($criteria, true)) {
        	foreach($countries as $country_id => $country) {
				$this->addOption($country_id, $country->getVar('name'). ' ('.$country->getVar('code').')');        		
        	}
        }
         
    }

}

?>