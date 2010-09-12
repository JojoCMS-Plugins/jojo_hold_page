<?php
/**
 *                    Jojo CMS
 *                ================
 *
 * Copyright 2008 Rick Hambrook <rick@hambrook.co.nz>
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Rick Hambrook <rick@hambrook.co.nz>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 * @package jojo_hold_page
 */

/* Hold Page */
$data = Jojo::selectQuery("SELECT * FROM {page} WHERE pg_link='Jojo_Plugin_jojo_hold_page'");
if (!count($data)) {
    echo "Jojo_Plugin_jojo_hold_page: Adding <b>Hold Page</b> to menu<br />";
    Jojo::insertQuery("INSERT INTO {page} SET pg_title='Under Development', pg_body=?, pg_body_code=?, pg_menutitle='Hold Page', pg_link='Jojo_Plugin_jojo_hold_page', pg_parent = ?, pg_order=0, pg_mainnav='no', pg_footernav='no', pg_sitemapnav='no', pg_xmlsitemapnav='no', pg_index='no'", array('This website is currently under development.', 'This website is currently under development.', $_NOT_ON_MENU_ID));
}

$allowed_groups = Jojo_Plugin_jojo_hold_page::get_allowed_groups();
// Only create the owner group if it's being used. This way we can delete it and it won't be recreated unless we want to use it.
if (in_array('owner', $allowed_groups)) {
	$data = Jojo::selectQuery("SELECT * FROM {usergroups} WHERE groupid = 'owner'");
	if (!count($data)) {
		echo "Jojo_Plugin_jojo_hold_page: Adding <b>Owner</b> user group<br />";
		Jojo::insertQuery("INSERT INTO {usergroups} SET groupid='owner', gr_name='Owner'");
	}
}
