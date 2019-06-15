=== Technicality Google Analytics ===
Contributors: jefftrotman
Tags: Google Analytics
Requires at least: 4.6
Tested up to: 5.2.1
Stable tag: trunk
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
ReadMe for Technicality Google Analytics

Adds your Google Analytics Tracking ID to your headers.

== Description ==

This is a very simple WordPress plugin that adds the code needed for Google Analytics to your page. 

If your Google Analytics Tracking ID is UA-XXXXXXXX-1, this code needs to be added to your page headers for tracking to occur:

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXXX-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-XXXXXXXX-1');
</script>

The plugin adds a field to the General Settings page for you to enter your Tracking ID. Activate the plugin, enter your Tracking ID - that's all you have to do. The code above (with your Tracking ID) will automatically be inserted into the header of each page your readers view.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/technicality-google-analytics` directory, or install the plugin through the WordPress plugins screen directly. 
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the Settings->General screen to enter your Google Tracking ID.

== Changelog ==

= 1.0 =
* Initial version.
