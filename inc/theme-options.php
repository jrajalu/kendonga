<?php

add_action('admin_menu', 'jrwtdw_create_menu');

function jrwtdw_create_menu() {
  add_menu_page( 'Web Settings', 'Web Settings', 'manage_options', 'web_settings', 'jrwtdw_settings_page', 'dashicons-admin-generic', 99 );
  add_action( 'admin_init', 'register_jrwtdw_settings' );
}

function register_jrwtdw_settings() {
  register_setting( 'jrwtdw-settings-group', 'jrwtdw_facebook' );
  register_setting( 'jrwtdw-settings-group', 'jrwtdw_instagram' );
}

function jrwtdw_settings_page() {
?>
<div class="wrap">
<h2>Website Settings</h2><hr>

<form method="post" action="options.php">
    <?php settings_fields( 'jrwtdw-settings-group' ); ?>
    <?php do_settings_sections( 'jrwtdw-settings-group' ); ?>
    <h3 class="title">Social Media Links</h3>
    <p>Enter full url e.g <em>https://www.facebook.com/username</em></p>
    <table class="form-table">
    
        <tr valign="top">
        <th scope="row">Facebook</th>
        <td><input type="text" name="jrwtdw_facebook" value="<?php echo esc_attr( get_option('jrwtdw_facebook') ); ?>" class="regular-text" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Instagram</th>
        <td><input type="text" name="jrwtdw_instagram" value="<?php echo esc_attr( get_option('jrwtdw_instagram') ); ?>" class="regular-text" /></td>
        </tr>

    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>