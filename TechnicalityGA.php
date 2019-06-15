<?php
/**
 * Plugin Name: Technicality Google Analytics
 * Plugin URI: http://technicality.online/products/GoogleAnalyticsWordPressPlugin
 * Version: 1.0.1
 * Description: Simple - enter your Google Tracking ID in a new field on the General Settings page and the Google Analytics script will be added to the header of each post and page.
 * Author: Jeff Trotman, Technicality LLC
 * Author URI: http://technicality.online
 */
 
function technicalityGA_hook_gaheader() {
    $setting = get_option('technicality_gaTrackingId');
    if (isset( $setting ))
    {
    ?>
        <!-- Global site tag (gtag.js) - added by Technicality Google Analytics plugin -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( $setting ) ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '<?php echo esc_attr( $setting ) ?>')
        </script>
        <!-- end of section added by Technicality Google Analytics pluging -->
    <?php
    }
}
add_action('wp_head', 'technicalityGA_hook_gaheader');

function technicalityGA_settings_init()
{
    // register a new setting for "reading" page
    register_setting('general', 'technicality_gaTrackingId');
 
    // register a new section in the "reading" page
    add_settings_section(
        'technicalityGA_settings_section',
        'Technicality Google Analytics',
        'technicalityGA_settings_section_cb',
        'general'
    );

    // register a new field in the "wporg_settings_section" section, inside the "reading" page
    add_settings_field(
        'technicality_gaTrackingId_field',
        'Google Analytics Tracking ID',
        'technicalityGA_settings_field_cb',
        'general',
        'technicalityGA_settings_section'
    );
}
 
/**
 * register technicality_settings_init to the admin_init action hook
 */
add_action('admin_init', 'technicalityGA_settings_init');
 
/**
 * callback functions
 */
 
// section content cb
function technicalityGA_settings_section_cb()
{
    //don't do anything;
}

 // field content cb
function technicalityGA_settings_field_cb()
{
    // get the value of the setting we've registered with register_setting()
    $setting = get_option('technicality_gaTrackingId');
    // output the field
    ?>
    <input type="text" name="technicality_gaTrackingId" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}