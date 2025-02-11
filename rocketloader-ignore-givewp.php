<?php
/*
Plugin Name: GiveWP & jQuery Rocket Loader Exclude
Description: Excludes GiveWP and jQuery JavaScript files from Cloudflare's Rocket Loader
Version: 1.0.1
Author: brandon sheats
*/

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

function givewp_jquery_exclude_from_rocket_loader($attr) {
    // Check if the script handle or src contains 'give' or 'jquery'
    if (isset($attr['id']) || isset($attr['src'])) {
        $check_string = strtolower(
            (isset($attr['id']) ? $attr['id'] : '') . 
            (isset($attr['src']) ? $attr['src'] : '')
        );
        
        if (strpos($check_string, 'give') !== false || 
            strpos($check_string, 'jquery') !== false) {
            
            // Add the data-cfasync attribute to exclude from Rocket Loader
            $attr['data-cfasync'] = 'false';
        }
    }
    
    return $attr;
}

// Add filters for both inline scripts and regular scripts
add_filter('wp_script_attributes', 'givewp_jquery_exclude_from_rocket_loader');
add_filter('wp_inline_script_attributes', 'givewp_jquery_exclude_from_rocket_loader');

// Optional: Force jQuery to load in header and exclude from Rocket Loader
function modify_jquery_loading() {
    wp_scripts()->add_data('jquery', 'data-cfasync', 'false');
    wp_scripts()->add_data('jquery-core', 'data-cfasync', 'false');
    wp_scripts()->add_data('jquery-migrate', 'data-cfasync', 'false');
}
add_action('wp_enqueue_scripts', 'modify_jquery_loading', 999);
