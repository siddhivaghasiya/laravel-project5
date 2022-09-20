<?php


	 function UPLOAD_AND_DOWNLOAD_PATH(){

	 	if (env('IS_LIVE_DEMO_LOCAL') == 'local') {
	 		
	 		return public_path();

	 	}elseif(env('IS_LIVE_DEMO_LOCAL') == 'demo') {
	 		
	 		return '/home/tpnzxxed97oz/public_html/cdnify.softtechover.com/public';

	 	}elseif (env('IS_LIVE_DEMO_LOCAL') == 'live') {
	 		
	 		return '/home/tpnzxxed97oz/public_html/cdn.softtechover.com/public';
	 	}
	 }

	function UPLOAD_AND_DOWNLOAD_URL(){

	 	if (env('IS_LIVE_DEMO_LOCAL') == 'local') {
	 		
	 		return asset('');

	 	}else if(env('IS_LIVE_DEMO_LOCAL') == 'demo') {
	 		
	 		return 'http://cdnify.softtechover.com/';

	 	}else if (env('IS_LIVE_DEMO_LOCAL') == 'live') {
	 		
	 		return 'http://cdn.softtechover.com/';
	 	}
	 }
