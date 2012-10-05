<?php


function run_assetic() {

    global $wp_scripts;
     
    
    $AssetCollection = array();
    foreach ( $wp_scripts->in_footer  as $script_name) {
        
        if ( $script_name != "admin-bar") {
        $registered = $wp_scripts->registered;
        $AssetCollection[] =  new Assetic\Asset\FileAsset(    $registered[$script_name]->src );
        
        //echo "<li>" . $registered[$script_name]->src;
        
        wp_dequeue_script( $script_name );
        }
    }    
    
    
    $yui =  TEMPLATEPATH .'/cache/yuicompressor.jar';
    
    $js = new Assetic\Asset\AssetCollection($AssetCollection,  array(
                new Assetic\Filter\GoogleClosure\CompilerApiFilter(),
                //new Assetic\Filter\Yui\JsCompressorFilter( $yui , "java"),
                ));
    
    
    
    $assetic_js = TEMPLATEPATH . '/cache/assetic.js';
    $assetic_cachetime = 3600;
    $assetic_created = ((@file_exists($assetic_js))  ) ? @filemtime($assetic_js) : 0;

    if ( ( $assetic_created - ( time() - $assetic_cachetime)) < 0 ) {
        file_put_contents( $assetic_js , $js->dump());
        
        
        };
 
        
    wp_enqueue_script("assetic" , 
                get_template_directory_uri() . '/cache/assetic.js','','',true );        
        
        
}

