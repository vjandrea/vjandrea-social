<?php
/*
Plugin Name: VJAndrea Social
Plugin URI: http://www.vjandrea.net
Description: VJAndrea custom social icons widget
Version: 1.0
Author: Andrea Bergamasco
Author URI: http://twitter.com/vjandrea
License: GPL2
*/


class vjandrea_social extends WP_Widget {

	// constructor
	function vjandrea_social() {
		/* ... */
		parent::WP_Widget(false, $name = __('VJAndrea Social', 'wp_widget_plugin') );

	}

	// widget form creation
	function form($instance) {	
	/* ... */

		// Check values
		if( $instance) {
		     $email = esc_attr($instance['email']);
		     $facebook = esc_attr($instance['facebook']);
		     $instagram = esc_attr($instance['instagram']);
		     $pinterest = esc_attr($instance['pinterest']);
		     $twitter = esc_attr($instance['twitter']);
		} else {
		     $email = '';
		     $facebook = '';
		     $instagram = '';
		     $pinterest = '';
		     $twitter = '';
		}
		?>

		<!-- email -->
		<p>
		<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
		</p>

		<!-- facebook -->
		<p>
		<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />
		</p>

		<!-- instagram -->
		<p>
		<label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo $instagram; ?>" />
		</p>

		<!-- pinterest -->
		<p>
		<label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo $pinterest; ?>" />
		</p>

		<!-- twitter -->
		<p>
		<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />
		</p>

		<?php
	}

	// widget update
	function update($new_instance, $old_instance) {
		/* ... */
		$instance = $old_instance;
		// Fields
		$instance['email'] = strip_tags($new_instance['email']);
		$instance['facebook'] = strip_tags($new_instance['facebook']);
		$instance['instagram'] = strip_tags($new_instance['instagram']);
		$instance['pinterest'] = strip_tags($new_instance['pinterest']);
		$instance['twitter'] = strip_tags($new_instance['twitter']);
		return $instance;
	}

	// widget display
	function widget($args, $instance) {
		/* ... */


		extract( $args );
		// these are the widget options
		//$title = apply_filters('widget_title', $instance['title']);

		$email = $instance['email'];
		$facebook = $instance['facebook'];
		$instagram = $instance['instagram'];
		$pinterest = $instance['pinterest'];
		$twitter = $instance['twitter'];

		echo $before_widget;
		// Display the widget
		echo '<div id="vjandrea_social">';
		echo '<ul>';

		// // Check if title is set
		// if ( $title ) {
		//   echo $before_title . $title . $after_title;
		// }

		// Check if email is set
		if( $email ) {
			//echo '<p class="wp_widget_plugin_text"><a href="mailto:'.$email.'">'.$email.'</a></p>';
			echo '<li><a href="mailto:'.$email.'"><img src="'.plugin_dir_url( __FILE__ ).'icons/social-email.png" /></a></li>';
		}

		// Check if facebook is set
		if( $facebook ) {
			echo '<li><a href="http://www.facebook.com/'.$facebook.'"><img src="'.plugin_dir_url( __FILE__ ).'icons/social-facebook.png" /></a></li>';
		}

		// Check if instagram is set
		if( $instagram ) {
			echo '<li><a href="http://www.instagram.com/'.$instagram.'"><img src="'.plugin_dir_url( __FILE__ ).'icons/social-instagram.png" /></a></li>';
		}

		// Check if pinterest is set
		if( $pinterest ) {
			echo '<li><a href="http://www.pinterest.com/'.$pinterest.'"><img src="'.plugin_dir_url( __FILE__ ).'icons/social-pinterest.png" /></a></li>';
		}

		// Check if twitter is set
		if( $twitter ) {
			echo '<li><a href="http://www.twitter.com/'.$twitter.'"><img src="'.plugin_dir_url( __FILE__ ).'icons/social-twitter.png" /></a></li>';
		}

		echo '</ul>';
		echo '</div>';
		echo $after_widget;
	}
}

// register widget
wp_enqueue_style('vjandrea_social',plugin_dir_url(__FILE__).'style.css');

add_action('widgets_init', create_function('', 'return register_widget("vjandrea_social");'));


