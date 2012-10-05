<?php

/**
 * WordPress Monolog Wrapper
 * 
 * Usage: 
 * $logger = new Logger( ); 
 * $logger->info('We just got the logger');
 */
Class Logger {
    
    private $logger;
    
    function __construct( $args = array()) {
        
        $defaults = array(
            'name'  =>  'WordPress_Logger',
            'path'  =>  TEMPLATEPATH . '/log.txt',
            'level' =>  Monolog\Logger::DEBUG,
            );

        $args = wp_parse_args( $args, $defaults );
        extract( $args, EXTR_SKIP );
               
        $this->logger = new Monolog\Logger($name);
        $this->logger->pushHandler(new Monolog\Handler\StreamHandler( $path, $level ));  
                
        }

    // wrap function to all 8 Monolog logging levels 
    function notice     ( $message, array $context = array()) { $this->logger->notice( $message , $context );  }     
    function emerg      ( $message, array $context = array()) { $this->logger->emerg( $message , $context );  }     
    function debug      ( $message, array $context = array()) { $this->logger->debug( $message , $context );  }     
    function info       ( $message, array $context = array()) { $this->logger->info( $message , $context );  }
    function warn       ( $message, array $context = array()) { $this->logger->warn( $message , $context );  }
    function err        ( $message, array $context = array()) { $this->logger->err( $message , $context );  }
    function alert      ( $message, array $context = array()) { $this->logger->alert( $message , $context );  }
    function critical   ( $message, array $context = array()) { $this->logger->critical( $message , $context );  }    
    
}


