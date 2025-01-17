<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cookie you wish to remove if the user don't allow them
    |--------------------------------------------------------------------------
    |
    | If you know the cookies name you wish to remove please add in here
    | The variable test mode to true it will show all the cookie inf you browser
    |
    */

    'cookie_functional' => [],
    // Example
    'cookie_statistics' => [
        '_ga', '_gid', '_gat_gtag_UA_152696431_2',
    ],
    'cookie_marketing' => [],

    /*
    |--------------------------------------------------------------------------
    | Script, iframe id to disable
    |--------------------------------------------------------------------------
    |
    | In here you can target scripts an disable or enable them
    | example
    | <script> data-src="google.com" id="script_cookie_functional" </script>
    | on cookie enable will enable that script to
    |
    */

    'script_cookie_functional' => 'script_cookie_functional',
    'script_cookie_statistics'  => 'script_cookie_statistics',
    'script_cookie_marketing'  => 'script_cookie_marketing',

    /*
    |--------------------------------------------------------------------------
    | Debug mode
    |--------------------------------------------------------------------------
    |
    |
    |
    |
    |
    */
    'biscotto_debug' => 'false',

    /*
    |--------------------------------------------------------------------------
    | Cookie popup message
    |--------------------------------------------------------------------------
    |
    | In here you can add you message and the link to cookie policy page
    |
    |
    |
    */
    'biscotto_link'    => 'google.com',            // Yor Cookie policy link

    /*
    |--------------------------------------------------------------------------
    | Cookie popup opacity
    |--------------------------------------------------------------------------
    |
    | Control the opacity of the button
    |
    |
    |
    */
    'biscotto_opacity' => '0.5',    // Your cookie button opacity
    'button_colour'    => '#000',   // The cookie policy button default color
];
