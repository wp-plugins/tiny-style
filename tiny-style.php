<?php
/*
Plugin Name: Tiny Style
Plugin URI: http://windyroad.org/software/wordpress/tiny-style
Description: Add HTML style controls in the TinyMCE Rich Visual Editor
Version: 0.0.1
Author: Windy Road
Author URI: http://windyroad.org

Copyright (C)2007 Windy Road

This plugin uses code from Moxiecode Systems (http://tinymce.moxiecode.com/ )

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.This work is licensed under a Creative Commons Attribution 2.5 Australia License http://creativecommons.org/licenses/by/2.5/au/

*/ 

$_BENICE[]='tiny-style;6770968883708243;0901874953';

function tiny_style() {
	global $editing;
	if ( $editing ) {
		if ( user_can_richedit() ) {
			wp_enqueue_script('tiny-style', '/wp-content/plugins/tiny-style/tiny-style.js', 'wp_tiny_mce', '0.0.0');
			// maybe I'm doing something wrong, but the TinyMCE compressor seems to have some problems with external plugins 
			global $wp_scripts;
			$wp_scripts->scripts['tiny_mce']->src = '/wp-includes/js/tinymce/tiny_mce.js';
		}
	}
}

function tiny_style_add_buttons( $buttons ) {
	array_push($buttons, 'styleprops');
	return $buttons;
}

function tiny_style_add_plugin( $plugins ) {
	array_push($plugins, 'style');
	return $plugins;
}

add_action('wp_print_scripts', 'tiny_style' );

add_filter('mce_buttons', 'tiny_style_add_buttons' );
add_filter('mce_plugins', 'tiny_style_add_plugin' );

?>