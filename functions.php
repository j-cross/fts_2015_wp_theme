<?php
/**
 * FTS 2015 functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package FTS 2015
 * @since 0.1.0
 */
 
 // Useful global constants
define( 'FTS_2015__VERSION', '0.1.0' );
 
 /**
  * Set up theme defaults and register supported WordPress features.
  *
  * @uses load_theme_textdomain() For translation/localization support.
  *
  * @since 0.1.0
  */
 function fts_2015__setup() {
	/**
	 * Makes FTS 2015 available for translation.
	 *
	 * Translations can be added to the /lang directory.
	 * If you're building a theme based on FTS 2015, use a find and replace
	 * to change 'fts_2015_' to the name of your theme in all template files.
	 */
	load_theme_textdomain( 'fts_2015_', get_template_directory() . '/languages' );
 }
 add_action( 'after_setup_theme', 'fts_2015__setup' );

 /**
  * Enqueue scripts and style for back-end.
  *
  */
 function fts_2015_backend_scripts_style(){
  if(is_admin()){
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
    wp_enqueue_script( 'fts_2015_', get_template_directory_uri() . "/assets/js/fts_2015-admin.js", array('jquery'), FTS_2015__VERSION, true );
  }
 }
 add_action('admin_print_scripts', fts_2015_backend_scripts_style);

 function fts_2015_add_page_meta(){
    add_meta_box( 'fts_2015_page_settings', __( 'Page Settings' ), 'fts_2015_page_settings_output', 'page', 'side', 'default'  );
 }
 add_action('add_meta_boxes', 'fts_2015_add_page_meta');

 function fts_2015_page_settings_output($post){
  $fts_2015_bg_id = get_post_meta($post->ID, 'fts_2015_background_image', true);
  $fts_2015_enable_page = get_post_meta($post->ID, 'fts_2015_one_page', true);
  $fts_2015_subtitle = get_post_meta($post->ID, 'fts_2015_subtitle', true);
  if($fts_2015_bg_id == ''){
    $fts_2015_background_image = '';
  }else{
    $fts_2015_background_image = wp_get_attachment_image_src( $fts_2015_bg_id, 'thumbnail', true );    
  }
?>
<p>
  <strong>Enable Page</strong>
</p>
<div class="clearfix">
  <input id="fts_2015_one_page" name="fts_2015_one_page" type="checkbox" <?php echo ($fts_2015_enable_page == '1' ? 'checked="checked"' : '');?> /> Add this page to the one page scroll
</div>
<p>
  <strong>Subtitle</strong>
</p>
<div class="clearfix">
  <textarea id="fts_2015_subtitle" name="fts_2015_subtitle" style="width: 100%;"><?php echo esc_textarea($fts_2015_subtitle); ?></textarea>
</div>
<p>
  <strong>Page Background</strong>
  <br />
  <em>Resolution should be at 1024x682</em>
</p>
<label class="screen-reader-text" for="fts_2015_background_image">Page Background</label>
<div class="clearfix fts-image-upload" data-preview_size="thumbnail" data-library="all" >
  <div class="has-image">
    <img id="fts_2015_preview_image" src="<?php echo esc_url($fts_2015_background_image[0]); ?>" alt=""/>
    <?php wp_nonce_field('fts_2015_nonce_check', 'fts_2015_nonce'); ?>
    <input type="hidden" id="fts_2015_background_image" name="fts_2015_background_image" value="<?php echo $fts_2015_bg_id; ?>" />
    <div class="hover">
      <ul class="bl">
        <li><a class="fts_2015_remove_image" href="#"><?php _e("Remove"); ?></a></li>
        <li><a class="fts_2015_edit_image" href="#"><?php _e("Edit"); ?></a></li>
      </ul>
    </div>
  </div>
  <div class="no-image">
    <p><?php _e('No image selected'); ?> <input type="button" class="button fts_2015_add_image" value="<?php _e('Add Image'); ?>" />
  </div>
</div>
<?php
 }
 
 function fts_2015_save_page_meta($post_id){
    if(!isset($_POST['fts_2015_nonce']) || !wp_verify_nonce($_POST['fts_2015_nonce'], 'fts_2015_nonce_check')){
      return;
    }
    if(!current_user_can('edit_post', $post_id)){
      return;
    }
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
      return;
    }
    if(isset($_POST['fts_2015_background_image'])){
      update_post_meta($post_id, 'fts_2015_background_image', $_POST['fts_2015_background_image']);    
    }
    if(isset($_POST['fts_2015_one_page'])){
      update_post_meta($post_id, 'fts_2015_one_page', TRUE);    
    }else{
      update_post_meta($post_id, 'fts_2015_one_page', FALSE);    
    }
    if(isset($_POST['fts_2015_subtitle'])){
      update_post_meta($post_id, 'fts_2015_subtitle', $_POST['fts_2015_subtitle']);    
    }
 }
 add_action('save_post', 'fts_2015_save_page_meta');
 /**
  * Enqueue scripts and styles for front-end.
  *
  * @since 0.1.0
  */
 function fts_2015__scripts_styles() {
	$postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';

//TODO: add {$postfix} back to the enqueues before pushing live for min versions.
	wp_enqueue_script( 'fts_2015_', get_template_directory_uri() . "/assets/js/fts_2015.js", array('jquery'), FTS_2015__VERSION, true );
		
	wp_enqueue_style( 'fts_2015_', get_template_directory_uri() . "/assets/css/fts_2015.css", array(), FTS_2015__VERSION );
 }
 add_action( 'wp_enqueue_scripts', 'fts_2015__scripts_styles' );
 
 /**
  * Add humans.txt to the <head> element.
  */
 function fts_2015__header_meta() {
	$humans = '<link type="text/plain" rel="author" href="' . get_template_directory_uri() . '/humans.txt" />';
	
	echo apply_filters( 'fts_2015__humans', $humans );
 }
 add_action( 'wp_head', 'fts_2015__header_meta' );