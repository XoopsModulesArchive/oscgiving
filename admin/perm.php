<?php
// $Id: perm.php,v 2006/11/21 srmcatee Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2006 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
include '../../../include/cp_header.php';
include_once XOOPS_ROOT_PATH.'/class/xoopsform/grouppermform.php';

//redirect
if (!$xoopsUser)
{
    redirect_header(XOOPS_URL."/user.php", 3, _AD_NORIGHT);
}


//verify permission
if ( !is_object($xoopsUser) || !is_object($xoopsModule) || !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
    exit(_oscgiv_admin_access_denied);
}

include_once(XOOPS_ROOT_PATH . "/class/xoopsformloader.php");

xoops_cp_header();

$module_id = $xoopsModule->getVar('mid');
	$title_of_form = _oscgiv_permissions_modify;
	$perm_name = 'oscgiving_modify';
	$perm_desc = _oscgiv_permissions_modify_desc;
	$form = new XoopsGroupPermForm($title_of_form, $module_id, $perm_name, $perm_desc, 'admin/perm.php');
	$form->addItem('1',_oscgiv_permissions_modify);
	
	echo $form->render().'<br />';

	$title_of_form = _oscgiv_permissions_admin;
	$perm_name = 'oscgiving_admin';
	$perm_desc = _oscgiv_permissions_admin_desc;
	$form = new XoopsGroupPermForm($title_of_form, $module_id, $perm_name, $perm_desc, 'admin/perm.php');
	$form->addItem('1',_oscgiv_permissions_admin);
	
	echo $form->render().'<br />';
	
	$yearendform=new XoopsFormTextArea("yearendletter","yearletter","",30,50);
	
	$yearendform->render();
	
	echo "
<img onmouseover='style.cursor=\"hand\"' onclick='javascript:openWithSelfMain(\"" .XOOPS_URL . "/imagemanager.php?target=\'test\'\",\"imgmanager\",400,430);' src='".XOOPS_URL."/images/image.gif' alt='image' />&nbsp;
	";

xoops_cp_footer();
?>