<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Application Logo
    |--------------------------------------------------------------------------
    |
    | This value is the path to the logo of your application INSIDE your
    | public folder. If your logo is in LARAVEL-APP/public/logo.png,
    | please change it to logo.png.
    |
    */

    'logo' => NULL,
    
    /*
    |--------------------------------------------------------------------------
    | Automatic currency conversion for different geo locations
    |--------------------------------------------------------------------------
    |
    | This config changes whether the billing panel should show
    | different currency for different geo location. The process
    | is automatic and is dependent on whether the theme maker
    | implemented it.
    */

    'auto_currency_conversion' => true,
    
    /*
    |--------------------------------------------------------------------------
    | Dark mode
    |--------------------------------------------------------------------------
    |
    | This toggles dark mode for ONLY the default theme that came with
    | this app (HorizonTheme). However, the theme maker of third-party
    | themes may have implemented it.
    | 
    */

    'dark_mode' => false,
    
    /*
    |--------------------------------------------------------------------------
    | Pagination Length
    |--------------------------------------------------------------------------
    |
    | This is the amount of rows to display in a table.
    | This config applies to the entire app.
    | 
    | 
    */

    'pagination_length' => 10,
];