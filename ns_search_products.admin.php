<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
//Amministrazione WP

//Genero la pagina
function ns_productsearch_update_options_form()
{
    ?>
    <div class="wrap">
		<a href="http://www.nsthemes.com/product/ajax-product-search-for-woocommerce/?utm_source=Ajax%20Products%20Search%20Bannerone&utm_medium=Bannerone%20dashboard&utm_campaign=Ajax%20Products%20Search%20Bannerone%20premium">
			<img src="<?=NS_SEARCH_PRODUCT_WC_PLUGIN_ROOT  ?>/img/woo-watermark-bennerone.png" style="width: 100%; height: auto;">
		</a>
    <div class="icon32" id="icon-options-general"><br /></div>
    <h2>FREE NS Ajax Product Search Configuration</h2>
    <form method="post" action="options.php">


    <?php settings_fields('ns_options_group');  ?>
        <table class="form-table">
            <tbody>
            <tr valign="top">
                <th scope="row">
                    <label>Plugin's Fast tutorial</label>
                    <hr>
                </th>
            </tr>
            <tr valign="top">
                <td colspan="2">
                    <span style="font-size: 13px">
                        <p>For use this plugin you can use 2 methods:</p>
                        <p>
                            - <span style="font-weight: bold;">Shortcode:</span> <span style="font-style: italic">[ns-search-products-free]</span> use this shortcode where you want to see the search bar<br>
                            - <span style="font-weight: bold;">Widget:</span> insert and configure widget in the relative Wordpress section. The plugin'name is "Ajax Live Product Search"
                        </p>
                    </span>
                    <br><br>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <p>
                        <a href="http://www.nsthemes.com/product/ajax-product-search-for-woocommerce/?utm_source=Ajax%20Products%20Search%20Bannerino&utm_medium=Bannerino%20dentro%20settings&utm_campaign=Ajax%20Products%20Search%20Bannerino%20premium">
                            <img src="<?php echo NS_SEARCH_PRODUCT_WC_PLUGIN_ROOT;  ?>/img/woo-watermark-bannerino.png" style="height: auto;">
                        </a>
                    </p>
                </td>
            </tr>

           </tbody>
       </table>
 
       </form>
   </div>



    <?php
}

//Aggiungo il link all'amministrazione
function ns_add_option_page()
{
    add_menu_page( 'NS Ajax Search', 'NS Ajax Search', 'administrator', 'ns-productsearch-options-page', 'ns_productsearch_update_options_form', NS_SEARCH_PRODUCT_WC_PLUGIN_ROOT . '/asset/backend-sidebar-icon.png', 60 );
}
 
add_action('admin_menu', 'ns_add_option_page');
