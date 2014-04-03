<?php

class Healthcare_County_Data {
	public function __construct() {
		add_action( 'init', array( $this, 'setup' ) );
		add_action( 'save_post', array( $this, 'save_post' ), 10, 2 );
	}

	public function setup() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ), 10, 2 );
	}

	public function add_meta_boxes( $post_type ) {
		add_meta_box( 'wsu_svg_county_data', 'County Data JSON', array( $this, 'county_data_json' ), $post_type );
	}

	public function county_data_json() {
		$current_json = get_post_meta( get_the_ID(), '_county_json_data', true );
		if ( empty( $current_json ) ) {
			$current_json = '';
		}
		?><textarea name="county_json" style="width:100%; height:100%;min-height: 300px;"><?php echo $current_json; ?></textarea><?php
	}

	public function save_post( $post_id, $post ) {
		if ( 'page' === $post->post_type && isset( $_POST['county_json'] ) ) {
			$data = $_POST['county_json'];
			update_post_meta( $post_id, '_county_json_data', $data );
		}
	}
}
new Healthcare_County_Data();