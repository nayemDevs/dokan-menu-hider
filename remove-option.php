<?php 

/*
Plugin Name: Dokan tab remover
Plugin URI: https://github.com/nayemDevs/dokan-menu-hider
Description: Remove seller dashboard menu/tab easily - Dokan
Author: Nayem
Version: 1.0
Author URI: http://twitter.com/nayemDevs
License: GPL2
TextDomain: dokan
*/


//Admin menu in Dokan settings

add_filter( 'dokan_settings_fields', 'wlr_tab_remover', 10);


function wlr_tab_remover($settings_fields){

		$settings_fields ['dokan_selling']['remove_tab'] = array(
			'name'    => 'remove_tab',
			'label'   => __( 'Hide Seller Dashboard Menu', 'dokan' ),
			'desc'    => __( 'Select the dashboard menu to hide from seller', 'dokan' ),
			'type'    => 'select',
			'options' => array(
				''		   =>'--Select--',	
				'products' => 'Products',
				'orders'   => 'Orders',
				'withdraw' => 'Withdraw',
				'coupons'  => 'Coupons', 
				'reviews'  => 'Reviews',
				'reports'  => 'Reports',
				'payment'  => 'Payment',
				'shipping' => 'Shipping',
				'social'   => 'Social'

				),
			);

		$settings_fields ['dokan_selling']['disable_tab'] = array(
			'name'    => 'disable_tab',
			'label'   => __( 'Remove tab', 'dokan' ),
			'desc'    => __( 'Select the tab to remove from product edit page', 'dokan' ),
			'type'    => 'select',
			'options' => array(
				''		   =>'--Select--',	
				'options'  =>'Options',
				'inventory' => 'Inventory',
				'shipping'  => 'Shipping',
				'attributes'=>'Attributes',
				'variations' => 'Variations'
				)
			);



		return $settings_fields;



}


				// Dashbaord menu removing function 

add_filter( 'dokan_get_dashboard_nav','wlr_dashbaord_nav', 11);

function wlr_dashbaord_nav($urls){

	$menu = dokan_get_option('remove_tab','dokan_selling');
	unset($urls[$menu]);
	return $urls;




}

add_filter( 'dokan_get_dashboard_settings_nav','wlr_dashbaord_settings_nav');

function wlr_dashbaord_settings_nav($settings_sub){

	$menu = dokan_get_option('remove_tab','dokan_selling');
	unset($settings_sub[$menu]);
	return $settings_sub;


}

add_filter( 'dokan_get_dashboard_settings_nav','wlrs_dashbaord_settings_nav',11);

function wlrs_dashbaord_settings_nav($sub_settins){

	$menu = dokan_get_option('remove_tab','dokan_selling');
	unset($sub_settins[$menu]);
	return $sub_settins;

}

				//Remove tab from product edit page

add_filter( 'dokan_product_data_tabs','wlr_remove_tab');

function wlr_remove_tab($dokan_product_data_tabs){

	$menu = dokan_get_option('disable_tab','dokan_selling');
	unset($dokan_product_data_tabs[$menu]);
	return $dokan_product_data_tabs;


}

?>
