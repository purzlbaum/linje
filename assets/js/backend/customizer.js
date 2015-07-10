/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

  //Update site accent color in real time...
  wp.customize( 'body_background_color', function( value ) {
    value.bind( function( newval ) {
      $('body').css('background', newval );
    } );
  } );

  wp.customize( 'text_color', function( value ) {
    value.bind( function( newval ) {
      $('body').css('color', newval );
    } );
  } );

  wp.customize( 'content_background_color', function( value ) {
    value.bind( function( newval ) {
      $('article').css('background', newval );
      $('article a, article a:visited').css( {
        'text-shadow': '-1px -1px 0' + newval +', 1px -1px 0' + newval +', -1px 1px 0' + newval +', 1px 1px 0' + newval
      } );
    } );
  } );

  wp.customize( 'content_link_color', function( value ) {
    value.bind( function( newval ) {
      $('article a, article a:visited').css( {
        'background-image': 'linear-gradient(to top, transparent, transparent 2px, ' + newval + ' 2px, ' + newval + ' 3px, transparent 3px)',
        'color': newval
      } );
    } );
  } );

  wp.customize( 'content_link_color_hover', function( value ) {
    value.bind( function( newval ) {
      $('article a:focus, article a:hover').css( {
        'background-image': 'linear-gradient(to top, transparent, transparent 2px, ' + newval + ' 2px, ' + newval + ' 3px, transparent 3px)',
        'color': newval
      } );
    } );
  } );

} )( jQuery );