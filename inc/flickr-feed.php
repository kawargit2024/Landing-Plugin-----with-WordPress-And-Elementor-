<?php
// create custom plugin settings menu
add_action('admin_menu', 'landing_flickr_feed_menu');
function landing_flickr_feed_menu() {
	add_menu_page('Flickr Feed Menu', 'Flickr Feed Setting', 'administrator', __FILE__, 
		'landing_flickr_page','dashicons-format-gallery');  
}


// register flickr feed
add_action( 'admin_init', 'register_flickr_feed' );
function register_flickr_feed(){
	register_setting('landing_flickr_feed_grp','flickr_feed_id');
	register_setting('landing_flickr_feed_grp','flickr_feed_img');
}


// flickr settings page
function landing_flickr_page(){ ?>
<div class="wrap">
<h1><hr> FLICKR FEED SETTINGS <hr></h1>

<form method="post" action="options.php">
	<?php settings_fields('landing_flickr_feed_grp')?>
 	<?php do_settings_sections('landing_flickr_feed_grp')?>
	 <table style="text-align:left";>
		<tr>
			<th> <h2>1. Flickr ID. <small>Example: 199342056@N05 ( Default ) </small></h2> </th>			
		</tr>
		<tr>
			<td><input type="text" name="flickr_feed_id" value="<?php echo get_option('flickr_feed_id');?>"></td>
		</tr>
		<tr>
			<th> <h2>2. Display Flickr Image.  <small>( default value 8 )</small></h2></th>
		</tr>
		<tr>	
			<td><input type="text" name="flickr_feed_img" value="<?php echo get_option('flickr_feed_img');?>"></td>
		</tr>

	</table>
	<?php submit_button(); ?>
</form>

<h4>Explanation:</h4>
<ul>
	<li><p>You can check your Flickr ID <a href="http://idgettr.com/" target="_blank">here</a></p></li> 
	<li><p>You can decide how many images will be displayed. Default value is 8 </p></li>
</ul>
</div>

<?php }

