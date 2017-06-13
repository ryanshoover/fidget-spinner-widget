<?php
/**
 * Defines the Spinner Widget class
 */

namespace Spinner;

class Widget extends \WP_Widget
{

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$widget_ops = array(
			'classname' => 'widget-spinner',
			'description' => 'It\'s a fidget spinner widget!',
		);
		parent::__construct( 'spinner', 'Spinner', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		// echo file_get_contents( PATH . 'images/fidget-spinner.svg' );
		echo '<div class="spinner-container">';
		printf( '<img src="%s" alt="Fidget spinner" class="spinner">', URL . 'images/fidget-spinner.png' );
		printf( '<img src="%s" alt="Fidget spinner" class="center-piece">', URL . 'images/fidget-spinner-center.png' );
		echo '</div>';

		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
}

add_action('widgets_init', function () {
	register_widget( '\Spinner\Widget' );
});
