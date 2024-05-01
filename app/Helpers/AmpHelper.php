<?php 

namespace App\Helpers;


class AmpHelper
{
    public static function minify($value)
    {
        $content = file_get_contents($value);
        // Remove comments
        $content = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $content);
        // Remove spaces before and after selectors, braces, and colons
        $content = preg_replace('/\s*([{}|:;,])\s+/', '$1', $content);
        // Remove remaining spaces and line breaks
        $content = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    ', '!important'), '',$content);

        return $content;
    }

    public static function hash_ampscript( $script ) {
        $sha384 = hash( 'sha384', $script, true );
        if ( false === $sha384 ) {
            return null;
        }
        $hash = str_replace(
            [ '+', '/', '=' ],
            [ '-', '_', '.' ],
            base64_encode( $sha384 )
        );
        return 'sha384-' . $hash;
    }
}