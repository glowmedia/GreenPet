<?php

namespace App;

/**
 * Class App
 * Bootstrap the app side of the theme.
 * @package App
 */
class App
{
    public function init()
    {

        $this->autoload(); 
        //add_action( 'after_setup_theme', array( $this, 'woo' ) );

        
    }

    private function autoload()
    {

        include_once $this->core_path() . 'config/ThemeConfig.php';
        //include_once $this->core_path() . 'config/test.php';

       
            array_map(function ($file) {
                include_once $file;
            }, $this->build_autoload_array(ThemeConfig::autoload_stack));
        
       
/*
        foreach (glob(get_stylesheet_directory() .'/core/helpers/*.php') as $helper)
        {
            include $helper;
        }
        */
        
    }

    /**
     * @return string
     */
    private function core_path()
    {
        return get_template_directory() . ThemeConfig::core_path;
    }

    /**
     * @param $stack
     *
     * @return array
     */
    private function build_autoload_array($stack)
    {
        $files = [];

        foreach ($stack as $dir) {
            $paths = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator(
                    $this->core_path() . $dir, \RecursiveDirectoryIterator::SKIP_DOTS
                )
            );

            foreach ($paths as $path => $object)
                $files[] .= $path;

                
        }

        return $files;
    }

    /*public function woo() {

        add_theme_support(
            'woocommerce'
            
        );

        //return;
    }*/


   
}