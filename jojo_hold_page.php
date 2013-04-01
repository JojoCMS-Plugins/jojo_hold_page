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


class Jojo_Plugin_jojo_hold_page extends Jojo_Plugin {

    public static function hold_page_check() {
        global $_USERGROUPS;

        // Do we show the hold page?
        if (Jojo::getOption('hold_page_active', 'no') == 'yes') {
            $allowed_groups = self::get_allowed_groups();
            foreach ($allowed_groups as $group) {
                if (in_array($group, $_USERGROUPS)) {
                    return array();
                }
            }
            // Check if it's an allowed type of supporting file
            // Now compile the list of allowed types (to prevent doing work before hand if we weren't going to get this far)
            $allowed_files = self::get_allowed_files();
            if (!in_array(pathinfo($_GET['uri'], PATHINFO_EXTENSION), $allowed_files)) {
                self::show_hold_page();
            }
        }
    }

    static function get_allowed_groups() {
        $allowed_groups = Jojo::getOption('hold_page_allowed_login_groups', 'admin, owner');
        $allowed_groups = explode(',', strtolower(str_replace(' ', '', $allowed_groups)));
        return $allowed_groups;
    }

    static function get_allowed_files() {
        $allowed_files = Jojo::getOption('hold_page_allowed_filetypes');
        $allowed_files = explode(',', strtolower(str_replace(' ', '', $allowed_files)));
        return $allowed_files;
    }

    static function show_hold_page() {
        global $smarty;
        $pageData = Jojo::selectRow(
            "SELECT pg_title,
                    pg_seotitle,
                    pg_body
               FROM page
              WHERE pg_link LIKE 'Jojo_Plugin_jojo_hold_page'");

        if (Jojo::getOption('hold_page_status_code') == '503') {
            header('HTTP/1.1 503 Service Unavailable');
        }
        $url = preg_replace('#^login/#', '', $_GET['uri']);
        $content = Jojo::applyFilter('content', $pageData['pg_body']);
        $title = ($pageData['pg_seotitle']) ? $pageData['pg_seotitle'] : $pageData['pg_title'];

        $smarty->assign('held_url', $url);
        $smarty->assign('hold', ($url == $_GET['uri']) ? true : false );
        $smarty->assign('title', $title);
        $smarty->assign('content', $content);

        // Send the anti-cache headers as well as using the meta tags in the template
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        echo $smarty->fetch('hold-page.tpl');
        exit();
    }
}
