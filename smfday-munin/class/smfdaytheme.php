<?php

/**
 * Smf Day Theme Class 
 */
Class SmfDayTheme {

    private $log;
    
    function __construct( ) {
                
        // add hook 
        add_filter("query", array( $this , "QueryLog")  );
    }
    
    /**
     * callback funcion to log query
     */
    function QueryLog( $query ) {
                
        $args = array(
            'name'  => 'Query_Log',
            'path'  => TEMPLATEPATH . '/logs/query.log',
            'level' =>  200, // info
            );

        // check instance
        if (is_null($this->log)) {
            $this->log = new Logger( $args );
            }

        // log all "select" query run by fontend
        if ( !is_admin() && preg_match( '/^\s*(select) /i', $query ) ) {

            $this->log->info( $query );
            }
        }
    
} // end class