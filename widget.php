function vfy_load_widget() {
	register_widget( 'vfy_retailer_services_widget' );
}
add_action( 'widgets_init', 'vfy_load_widget' );

// Retailer Services Widget
class vfy_retailer_services_widget extends WP_Widget {
	 
	function __construct() {
		parent::__construct( 'vfy_retailer_services_widget', __( 'Retailer Services' ), array( 'description' => __( 'A customisable list of Retailer\'s Services' ), 'customize_selective_refresh' => true, ) );
	}
	
	// The widget form (for the backend )
	public function form( $instance ) {

		// Set widget defaults
		$defaults = array(
			'feature1'   => '',
			'feature2'   => '',
			'feature3'   => '',
			'feature4'   => '',
			'feature5'   => '',
		);
		
		// Parse current settings with defaults
		extract( wp_parse_args( ( array ) $instance, $defaults ) );
		
		// Your options array
		$options = array(
			''        => __( 'None' ),
			'option_1' => __( 'Free Delivery' ),
			'option_2' => __( 'Quick Delivery' ),
			'option_3' => __( 'Click and Collect' ),
			'option_4' => __( 'Free Returns' ),
			'option_5' => __( 'Gift Cards' ),
			'option_6' => __( 'Free Gift Offers' ),
			'option_7' => __( 'Price Match' ),
			'option_8' => __( 'Loyalty Scheme' ),
			'option_9' => __( 'Multideal' ),
			'option_10' => __( 'Newsletter Offers' ),
			'option_11' => __( 'Referral Scheme' ),
			'option_12' => __( 'Student Deals' ),
		);
		
		// Dropdown ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'feature1' ); ?>"><?php _e( 'Service 1' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'feature1' ); ?>" id="<?php echo $this->get_field_id( 'feature1' ); ?>" class="widefat">
			<?php

			// Loop through options and add each one to the select dropdown
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select1, $key, false ) . '>'. $name . '</option>';

			} ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'feature2' ); ?>"><?php _e( 'Service 2' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'feature2' ); ?>" id="<?php echo $this->get_field_id( 'feature2' ); ?>" class="widefat">
			<?php

			// Loop through options and add each one to the select dropdown
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select2, $key, false ) . '>'. $name . '</option>';

			} ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'feature3' ); ?>"><?php _e( 'Service 3' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'feature3' ); ?>" id="<?php echo $this->get_field_id( 'feature3' ); ?>" class="widefat">
			<?php

			// Loop through options and add each one to the select dropdown
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select3, $key, false ) . '>'. $name . '</option>';

			} ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'feature4' ); ?>"><?php _e( 'Service 4' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'feature4' ); ?>" id="<?php echo $this->get_field_id( 'feature4' ); ?>" class="widefat">
			<?php

			// Loop through options and add each one to the select dropdown
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select4, $key, false ) . '>'. $name . '</option>';

			} ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'feature5' ); ?>"><?php _e( 'Service 5' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'feature5' ); ?>" id="<?php echo $this->get_field_id( 'feature5' ); ?>" class="widefat">
			<?php

			// Loop through options and add each one to the select dropdown
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select5, $key, false ) . '>'. $name . '</option>';

			} ?>
			</select>
		</p>

	<?php }
	
	// Update widget settings
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['feature1']   = isset( $new_instance['feature1'] ) ? wp_strip_all_tags( $new_instance['feature1'] ) : '';
		$instance['feature2']   = isset( $new_instance['feature2'] ) ? wp_strip_all_tags( $new_instance['feature2'] ) : '';
		$instance['feature3']   = isset( $new_instance['feature3'] ) ? wp_strip_all_tags( $new_instance['feature3'] ) : '';
		$instance['feature4']   = isset( $new_instance['feature4'] ) ? wp_strip_all_tags( $new_instance['feature4'] ) : '';
		$instance['feature5']   = isset( $new_instance['feature5'] ) ? wp_strip_all_tags( $new_instance['feature5'] ) : '';
		return $instance;
	}
	
	// Creating widget front-end
	public function widget( $args, $instance ) {
		
		$ret_name = get_post_meta( get_the_ID(), '_retailer_name', true );
		
		$ret_labels = array(
			'option_1' => __( 'Free Delivery' ),
			'option_2' => __( 'Quick Delivery' ),
			'option_3' => __( 'Click and Collect' ),
			'option_4' => __( 'Free Returns' ),
			'option_5' => __( 'Gift Cards' ),
			'option_6' => __( 'Free Gift Offers' ),
			'option_7' => __( 'Price Match' ),
			'option_8' => __( 'Loyalty Scheme' ),
			'option_9' => __( 'Multideal' ),
			'option_10' => __( 'Newsletter Offers' ),
			'option_11' => __( 'Referral Scheme' ),
			'option_12' => __( 'Student Deals' ),
		);
		
		$select1   = isset( $instance['feature1'] ) ? $instance['feature1'] : '';
		$select2   = isset( $instance['feature2'] ) ? $instance['feature2'] : '';
		$select3   = isset( $instance['feature3'] ) ? $instance['feature3'] : '';
		$select4   = isset( $instance['feature4'] ) ? $instance['feature4'] : '';
		$select5   = isset( $instance['feature5'] ) ? $instance['feature5'] : '';
		
		echo $args['before_widget'];
		echo $args['before_title'] . 'What ' . $ret_name . ' Offers:' . $args['after_title'];		
		
		if ( $select1 ) {
			echo '<img src="' . get_stylesheet_directory_uri() . '/images/retailer-services/' . $select1 . '.png" />';
			echo '<p><label class="services-listing-label">' . $ret_labels[$select1] . '</label></p>';
		}
		
		if ( $select2 ) {
			echo '<img src="' . get_stylesheet_directory_uri() . '/images/retailer-services/' . $select2 . '.png" />';
			echo '<p><label class="services-listing-label">' . $ret_labels[$select2] . '</label></p>';
		}
		
		if ( $select3 ) {
			echo '<img src="' . get_stylesheet_directory_uri() . '/images/retailer-services/' . $select3 . '.png" />';
			echo '<p><label class="services-listing-label">' . $ret_labels[$select3] . '</label></p>';
		}
		
		if ( $select4 ) {
			echo '<img src="' . get_stylesheet_directory_uri() . '/images/retailer-services/' . $select4 . '.png" />';
			echo '<p><label class="services-listing-label">' . $ret_labels[$select4] . '</label></p>';
		}
		
		if ( $select5 ) {
			echo '<img src="' . get_stylesheet_directory_uri() . '/images/retailer-services/' . $select5 . '.png" />';
			echo '<p><label class="services-listing-label">' . $ret_labels[$select5] . '</label></p>';
		}
		
		echo $args['after_widget'];
	}
			 		 
}
