<?php 
/**
*
* @package ticketsplugin
*/

namespace Inc\Base;

class Deactivate {
    static function deactivate() {
        flush_rewrite_rules();
    }
}