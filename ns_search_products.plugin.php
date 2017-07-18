<?php
/*
Plugin Name: NS Ajax Product Search
Plugin URI: https://wordpress.org/plugins/ns-ajax-products-search/
Description: Ajax Product Search Plugin for WooCommerce
Version: 1.3.0
Author: NsThemes
Author URI: http://www.nsthemes.com
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( 'SEARCH_PRODUCT_NS_PLUGIN_DIR_FREE' ) ){
	define( 'SEARCH_PRODUCT_NS_PLUGIN_DIR_FREE', untrailingslashit( dirname( __FILE__ ) ) ) ;
}

if ( ! defined( 'NS_SEARCH_PRODUCT_WC_PLUGIN_ROOT' ) )
    define( 'NS_SEARCH_PRODUCT_WC_PLUGIN_ROOT', plugin_dir_url( __FILE__ ) );


include_once(SEARCH_PRODUCT_NS_PLUGIN_DIR_FREE . '/ns_search_products.scripts.php');
include_once(SEARCH_PRODUCT_NS_PLUGIN_DIR_FREE . '/ns_search_products.style.php');
include_once(SEARCH_PRODUCT_NS_PLUGIN_DIR_FREE . '/ns_search_products.widget.php');

function ns_search_product_searchform_free( $form ) {
    $form = '<form role="search" class="ns-productsearch-form" method="get" id="ns_searchform" name="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
                <div>
                    <div id="ns_input-container_free" class="ns-productsearch-input-container" >
                        <div class="ns-tab-cell_free">
                            <label class="ns-productsearch-screen-reader-text" for="ns_s_free">' . __( 'Search for:', 'woocommerce' ) . '</label>
                            <input 
                                type="text" 
                                value="' . get_search_query() . '" 
                                name="s" 
                                id="ns_s_free"
                                class="ns-productsearch-input-search"
                                placeholder="' . __( 'Insert Search term', 'woocommerce' ) . '" />
                        </div>
                        <ul id="ns_product_list_id_free" class="ns-productsearch-product-list-id-free"></ul>
                    </div>

                    <input type="submit" id="searchsubmit_free" value="'. esc_attr__( 'Search', 'woocommerce' ) .'" class="ns-productsearch-searchsubmit-free"/>
                    <input type="hidden" name="post_type" value="product" />
                </div>
            </form>';
    
    return $form;
}
add_action( 'wp_ajax_add_foobar', 'ns_search_product_add_form_free' );
add_action( 'wp_ajax_nopriv_add_foobar', 'ns_search_product_add_form_free' );


function ns_search_product_add_form_free() {
    // Handle request then generate response using WP_Ajax_Response
    $title = $_POST["data"];
    $posts = get_multiple_posts_by_title_free($title);
    echo $posts;
    die();
}

function get_multiple_posts_by_title_free($title) {
    global $wpdb;
    $posts = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE (post_title LIKE %s OR post_content LIKE %s)
                                                  AND post_type='product' LIMIT 5", '%' . $title . '%', '%' . $title . '%'), OBJECT );

    $elem = '<p class="ns-productsearch-close-div-free">
                <a class="ns-productsearch-boxclose-free" id="ns_boxclose_free"></a>
            </p>
            <table class="ns-productsearch-product-table ns-productsearch-table-fill ns-productsearch-table">
                <thead>
                <tr class="ns-productsearch-thead-tr">
                    <th class="ns-productsearch-product-table ns-productsearch-text-center ns-productsearch-thead-th">Product Name</th>
                </tr>
                </thead>
                <tbody class="ns-productsearch-product-table table-hover">';

    foreach ($posts as $post) {
        $guid = get_permalink($post);

        $elem .= '<tr  class="ns-productsearch-tbody-tr">
                    <td class="ns-productsearch-td-text-left ns-productsearch-tbody-td"><a class="ns-productsearch-link-product" href="'. $guid .'">' . $post->post_title .'</a></td>
                </tr> ';
    }
    $elem .= '</tbody>
                </table>';

    return $elem;
}


/*
function ns_productsearch_woocommerce_watermark_notice() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p>
            <a href="http://www.nsthemes.com/product/ajax-product-search-for-woocommerce/?utm_source=Ajax%20Products%20Search%20Bannerone&utm_medium=Bannerone%20dashboard&utm_campaign=Ajax%20Products%20Search%20Bannerone%20premium">
                <img src="<?=NS_SEARCH_PRODUCT_WC_PLUGIN_ROOT  ?>/img/woo-watermark-bennerone.png" style="width: 100%; height: auto;">
            </a>
        </p>
    </div>
    <?php
}
add_action( 'admin_notices', 'ns_productsearch_woocommerce_watermark_notice' );
*/
add_shortcode('ns-search-products-free', 'ns_search_product_searchform_free');

add_action( 'wp_ajax_my_ajax', 'ns_productsearch_my_ajax_free' );

function ns_productsearch_my_ajax_free() {
    die( "" );
}

include_once(SEARCH_PRODUCT_NS_PLUGIN_DIR_FREE . '/ns_search_products.admin.php');