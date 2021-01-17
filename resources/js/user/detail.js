jQuery(document).ready(function(){
    jQuery.noConflict();
    /* 1. Visualizing things on Hover - See next part for action on click */
    jQuery('#stars li').on('mouseover', function(){
        var onStar = parseInt(jQuery(this).data('value'), 10); // The star currently mouse on
    
        // Now highlight all the stars that's not after the current hovered star
        jQuery(this).parent().children('li.star').each(function(e){
        if (e < onStar) {
            jQuery(this).addClass('hover');
        }
        else {
            jQuery(this).removeClass('hover');
        }
        });
        
    }).on('mouseout', function(){
        jQuery(this).parent().children('li.star').each(function(e){
        jQuery(this).removeClass('hover');
        });
    });
    

    /* 2. Action to perform on click */
    jQuery('#stars li').on('click', function(){
        var onStar = parseInt(jQuery(this).data('value'), 10); // The star currently selected
        var stars = jQuery(this).parent().children('li.star');
    
        for (i = 0; i < stars.length; i++) {
            jQuery(stars[i]).removeClass('selected');
        }
        
        for (i = 0; i < onStar; i++) {
            jQuery(stars[i]).addClass('selected');
        }
        
        let parameter = {
            rating: onStar,
            book_id: jQuery('#book_id_ip').val(),
            _token: jQuery('#ip_token').val(),
        }
        jQuery.ajax({
            method:'POST',
            url:'/book/rating',
            data: JSON.stringify(parameter),
            contentType: "application/json;charset=utf-8",
            dataType: "json",
            success: function success(res) {
              console.log(res);
            }
        })
    });
    
    
});