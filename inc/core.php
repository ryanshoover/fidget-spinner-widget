<?php

namespace Spinner;

class Core
{
	public static function get_instance() {

		static $instance = null;

		if ( null === $instance ) {
			$instance = new static();
		}

		return $instance;
	}

	private function __clone() {}

	private function __wakeup() {}

	protected function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	public function enqueue_scripts() {
		wp_enqueue_script( 'spinner', URL . 'js/scripts.js', [ 'jquery' ], VERSION, true );
		wp_enqueue_style( 'spinner', URL . 'css/style.css', [], VERSION );
	}
}

Core::get_instance();
