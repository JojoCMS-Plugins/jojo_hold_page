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

/* remove the Hold Page from the menu */
Jojo::deleteQuery("DELETE FROM {page} WHERE pg_link LIKE 'Jojo_Plugin_jojo_hold_page'");

/* remove the options */
Jojo::deleteQuery("DELETE FROM {option} WHERE op_plugin LIKE 'Jojo_Plugin_jojo_hold_page'");
