
!function( $ ) {
    
    var CTResponsiveParam = function ( parent, valueField, responsiveFields ) {    
        
        this.valueField = valueField;
        this.responsive = [];
        
        this.getHiddenValue( responsiveFields, valueField );
        this.addHandlers( responsiveFields );
        
        this.toggleSimplify( parent );
    };
    
    CTResponsiveParam.prototype.addResponsive = function ( index, val, property, unit ) {
        
        this.responsive[ index ] = {
            unit: unit,
            val: val,
            property: property,
            
            getVal: function () {
                this.val = this.val || 0;
                return this.property + ':' + parseInt( this.val ) + this.unit;
            }
        };
        
    };
    
    CTResponsiveParam.prototype.getHiddenValue = function ( responsiveFields, valueField ) {
        
        var mv = valueField.val() || null;
        
        mv = mv.substring( ( mv.indexOf( '{' ) + 1 ), ( mv.indexOf( '}' ) ) );
      
        if( typeof mv != 'undefined' && mv != null ) {
            
            var vals = mv.split( ';' );
            
            $.each( vals, function( i, vl ) {
               
                 if ( vl != "" ) {
                     
                    responsiveFields.each( function( index, elem ) {
                        
                        var valueField = $( elem ).find( '.ct-responsive-input' );
                       
                        var splitval = vl.split( ':' );
                        var dataid = valueField.attr( 'data-id' );
                                                
                        if( dataid == splitval[0] ) {                          
                            mval = splitval[1].match( /\d+/ );
                            valueField.val( mval );                          
                        }
                     
                   }); 
                } 
            });
             
        }     
    };
    
    CTResponsiveParam.prototype.toggleSimplify = function ( parent ) {
                
        var t = parent.find('.ct-responsive-wrapper');
                
        t.find('.simplify').attr('ct-toggle', 'collapse');
        t.find('.ct-responsive-item.optional').hide(); 
        
        parent.find('.ct-responsive-wrapper').find(".simplify").on('click', function(e) {
            
            var status = t.find('.simplify').attr('ct-toggle');
                   
            switch( status ) {

              case 'expand':    t.find('.simplify').attr('ct-toggle', 'collapse');
                                t.find('.ct-responsive-item.optional').hide();
                                break;
              case 'collapse':  t.find('.simplify').attr('ct-toggle', 'expand');
                                t.find('.ct-responsive-item.optional').show();
                                break;
              default:          t.find('.simplify').attr('ct-toggle', 'collapse');
                                t.find('.ct-responsive-item.optional').hide();
                                break;
            }        
        
        });
        
    };
    
    CTResponsiveParam.prototype.addHandlers = function ( responsiveFields ) {
        
        var self = this;
        responsiveFields.each( function( index ) {
            
            var $this = $( this );
            var $valueField = $this.find( '.ct-responsive-input' );            

            self.addResponsive( index, $valueField.val(), $valueField.attr( 'data-id' ), $valueField.attr( 'data-unit' ) );

            $valueField.on( 'blur', function () {                 
                self.responsive[ index ].val = $( this ).val();
                self.updateParamValue();
            });
            
        });
    };
    
    CTResponsiveParam.prototype.updateParamValue = function () {
        
        var val = [];
        
        this.responsive.forEach( function ( _val ) {
            val.push( _val.getVal() );
        });        
        
        val.push( 'property:' + this.valueField.attr( 'data-property' ) );
        
        $css_selector = '.' + this.valueField.attr( 'data-parent-class' ) + '_' + Date.now() + ' ' + this.valueField.attr( 'data-selector' );
        
        this.valueField.val( $css_selector + '{' + val.join( ';' ) + '}' );
        
    };
    
    $( '.wpb_el_type_kraft_responsive' ).each( function () {
        
        var $this = $(this);

        var valueField = $this.find( '.wpb_vc_param_value' );
        var responsiveFields = $this.find( '.ct-responsive-item' );

        new CTResponsiveParam( $this, valueField, responsiveFields );
        
    });   
    
   
}( window.jQuery );
