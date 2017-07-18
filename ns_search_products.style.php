<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
function ns_ps_loadMyScripts_free()
{    
    wp_enqueue_style('ns-ps-style', NS_SEARCH_PRODUCT_WC_PLUGIN_ROOT . '/asset/css/style.css');
}

add_action( 'wp_enqueue_scripts','ns_ps_loadMyScripts_free' );

?>