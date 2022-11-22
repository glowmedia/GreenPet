<?php
namespace App;

/**
 * Class ThemeConfig
 * @package App
 */
class ThemeConfig
{
    
    /**
     * Core path.
     * Let the theme know where it can find it's components relative to App.php.
     */
    const core_path = '/core/';

    /**
     * Autoload Stack.
     * Must be present for the theme to boot. Supply in preferential boot order, typically
     * 'services -> classes -> helpers -> models -> presenters' to ensure data dependencies are available before calling views.
     * Core classes are loaded via Composer's PSR4 autoloader. Miscellaneous classes are picked up here.
     */
    const autoload_stack = [
        'classes',
        'helpers',
        'models',
        'presenters',
    ];

    

    /*
     * Date format
     * */
    const theme_date_format = 'j F Y';
    const data_date_format = 'Y/m/d';

    /*
     * Time format
     * */
    const theme_time_format = 'H:i';

    /**
     * Date parameter to determine the time frame of update to show.
     */
    const service_update_offset = '-1 week';
    const service_update_all_okay = 'All systems are currently fully operational.';

    /**
     * Breadcrumbs options.
     */
    const breadcrumbs = [
        'separator' => '<i class="fa fa-caret-right" aria-hidden="true"></i>',
        'home' => 'Home',
        '404' => 'Page not found',
    ];

    /**
     * New flag expiry
     */
    const new_flag_expiry = [
        'interval' => '- 1 month',
    ];

    /**
     * Currency options.
     */
    const currency = [
        'text' => 'GBP',
        'symbol' => '£',
    ];

    

}