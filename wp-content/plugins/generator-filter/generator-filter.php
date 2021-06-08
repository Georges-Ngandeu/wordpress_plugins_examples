<?php
/*
  Plugin Name: Generator Filter
  Plugin URI: 
  Description: Modify the generator tag title using plugin filters
  Author: Georges Ngandeu
  Version: 1.0
  Author URI: https://github.com/Georges-Ngandeu/wordpress_plugins_examples
 */

add_filter( 'the_generator', 'generator_filter', 10, 2 );

function generator_filter ( $html, $type ) {
	if ($type == 'xhtml') {
		$html = preg_replace('("WordPress.*?")', '"Georges Ngandeu"', $html);
	}
    return $html;
}
