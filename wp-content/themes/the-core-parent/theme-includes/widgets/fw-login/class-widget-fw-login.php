<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

class Widget_FW_Login extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'description' => esc_html__( 'A login form widget.', 'the-core' ) );

		parent::__construct( false, esc_html__( 'Login - TF', 'the-core' ), $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$params = array();

		foreach ( $instance as $key => $value ) {
			$params[ $key ] = $value;
		}

		$title = $before_title . $params['title'] . $after_title;
		unset( $params['title'] );

		$filepath =get_template_directory() . '/theme-includes/widgets/fw-login/views/widget.php';

		$data = array(
			'instance'      => $params,
			'title'         => $title,
			'before_widget' => str_replace( 'class="widget ', 'class="widget fw-widget-login ', $before_widget ),
			'after_widget'  => $after_widget,
		);

		echo fw_render_view( $filepath, $data );
	}

	function update( $new_instance, $old_instance ) {
		$instance                  = wp_parse_args( (array) $new_instance, $old_instance );
		$instance['title']         = $new_instance['title'];
		$instance['show_remember'] = ! empty( $new_instance['show_remember'] ) ? 1 : 0;
		$instance['show_forgot']   = ! empty( $new_instance['show_forgot'] ) ? 1 : 0;

		return $instance;
	}

	function form( $instance ) {
		$instance      = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$show_remember = isset( $instance['show_remember'] ) ? (bool) $instance['show_remember'] : false;
		$show_forgot   = isset( $instance['show_forgot'] ) ? (bool) $instance['show_forgot'] : false;
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'the-core' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>"/>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_remember' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_remember' ) ); ?>"<?php checked( $show_remember ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_remember' ) ); ?>"><?php esc_html_e( 'Show remember button', 'the-core' ); ?></label><br/>

			<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_forgot' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_forgot' ) ); ?>"<?php checked( $show_forgot ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_forgot' ) ); ?>"><?php esc_html_e( 'Show forgot password', 'the-core' ); ?></label><br/>
		</p>
	<?php
	}
}