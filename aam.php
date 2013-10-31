<?php
/**
 Plugin Name: Adsnative Analytics Module 
 Plugin URI: https://www.adsnative.com
 Description: After installation, you must click '<a href='options-general.php?page=AdsNative-Analytics'>Settings &rarr; AdsNative Analytics Module</a>' to turn on the module.
 Version: 0.0.1
 Author: AdsNative
 Author URI: https://www.adsnative.com
 */

define('aam_PLUGIN_VERSION', '0.0.1');
define('aam_PLUGIN_URL', PLugin_dir_url(__FILE__));
define('aam_PLUGIN_SUPPORT_EMAIL', 'contact@adsnative.com');


/**
 * Print the tracking <script/> tags
 */
function aam_insert_js() {
   $aam_pid = get_option('aam_pid');
 $aam_PLUGIN_VERSION = aam_PLUGIN_VERSION;
 $aam_api_server= get_option('aam_api_server');
  if( $aam_pid && $aam_api_server  ) {
?>

<!-- AdsNative Analytics Module Version: <?php print ( $aam_PLUGIN_VERSION ); ?>-->
<script type='text/javascript' id='aam-analytics'>
    var _an_sid="", _an_key="<?php print ( $aam_pid ); ?>";
    (function(){
      var s = document.createElement('script');
      s.async = true;
      s.type = 'text/javascript';
      s.src = document.location.protocol + "<?php print ( $aam_api_server );?>";
      (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(s);
    })();
</script>

  <!-- end AdsNative -->
<?php
  }
}
 

/**
 * Add the AAM admin section
 *
 */
function aam_load_admin()
{
    include_once('aam_admin.php');
}

/**
 * Add the AAM admin options to the Settings Menu
 *
 */
function aam_admin_actions()
{
    add_options_page("AdsNative Analytics", "AdsNative Analytics", 1, "AdsNative-Analytics", "aam_load_admin");
}



add_action('wp_footer','aam_insert_js');
add_action('admin_menu','aam_admin_actions');
?>
