<?php
/*
Plugin Name: GiveWP Rocket Loader Exclude
Description: Excludes GiveWP JavaScript files from Cloudflare's Rocket Loader
Version: 1.0
Author: brandon sheats
*/

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

function givewp_exclude_from_rocket_loader($attr) {
    // Check if the script handle contains 'give' or if the src contains 'give'
    if (isset($attr['id']) && 
        (strpos(strtolower($attr['id']), 'give') !== false || 
        (isset($attr['src']) && strpos(strtolower($attr['src']), 'give') !== false))) {
        
        // Add the data-cfasync attribute to exclude from Rocket Loader
        $attr['data-cfasync'] = 'false';
    }
    
    return $attr;
}

// Add filters for both inline scripts and regular scripts
add_filter('wp_script_attributes', 'givewp_exclude_from_rocket_loader');
add_filter('wp_inline_script_attributes', 'givewp_exclude_from_rocket_loader');
