<?php
class GPlusProvider {

	static public function add_sharing_service( $services ) {
		$services['jetpack-gplus-provider'] = 'Share_GPlus';
		return $services;
	}
	
	static public function add_headers() {
		echo '<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>';
	}
	
	static public function add_admin_style(){
		wp_enqueue_style('jetpack-gplus-provider', plugin_dir_url( __FILE__ ).'css/admin.css', false, JETPACK_GPLUS_PROVIDER_VERSION );
	}
	
}
?>