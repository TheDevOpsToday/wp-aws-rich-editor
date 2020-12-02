<?php
/*
Plugin Name: WP AWS Rich editor fix
Plugin URI: https://thedevops.today/plugins/wp-aws-rich-editor-fix
Description: This plugin will fix the rich editor problem
Version: 1.0
Author: Salim Ali
Author URI: https://thedevops.today/author/salimali
*/

add_filter( 'user_can_richedit', function( $wp_rich_edit ) {
  if ( !$wp_rich_edit
    && ( get_user_option( 'rich_editing' ) == 'true' || !is_user_logged_in() )
    && isset( $_SERVER[ 'HTTP_USER_AGENT' ] )
    && stripos( $_SERVER[ 'HTTP_USER_AGENT' ], 'amazon cloudfront' ) !== false
  ) {
    return true;
  }

  return $wp_rich_edit;
} );