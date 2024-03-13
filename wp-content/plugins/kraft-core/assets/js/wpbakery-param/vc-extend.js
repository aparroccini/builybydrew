(function($) {
    
    // USE STRICT
    "use strict";
    
    $('.preview-image-hide').hide();
    $('.preview-image-show').show();
    $('.kraft-preview-image-main').parent().parent().find('.wpb_element_label').hide();
    
    $('.heading_style,.featured_box_style,.fancy_box_style,.team_style,.testimonial_style,.content_slider_style,.form_style,.modal_style,.grid_post_style,.carousel_post_style').on('change keyup', function(e) {
        
        $(this).parent().parent().parent().find('.kraft_preview_image_select option').removeAttr("selected");
        $(this).parent().parent().parent().find('.preview-image-hide').hide();

        var current_selected = $(this).val();

        if(current_selected){          
          $(this).parent().parent().parent().find('.kraft-preview-image-main .'+current_selected).show();
          $(this).parent().parent().parent().find('.kraft_preview_image_select option[class="'+current_selected+'"]').attr('selected', 'selected');
        }
      
    });
    
    
})( jQuery );