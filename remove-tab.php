<?php 

/*
Plugin Name: Dokan tab remover
Plugin URI: https://github.com/nayemDevs/Dokan-tab-remover
Description: 
Author: Nayem
Version: 0.1
Author URI: http://twitter.com/nayemDevs
License: GPL2
TextDomain: dokan
*/


//Admin menu in Dokan settings

add_filter( 'dokan_settings_fields', 'wlr_tab_remover' );


	function wlr_tab_remover($settings_fields){

		 $settings_fields ['dokan_selling'] = array(
									'remove_tab' => array(
				                    'name'    => 'remove_tab',
				                    'label'   => __( 'Hide Dashboard Menu/Tab For Seller', 'dokan' ),
				                    'desc'    => __( 'Insert the dashbaord menu name to hide from seller', 'dokan' ),
				                    'type'    => 'select',
				                    'options' => array(
							                    'products' => 'Products',
							                    'orders'   => 'Orders',
							                    'withdraw' => 'Withdraw',
											    'payment'  => 'Payment',
											    'coupons'  => 'Coupons'         
				                ),
           ),
           				 );

                   return $settings_fields;



	}


// Dashbaord menu removing function 

	add_filter( 'dokan_get_dashboard_nav','wlr_dashbaord_nav', 11);

	function wlr_dashbaord_nav($urls){
			
			 
			  $menu = dokan_get_option('remove_tab','dokan_selling');
		   
		     unset($urls[$menu]);
		     	var_dump($menu);
		return $urls;




	}

	add_filter( 'dokan_get_dashboard_settings_nav','wlr_dashbaord_settings_nav');

	function wlr_dashbaord_settings_nav($settings_sub){

			 $menu = dokan_get_option('remove_tab','dokan_selling');
			unset($settings_sub[$menu]);
			return $settings_sub;




	}



 ?>
