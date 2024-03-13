
(function( $ ) {

	'use strict';

	const init = function() {

		let isBodySelecting = false;
		let isHeadingSelecting = false;

		const bodyFontFamily    = $( '#kraft_theme_settings-body-font .redux-typography-family.select2-container' );
		const headingFontFamily = $( '#kraft_theme_settings-heading-font .redux-typography-family.select2-container' );


		bodyFontFamily.on( 'change', function( val ) {

			let getVals;
			let fontName;
		
			const fontFamilyEl = $( this );	

        	if ( fontFamilyEl.val() ) {
			
            	getVals = fontFamilyEl.select2( 'data' );

				if ( getVals ) {
					fontName = getVals[0].text;
				} else {
					fontName = null;
				}

				if( isBodySelecting ) {
					
					setTimeout(() => {
						changeFontStyles( fontFamilyEl, 'body-font-style', fontName );
						onChangeBodyFontFamily( fontName );
					}, 200 );

				}

				isBodySelecting = true;
				
			}

		});

		headingFontFamily.on( 'change', function( val ) {

			let getVals;
			let fontName;
			
        	const fontFamilyEl = $( this );	

        	if ( fontFamilyEl.val() ) {
			
            	getVals = fontFamilyEl.select2( 'data' );

				if ( getVals ) {
					fontName = getVals[0].text;
				} else {
					fontName = null;
				}

				if( isHeadingSelecting ) {				

					setTimeout(() => {
						changeFontStyles( fontFamilyEl, 'heading-font-style', fontName );
						onChangeHeadingFontFamily( fontName );	
					}, 200 );
					
				}

				isHeadingSelecting = true;			

			}

		});		

	}

	const onChangeBodyFontFamily = function( fontName ) {

		const headingFontFamilyP = $( '#kraft_theme_settings-p-font .redux-typography-family.select2-container' );
		const headingFontFamilyPortfolioMetaButton = $( '#kraft_theme_settings-portfolio-meta-button .redux-typography-family.select2-container' );
		const headingFontFamilyBlogPostButton = $( '#kraft_theme_settings-blog-post-button .redux-typography-family.select2-container' );
		const headingFontFamilyGeneralButton = $( '#kraft_theme_settings-general-button .redux-typography-family.select2-container' );

		headingFontFamilyP.val( fontName );
		headingFontFamilyP.trigger( 'change' );

		headingFontFamilyPortfolioMetaButton.val( fontName );
		headingFontFamilyPortfolioMetaButton.trigger( 'change' );

		headingFontFamilyBlogPostButton.val( fontName );
		headingFontFamilyBlogPostButton.trigger( 'change' );

		headingFontFamilyGeneralButton.val( fontName );
		headingFontFamilyGeneralButton.trigger( 'change' );		

	}

	const onChangeHeadingFontFamily = function( fontName ) {

		const headingFontFamilyH1 = $( '#kraft_theme_settings-h1-font .redux-typography-family.select2-container' );
		const headingFontFamilyH2 = $( '#kraft_theme_settings-h2-font .redux-typography-family.select2-container' );
		const headingFontFamilyH3 = $( '#kraft_theme_settings-h3-font .redux-typography-family.select2-container' );
		const headingFontFamilyH4 = $( '#kraft_theme_settings-h4-font .redux-typography-family.select2-container' );
		const headingFontFamilyH5 = $( '#kraft_theme_settings-h5-font .redux-typography-family.select2-container' );
		const headingFontFamilyH6 = $( '#kraft_theme_settings-h6-font .redux-typography-family.select2-container' );

		const headingFontFamilyPortfolioPrimaryTitle = $( '#kraft_theme_settings-portfolio-primary-title .redux-typography-family.select2-container' );
		const headingFontFamilyPortfolioSecondaryTitle = $( '#kraft_theme_settings-portfolio-secondary-title .redux-typography-family.select2-container' );
		const headingFontFamilyBlogBannerTitle = $( '#kraft_theme_settings-blog-banner-title .redux-typography-family.select2-container' );
		const headingFontFamilyBlogPostTitle = $( '#kraft_theme_settings-blog-post-title .redux-typography-family.select2-container' );
		const headingFontFamilyBlogCommentTitle = $( '#kraft_theme_settings-blog-comment-title .redux-typography-family.select2-container' );
		const headingFontFamilyBlogWidgetTitle = $( '#kraft_theme_settings-blog-widget-title .redux-typography-family.select2-container' );


		headingFontFamilyH1.val( fontName );
		headingFontFamilyH1.trigger( 'change' );

		headingFontFamilyH2.val( fontName );
		headingFontFamilyH2.trigger( 'change' );

		headingFontFamilyH3.val( fontName );
		headingFontFamilyH3.trigger( 'change' );

		headingFontFamilyH4.val( fontName );
		headingFontFamilyH4.trigger( 'change' );

		headingFontFamilyH5.val( fontName );
		headingFontFamilyH5.trigger( 'change' );

		headingFontFamilyH6.val( fontName );
		headingFontFamilyH6.trigger( 'change' );

		headingFontFamilyPortfolioPrimaryTitle.val( fontName );
		headingFontFamilyPortfolioPrimaryTitle.trigger( 'change' );

		headingFontFamilyPortfolioSecondaryTitle.val( fontName );
		headingFontFamilyPortfolioSecondaryTitle.trigger( 'change' );

		headingFontFamilyBlogBannerTitle.val( fontName );
		headingFontFamilyBlogBannerTitle.trigger( 'change' );

		headingFontFamilyBlogPostTitle.val( fontName );
		headingFontFamilyBlogPostTitle.trigger( 'change' );

		headingFontFamilyBlogCommentTitle.val( fontName );
		headingFontFamilyBlogCommentTitle.trigger( 'change' );

		headingFontFamilyBlogWidgetTitle.val( fontName );
		headingFontFamilyBlogWidgetTitle.trigger( 'change' );

	}   

	const changeFontStyles = function( fontFamilyEl, fontStylesElId, fontName ) {	

	   const isGoogleFont = redux.field_objects.typography.makeBool( fontFamilyEl.parent().parent().find( '.redux-typography-google-font' ).val() );	   

	   const defaultFontWeights = [
                                    { 'id' : '400', 'name' : 'Normal 400' },
                                    { 'id' : '700', 'name' : 'Bold 700' },
                                    { 'id' : '400italic', 'name' : 'Normal 400 Italic' },
                                    { 'id' : '700italic', 'name' : 'Bold 700 Italic' }
	   							];

		let details  = '';
		let html = '';

		const fontStylesEl = $( '#kraft_theme_settings-' + fontStylesElId + ' ul.redux-font-styles' );		

	   	// Something went wrong trying to read google fonts, so turn google off.
		if ( undefined === redux.fonts.google ) {
			isGoogleFont = false;
		}		 

		// Get font details.
		if ( true === isGoogleFont && ( fontName in redux.fonts.google ) ) {		
			details = redux.fonts.google[fontName];
			details = details.variants;
		} else {
			if ( undefined !== redux.fonts.typekit && ( fontName in redux.fonts.typekit ) ) {
				typekit = true;
				details = redux.fonts.typekit[fontName];
				details = details.variants;
			} else {
				details = defaultFontWeights;
			}
		}

		fontStylesEl.slideUp( "slow" ).html( '' );		

		$.each(
            details, function( index, variant ) {

				const checked = ' checked="checked"';

				html +=  '<li>';
				html += '<label for="kraft_theme_settings-' + fontStylesElId + variant.id +'">';

				html += '<input type="hidden" class="checkbox-check" data-val="1" name="kraft_theme_settings[' + fontStylesElId + ']['+ variant.id +']" value="1" ' + '/>';
				html +=  '<input type="checkbox" class="checkbox" id="kraft_theme_settings[' + fontStylesElId + ']['+ variant.id +']" value="1" ' + checked + ' />';
				html +=  ' ' + variant.name.replace(/\+/g, " ") + '</label>';
				html +=  '</li>';                        

        	}
        );        
		 
		fontStylesEl.append( html ).slideDown( "slow", function() {

			fontStylesEl.find( '.checkbox' ).on( 'click', function( e ) {
                        
				let val = 0;

				if ( $( this ).is( ':checked' ) ) {                        
					val = $( this ).parent().find( '.checkbox-check' ).attr( 'data-val' );
				}
							
				$( this ).parent().find( '.checkbox-check' ).val( val );                        
				redux_change( $( this ) );

			});


		});			

	}

	init();

})( jQuery );