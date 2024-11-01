<?php
/*
 * 	Plugin Name: VM Menu Reorder plugin
 * 	Description: Menu reorder plugin is used to rearrange your dashboard area. This plugin is also useful to rearrange menu for particular user role.
 *	Author: Milankumar Kyada
 *	Tags: Admin menu, User roles
 *	Version: 1.0.0		
 */
define('VM_REORDER_PATH',trailingslashit(plugin_dir_url( __FILE__ )));
require_once "vm-menu-class.php";
$obj = new vm_menu();
register_activation_hook(__FILE__,array($obj,'vm_activate'));
add_action('admin_init',array($obj,'vm_set_admin_view'));
add_action('admin_menu',array($obj,'vm_add_setting_page'));
add_action( 'admin_menu', array($obj,'vm_plugin_override') );

/*** Set Menu Order ***/
add_filter('custom_menu_order',array($obj,'vm_custom_menu_order'));
add_filter('menu_order', array($obj,'vm_custom_menu_order'));

/*** AJAX section ***/
add_action('wp_ajax_set_menuorder',array($obj,'vm_set_menuorder'));
add_action('wp_ajax_set_menuorder_by_user_role',array($obj,'vm_set_menuorder_by_user_role'));
add_action('wp_ajax_get_menuorder_by_user',array($obj,'vm_get_menuorder_by_user'));
add_action('wp_ajax_set_to_default',array($obj,'vm_set_to_default'));
add_action('wp_ajax_reset_for_userrole',array($obj,'vm_reset_for_userrole'));

