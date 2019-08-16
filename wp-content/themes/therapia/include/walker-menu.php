<?php

/**
 * Class Name: wp_materialize_navwalker
 * GitHub URI: #
 * Description: A custom WordPress nav walker class to "fully" implement the Materialize CSS nested navigation style in a custom theme using the WordPress manager
 * Version: 1.0.0
 * Author: Kailo - https://kailo.io
 * Updated: Nov. 2, 2017 by Mackenzie Fritschle as a shoddy compatibility for multiple walkers
 * License: MIT
 * License URI: #
 */


class mainMenuWalker extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = array()) {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat($t, $depth);
        $output .= "{$n}{$indent}<span class=\"dropper-nav\"><i class=\"fa fa-angle-down\" aria-hidden=\"true\"></i></span>
        <ul class=\"dropdown-content\">{$n}";
    }
}