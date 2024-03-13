/* global jQuery, document */

/** Add any Javascript for your extension here.  Use of this file is optional and is only for those
 * who wish to output the file CSS using a SASS compiler.
 *
 * Please be sure to rename the 'my-extension' part of the file name to the name of your extension. Pleas use
 * dashes instead of underscores.
 */

(function( $ ) {

	'use strict';

    redux.field_objects = redux.field_objects || {};
    redux.field_objects.typography_font_style = redux.field_objects.typography_font_style || {};

    redux.field_objects.typography_font_style.init = function( selector ) {                

        selector = $.redux.getSelector( selector, 'typography_font_style' );        

        $( selector ).each(              
            function() {
                
                const el = $( this ); 
                const fontStylesEl = el.find( 'ul.redux-font-styles' );
                                                   
                if ( el.hasClass( 'redux-field-init' ) ) {
                    el.removeClass( 'redux-field-init' );                    
                } else {                      
                    return;
                }
             
                fontStylesEl.find( '.checkbox' ).on(
                    'click', function( e ) {

                        let val = 0;

                        if ( $( this ).is( ':checked' ) ) {                        
                            val = $( this ).parent().find( '.checkbox-check' ).attr( 'data-val' );
                        }
                        
                        $( this ).parent().find( '.checkbox-check' ).val( val );                        
                        redux_change( $( this ) );
                    }
                );
            }
        );
        
    };    


})( jQuery );