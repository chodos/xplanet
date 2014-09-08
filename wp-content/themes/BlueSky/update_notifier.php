<?php
/**
 * Provides a notification everytime the theme is updated
 */

function update_notifier_menu() {  
	$xml = get_latest_theme_version(10); // This tells the function to cache the remote call for 21600 seconds (6 hours)
	$theme_data = get_theme_data(TEMPLATEPATH . '/style.css'); // Get theme data from style.css (current version is what we want)
	
	if(version_compare($theme_data['Version'], $xml->latest) == -1) {
	add_dashboard_page( $theme_data['Name'] . 'Theme Updates', $theme_data['Name'] . '<span class="update-plugins count-1"><span class="update-count">Update</span></span>', 'administrator', $theme_data['Name'] . '-updates', update_notifier);
	
	add_action('admin_notices', 'notice');
			
	}
}  
add_action('admin_menu', 'update_notifier_menu');


function notice(){ 
	$xml = get_latest_theme_version(10); // This tells the function to cache the remote call for 21600 seconds (6 hours)
	$theme_data = get_theme_data(TEMPLATEPATH . '/style.css'); // Get theme data from style.css (current version is what we want)
	
	} 
 
function update_notifier() { 
	$xml = get_latest_theme_version(10); // This tells the function to cache the remote call for 21600 seconds (6 hours)
	$theme_data = get_theme_data(TEMPLATEPATH . '/style.css'); // Get theme data from style.css (current version is what we want) ?>
	
	<style>
		.update-nag {display: none;}
		#instructions {max-width: 800px;}
		h3.title {margin: 30px 0 0 0; padding: 30px 0 0 0; border-top: 1px solid #ddd;}
	</style>

	<div class="wrap">
	
		<div id="icon-tools" class="icon32"></div>
		<h2><?php echo $theme_data['Name']; ?> Theme Updates</h2>
	   
     <img style="float: left; margin: 15px 20px 40px 0; border: 1px solid #ddd; padding: 1px;" src="<?php echo get_bloginfo( 'template_url' ) . '/screenshot.png'; ?>" />
     
     <div id="instructions" style="max-width: 800px;">
         <h3>Update Download and Instructions</h3>
         <p>There is a new version of <?php echo $theme_data['Name']; ?> available. <br />You have version <?php echo $theme_data['Version']; ?> installed, update to <?php echo $xml->latest; ?></p>
         <p>Please note: make a <strong>backup</strong> of the Theme inside your WordPress installation folder <strong>/wp-content/themes/<?php echo ($theme_data['Name']); ?>/</strong></p>
         <p>To download version <?php echo $xml->latest; ?> of theme, go to <a href="http://themepix.com/wordpress-themes/<?php echo $theme_data['Name']; ?>" target="_blank">ThemePix.com</a> website and download it.</p>
         <p>Extract the zip's contents, look for the extracted theme folder, and after you have all the new files upload them using FTP to the <strong>/wp-content/themes/<?php echo ($theme_data['Name']); ?>/</strong> folder overwriting the old ones (this is why it's important to backup any changes you've made to the theme files).</p>
         <p>If you didn't make any changes to the theme files, you are free to overwrite them with the new ones without the risk of losing theme settings, pages, posts, etc, and backwards compatibility is guaranteed.</p>
     </div>
        
            <div class="clear"></div>
	    
	    <h3 class="title">Changelog</h3>
	    <?php echo $xml->changelog; ?>

	</div>
    
<?php }

// This function retrieves a remote xml file on my server to see if there's a new update 
// For performance reasons this function caches the xml content in the database for XX seconds ($interval variable)
function get_latest_theme_version($interval) {
	
	$theme_data = get_theme_data(TEMPLATEPATH . '/style.css'); // Get theme data from style.css (current version is what we want)
	
	// remote xml file location
	$notifier_file_url = "http://themepix.com/demo/wp-content/themes/".$theme_data['Name']."/notifier.xml";
	
	$db_cache_field = 'contempo-notifier-cache';
	$db_cache_field_last_updated = 'contempo-notifier-last-updated';
	$last = get_option( $db_cache_field_last_updated );
	$now = time();
	// check the cache
	if ( !$last || (( $now - $last ) > $interval) ) {
		// cache doesn't exist, or is old, so refresh it
		if( function_exists('curl_init') ) { // if cURL is available, use it...
			$ch = curl_init($notifier_file_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			$cache = curl_exec($ch);
			curl_close($ch);
		} else {
			$cache = file_get_contents($notifier_file_url); // ...if not, use the common file_get_contents()
		}
		
		if ($cache) {			
			// we got good results
			update_option( $db_cache_field, $cache );
			update_option( $db_cache_field_last_updated, time() );			
		}
		// read from the cache file
		$notifier_data = get_option( $db_cache_field );
	}
	else {
		// cache file is fresh enough, so read from it
		$notifier_data = get_option( $db_cache_field );
	}
	
	$xml = simplexml_load_string($notifier_data); 
	
	return $xml;
}

?>