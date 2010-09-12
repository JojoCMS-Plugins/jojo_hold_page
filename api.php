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

$plugin_name = 'jojo_hold_page';

/* Provided Classes */
$_provides['pluginClasses'] = array(
	'Jojo_Plugin_jojo_hold_page' => 'Hold Page - Holding Page'
);

/* Hooks */
Jojo::addHook('jojo_before_parsepage', 'hold_page_check', $plugin_name);


/* Options */
$_options[] = array(
	'id'          => 'hold_page_active',
	'category'    => 'Hold Page',
	'label'       => 'Lock the site and show the Hold Page',
	'description' => 'Block the website from public view and display the holding page.',
	'type'        => 'radio',
	'default'     => 'no',
	'options'     => 'yes,no',
	'plugin'      => $plugin_name
);
$_options[] = array(
	'id'          => 'hold_page_allowed_filetypes',
	'category'    => 'Hold Page',
	'label'       => 'Allowed file types',
	'description' => 'Allow these types of files to be accessed while the site is on hold (eg linked to from the hold page).',
	'type'        => 'text',
	'default'     => 'css,js,jpg,jpeg,gif,png',
	'options'     => '',
	'plugin'      => $plugin_name
);
$_options[] = array(
	'id'          => 'hold_page_allowed_login',
	'category'    => 'Hold Page',
	'label'       => 'Allow Login',
	'description' => 'Show a login link on the hold page so that people can still log in (if they belong to an allowed usergroup).',
	'type'        => 'radio',
	'default'     => 'no',
	'options'     => 'yes,no',
	'plugin'      => $plugin_name
);
$_options[] = array(
	'id'          => 'hold_page_allowed_login_groups',
	'category'    => 'Hold Page',
	'label'       => 'Allowed Login Groups',
	'description' => 'User Groups that are allowed to log in while the hold page is active.',
	'type'        => 'text',
	'default'     => 'Admin,Owner',
	'options'     => '',
	'plugin'      => $plugin_name
);
$_options[] = array(
	'id'          => 'hold_page_login_title',
	'category'    => 'Hold Page',
	'label'       => 'Login Form Title',
	'description' => 'The title of the login form.',
	'type'        => 'text',
	'default'     => 'Login to view this website',
	'options'     => '',
	'plugin'      => $plugin_name
);
$_options[] = array(
	'id'          => 'hold_page_status_code',
	'category'    => 'Hold Page',
	'label'       => 'HTTP Status Code',
	'description' => '200 OK or 503 Service Unavailable.',
	'type'        => 'radio',
	'default'     => '200',
	'options'     => '200,503',
	'plugin'      => $plugin_name
);
$_options[] = array(
	'id'          => 'hold_page_analytics',
	'category'    => 'Hold Page',
	'label'       => 'Enable Google Analytics',
	'description' => 'Google Analytics can be enabled or disabled for the hold page.',
	'type'        => 'radio',
	'default'     => 'no',
	'options'     => 'yes,no',
	'plugin'      => $plugin_name
);
$_options[] = array(
	'id'          => 'hold_page_developer_tag',
	'category'    => 'Hold Page',
	'label'       => 'Developer Credit Line',
	'description' => 'The web developer\'s tagline. Any html, even a logo in an image tag.',
	'type'        => 'textarea',
	'default'     => '',
	'options'     => '',
	'plugin'      => $plugin_name
);
