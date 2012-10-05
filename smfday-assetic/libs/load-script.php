<?php

/**
 * default function to load script in wordpress way
 */
function load_script() {
    
    wp_enqueue_script('jquery');	

    wp_enqueue_script("fancy",
              get_template_directory_uri() .  '/js/fancy.js','','',true );

     wp_enqueue_script("wp-seo-admin",
              get_template_directory_uri() .  '/js/wp-seo-admin.js','','',true );

     wp_enqueue_script("wp-seo-metabox",
              get_template_directory_uri() .  '/js/wp-seo-metabox.js','','',true );
     
     wp_enqueue_script("core",
              get_template_directory_uri() .  '/js/core.js','','',true );
    
     wp_enqueue_script("main",
              get_template_directory_uri() .  '/js/main.js','','',true );

     wp_enqueue_script("file_a",
              get_template_directory_uri() .  '/js/core.js','','',true );
     
     
     
}
        
        
        
    



