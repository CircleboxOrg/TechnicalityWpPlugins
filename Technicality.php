<?php
/**
 * Plugin Name: Technicality
 * Version: 20190609
 * Description: This plugin adds features to the Technicality blog
 * Author: Jeff Trotman
 */
 
function hook_gaheader() {
    ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141740265-2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-141740265-2');
        </script>
    <?php
}
add_action('wp_head', 'hook_gaheader');