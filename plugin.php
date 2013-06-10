<?php

/*
Plugin Name: Forwarding Rules - Strip Index 
Plugin URI: http://www.kennisnet.nl
Description: Strips index.php (html, htm) from the request URI before using it to find forwarding rules. 
Version: 1.0
Author: Frank Matheron <frankmatheron@gmail.com>
Author URI: https://github.com/fenuz
*/

yourls_add_filter('fr_request_variants', 'fr_strip_index');

function fr_strip_index($variants) {
    foreach($variants as $v) {
        if (preg_match('/^(.*)\/index\.(php|html|htm)$/i', $v['requestUri'])) {
            $variants[] = array(
                'host' => $v['host'],
                'requestUri' => preg_replace('/^(.*)\/index\.(php|html|htm)$/i', '\1/', $v['requestUri'])
            );
        }
    }
    return $variants;
}

