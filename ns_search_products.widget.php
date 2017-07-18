<?php

// Creating the widget 
class ns_search_product_widget extends WP_Widget {

	function __construct() {
	parent::__construct(
		// Base ID of your widget
		'ns_search_product_widget', 

		// Widget name will appear in UI
		__('NS Ajax Product Search', 'ns_search_product_widget_domain'),

		// Widget description
		array( 'description' => __( 'Search Form for WooCommerce ajax product search FREE VERSION', 'ns_search_product_widget_domain' ), )
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$placeholder = apply_filters( 'widget_title', $instance['placeholder'] );
		
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

		// This is where you run the code and display the output
		echo __( '<form role="search" class="ns-productsearch-form" method="get" id="ns_searchform" name="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
                <div>
                    <div id="ns_input-container-widget-free" class="ns-productsearch-input-container" >
                        <div class="ns-tab-cell-widget-free">
                            <input 
                                type="text" 
                                value="' . get_search_query() . '" 
                                name="s" 
                                id="ns_s_widget_free"
                                class="ns-productsearch-input-search"
                                placeholder="' . $placeholder . '" />
                        </div>
                        <ul id="ns_product_list_id_widget_free" class="ns-productsearch-product-list-id-free"></ul>
                    </div>

                    <input type="submit" id="searchsubmit_widget_free" value="'. esc_attr__( 'Search', 'woocommerce' ) .'" class="ns-productsearch-searchsubmit-widget-free"/>
                    <input type="hidden" name="post_type" value="product" />
                </div>
            </form>', 'ns_search_product_widget_domain' );
		echo $args['after_widget'];
	}
			
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
		}
		else {
		$title = __( 'New title', 'ns_search_product_widget_domain' );
		}
		if ( isset( $instance[ 'placeholder' ] ) ) {
		$placeholder = $instance[ 'placeholder' ];
		}
		else {
		$placeholder = __( 'Insert Search term', 'woocommerce' );
		}
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input type="text"
				   class="widefat"
				   id="<?php echo $this->get_field_id( 'title' ); ?>"
				   name="<?php echo $this->get_field_name( 'title' ); ?>"
				   value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'placeholder' ); ?>"><?php _e( 'Placeholder:' ); ?></label>
			<input type="text"
				   class="widefat"
				   id="<?php echo $this->get_field_id( 'placeholder' ); ?>"
				   name="<?php echo $this->get_field_name( 'placeholder' ); ?>"
				   value="<?php echo esc_attr( $placeholder ); ?>" />
		</p>

		<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['placeholder'] = ( ! empty( $new_instance['placeholder'] ) ) ? strip_tags( $new_instance['placeholder'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here

// Register and load the widget
function ns_load_widget_free() {
	register_widget( 'ns_search_product_widget' );
}
add_action( 'widgets_init', 'ns_load_widget_free' );