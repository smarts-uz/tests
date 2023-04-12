<?php
/*
 Plugin Name: Speed Up - Translation Cache
 Plugin URI: http://wordpress.org/plugins/speed-up-translation/
 Description: The translations reduces speed of Wordpress. This plugin offers a caching solution that reduces this effects on performance.
 Version: 1.0.17
 Author: Simone Nigro
 Author URI: https://profiles.wordpress.org/nigrosimone
 License: GPLv2 or later
 License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( !defined('ABSPATH') ) exit;


class SpeedUp_Translation {

    /**
     * Instance of the object.
     * 
     * @since  1.0.0
     * @static
     * @access public
     * @var null|object
     */
    public static $instance = null;
    
    /**
     * Number of mo files stored in cached.
     * 
     * @since  1.0.5
     * @var unknown
     */
    private $mo_cached_num = 0;
    
    
    /**
     * Total number of mo files.
     *
     * @since  1.0.5
     * @var unknown
     */
    private $mo_files_num = 0;

    /**
     * Access the single instance of this class.
     *
     * @since  1.0.0
     * @return SpeedUp_Translation
     */
    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor
     * 
     * @since  1.0.0
     * @return SpeedUp_Translation
     */
    private function __construct(){
        
        if( !is_admin() ){
            add_filter('override_load_textdomain', array($this, 'cache_textdomain' ), PHP_INT_MAX, 3);
            add_action('wp_footer',                array($this, 'print_stats' ), PHP_INT_MAX);
        }
    }
    
    /**
     * Print some cache statistics.
     * 
     * @since  1.0.5
     * @return void
     */
    function print_stats(){
        if( $this->mo_files_num > 0 ){
            echo '<!-- "Speed Up - Translation" has cached '. $this->mo_cached_num . ' of '. $this->mo_files_num .' translation files -->';
        }
    }
    
    /**
     * Cache the textdomain.
     * 
     * @since  1.0.0
     * @param  boolean $override
     * @param  string  $domain
     * @param  string  $mofile
     * @return boolean
     */
    public function cache_textdomain($override, $domain, $mofile) {
    
        global $l10n;
    
        // check if $mofile exisist and is readable
        if ( !is_readable($mofile) ){
            return false;
        }
        
        // increment mo files number
        $this->mo_files_num++;
        
        // Creates a unique key for cache
        $key = $domain.'_'.md5($mofile);
    
        // Try to retrive data from cache
        $data = get_transient($key, null);
    
        // Retrieve the last modified date of the translation files
        $mtime = filemtime($mofile);
    
        $mo = new \MO();
    
        // if cache not return data or data it's old
        if ( !$data || !isset($data['mtime']) || ($mtime > $data['mtime']) ) {
            
            // retrive data from MO file
            if ( $mo->import_from_file( $mofile ) ){
    
                $data = array(
                    'mtime'   => $mtime,
                    'entries' => $mo->entries,
                    'headers' => $mo->headers
                );
    
                // save data in cache
                set_transient($key, $data, DAY_IN_SECONDS);
    
            } else {
                return false;
            }
    
        } else {
            
            // increment total number of mo files.
            $this->mo_cached_num++;
            
            $mo->entries = $data['entries'];
            $mo->headers = $data['headers'];
        }
    
        if ( isset( $l10n[$domain] ) ) {
            $mo->merge_with( $l10n[$domain] );
        }
    
        $l10n[$domain] = &$mo;
    
        return true;
    }
}

// Init
SpeedUp_Translation::get_instance();