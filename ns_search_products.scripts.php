<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ns_load_search_scripts_free()
{
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-autocomplete' );
	wp_enqueue_script( 'ns-search-products-custom_free', plugins_url( 'asset/js/custom.js' , __FILE__ ), array( 'jquery' ) );

    wp_localize_script( 'ns-search-products-custom_free', 'ns_ajaxSearch_object_free', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts','ns_load_search_scripts_free' );

