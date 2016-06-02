<?php
	
	require('header.php');
	
	$op = isset($_REQUEST['op'])?$_REQUEST['op']:"about";
	$fct = isset($_REQUEST['fct'])?$_REQUEST['fct']:"list";
	$limit = !empty($_REQUEST['limit'])?intval($_REQUEST['limit']):30;
	$start = !empty($_REQUEST['start'])?intval($_REQUEST['start']):0;
	$order = !empty($_REQUEST['order'])?$_REQUEST['order']:'DESC';
	$sort = !empty($_REQUEST['sort'])?''.$_REQUEST['sort'].'':'created';
	$filter = !empty($_REQUEST['filter'])?''.$_REQUEST['filter'].'':'1,1';
	$id = !empty($_REQUEST['id'])?(is_array($_REQUEST['id'])?array_unique($_REQUEST['id']):intval($_REQUEST['id'])):0;
	
	switch($op) {
		default:
		case "about":
			xoops_cp_header();
			
			$indexAdmin = new ModuleAdmin();
	   		echo $indexAdmin->addNavigation(strtolower(basename($_SERVER['REQUEST_URI'])));
			$paypalitemno='LINKEDINBOMB125';
			$aboutAdmin = new ModuleAdmin();
			$about = $aboutAdmin->renderabout($paypalitemno, false);
			$donationform = array(	0 => '<form name="donation" id="donation" action="http://www.chronolabs.com.au/modules/xpayment/" method="post" onsubmit="return xoopsFormValidate_donation();">',
									1 => '<table class="outer" cellspacing="1" width="100%"><tbody><tr><th colspan="2">'.constant('_AM_LINKEDINBOMB_ABOUT_MAKEDONATE').'</th></tr><tr align="left" valign="top"><td class="head"><div class="xoops-form-element-caption-required"><span class="caption-text">Donation Amount</span><span class="caption-marker">*</span></div></td><td class="even"><select size="1" name="item[A][amount]" id="item[A][amount]" title="Donation Amount"><option value="5">5.00 AUD</option><option value="10">10.00 AUD</option><option value="20">20.00 AUD</option><option value="40">40.00 AUD</option><option value="60">60.00 AUD</option><option value="80">80.00 AUD</option><option value="90">90.00 AUD</option><option value="100">100.00 AUD</option><option value="200">200.00 AUD</option></select></td></tr><tr align="left" valign="top"><td class="head"></td><td class="even"><input class="formButton" name="submit" id="submit" value="'._SUBMIT.'" title="'._SUBMIT.'" type="submit"></td></tr></tbody></table>',
									2 => '<input name="op" id="op" value="createinvoice" type="hidden"><input name="plugin" id="plugin" value="donations" type="hidden"><input name="donation" id="donation" value="1" type="hidden"><input name="drawfor" id="drawfor" value="Chronolabs Co-Operative" type="hidden"><input name="drawto" id="drawto" value="%s" type="hidden"><input name="drawto_email" id="drawto_email" value="%s" type="hidden"><input name="key" id="key" value="%s" type="hidden"><input name="currency" id="currency" value="AUD" type="hidden"><input name="weight_unit" id="weight_unit" value="kgs" type="hidden"><input name="item[A][cat]" id="item[A][cat]" value="XDN%s" type="hidden"><input name="item[A][name]" id="item[A][name]" value="Donation for %s" type="hidden"><input name="item[A][quantity]" id="item[A][quantity]" value="1" type="hidden"><input name="item[A][shipping]" id="item[A][shipping]" value="0" type="hidden"><input name="item[A][handling]" id="item[A][handling]" value="0" type="hidden"><input name="item[A][weight]" id="item[A][weight]" value="0" type="hidden"><input name="item[A][tax]" id="item[A][tax]" value="0" type="hidden"><input name="return" id="return" value="http://www.chronolabs.coop/modules/donations/success.php" type="hidden"><input name="cancel" id="cancel" value="http://www.chronolabs.coop/modules/donations/success.php" type="hidden"></form>',																'D'=>'',
									3 => '',
									4 => '<!-- Start Form Validation JavaScript //-->
	<script type="text/javascript">
	<!--//
	function xoopsFormValidate_donation() { var myform = window.document.donation; 
	var hasSelected = false; var selectBox = myform.item[A][amount];for (i = 0; i < selectBox.options.length; i++ ) { if (selectBox.options[i].selected == true && selectBox.options[i].value != \'\') { hasSelected = true; break; } }if (!hasSelected) { window.alert("Please enter Donation Amount"); selectBox.focus(); return false; }return true;
	}
	//--></script>
	<!-- End Form Validation JavaScript //-->');
			$paypalform = array(	0 => '<form action="https://www.paypal.com/cgi-bin/webscr" method="post">',
									1 => '<input name="cmd" value="_s-xclick" type="hidden">',
									2 => '<input name="hosted_button_id" value="%s" type="hidden">',
									3 => '<img alt="" src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" height="1" border="0" width="1">',
									4 => '<input src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!" border="0" type="image">',
									5 => '</form>');
			for($key=0;$key<=4;$key++) {
				switch ($key) {
					case 2:
						$donationform[$key] =  sprintf($donationform[$key], $GLOBALS['xoopsConfig']['sitename'] . ' - ' . (strlen($GLOBALS['xoopsUser']->getVar('name'))>0?$GLOBALS['xoopsUser']->getVar('name'). ' ['.$GLOBALS['xoopsUser']->getVar('uname').']':$GLOBALS['xoopsUser']->getVar('uname')), $GLOBALS['xoopsUser']->getVar('email'), XOOPS_LICENSE_KEY, strtoupper($GLOBALS['linkedinbombModule']->getVar('dirname')),  strtoupper($GLOBALS['linkedinbombModule']->getVar('dirname')). ' '.$GLOBALS['linkedinbombModule']->getVar('name'));
						break;
				}
			}
			
			$istart = strpos($about, ($paypalform[0]), 1);
			$iend = strpos($about, ($paypalform[5]), $istart+1)+strlen($paypalform[5])-1;
			echo (substr($about, 0, $istart-1));
			echo implode("\n", $donationform);
			echo (substr($about, $iend+1, strlen($about)-$iend-1));
			break;
	}
	
	xoops_cp_footer();
?>