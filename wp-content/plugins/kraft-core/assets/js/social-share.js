( function ( $ ) {   
    
        // USE STRICT
	"use strict";
        
        var socialShareLinks = $( '.socials-share-links a, .portfolio-social-share-links a' );        

        var socialShareWidget = {
            
            socialShareDialog: function( network, shareurl ) {

                    var social_networks = {
                                                'facebook-f'    : 'http://www.facebook.com/sharer.php?u=',
                                                'twitter'       : 'https://twitter.com/share?url=',
                                                'x-twitter'     : 'https://twitter.com/share?url=',
                                                'google-plus-g' : 'https://plus.google.com/share?url=',
                                                'linkedin-in'   : 'http://www.linkedin.com/shareArticle?mini=true&amp;url=',
                                                'xing'          : 'https://www.xing.com/spi/shares/new?url=',
                                                'pinterest-p'   : 'http://pinterest.com/pin/create/link/?url='
                                           }

                    var width  = 575,
                                 height = 520,
                                 left   = ( $( window ).width()  - width )  / 2,
                                 top    = ( $( window ).height() - height ) / 2,
                                 opts   = 'status=1' +
                                           ',width='  + width  +
                                           ',height=' + height +
                                           ',top='    + top    +
                                           ',left='   + left;

                    var url = social_networks[ network ] + shareurl;                    

                    var newwindow = window.open( url , '', opts );

                    if ( window.focus ) {
                        newwindow.focus();
                    }
            },
            
            init: function() {
                
                if( socialShareLinks.length > 0 ) {

                    socialShareLinks.on( 'click', function() {

                        var network = $(this).data( 'network' );
                        var shareurl = $(this).data( 'shareurl' );

                        socialShareWidget.socialShareDialog( network, shareurl );

                        return false;
                    });
                }                
                
            }
        };
               
        socialShareWidget.init();    
    
})( jQuery );