/* Remove shipping tab from product edit page */

add_filter( 'dokan_product_data_tabs', 'remove_shipping_menu');


    function remove_shipping_menu( $dokan_product_data_tabs){

        unset($dokan_product_data_tabs['shipping']);

        return $dokan_product_data_tabs;
}

/* Remove shippng tab from single product page*/

remove_action( 'woocommerce_product_tabs' ,'register_product_tab');

function remove_product_shipping_tab($tabs){

    unset($tabs['shipping']);
    return $tabs;
}

add_action ( 'woocommerce_product_tabs' , 'remove_product_shipping_tab');
