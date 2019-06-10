<?php
/**
 * Plugin Name: Technicality
 * Version: 20190609
 * Description: This plugin adds features to the Technicality blog
 * Author: Jeff Trotman
 */
 
function hook_gaheader() {
    $setting = get_option('technicality_gaTrackingId');
    if (isset( $setting ))
    {
    ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141740265-2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            //gtag('config', 'UA-141740265-2');
            gtag('config', <?php esc_attr( $setting ) ?>)
        </script>
    <?php
    }
}
add_action('wp_head', 'hook_gaheader');

function technicality_settings_init()
{
    // register a new setting for "reading" page
    register_setting('reading', 'technicality_gaTrackingId');
 
    // register a new field in the "wporg_settings_section" section, inside the "reading" page
    add_settings_field(
        'technicality_gaTrackingId_field',
        'Google Analytics Tracking ID',
        'technicality_settings_field_cb',
        'reading'
        'default'
    );
}
 
/**
 * register technicality_settings_init to the admin_init action hook
 */
add_action('admin_init', 'technicality_settings_init');
 
/**
 * callback functions
 */
 
// field content cb
function technicality_settings_field_cb()
{
    // get the value of the setting we've registered with register_setting()
    $setting = get_option('technicality_gaTrackingId');
    // output the field
    ?>
    <input type="text" name="technicality_gaTrackingId" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}