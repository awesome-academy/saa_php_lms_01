jQuery(document).ready(function () {
    //
    $.noConflict();
})
class Home {
    constructor() {
        this.initEvents();
    }

    initEvents(){
        this.clickEvent();
    }

    clickEvent(){
        jQuery(document).on('click', '#user-name-home', this.showSettingForm)
        jQuery(document).on('click', '.like-button', this.likeBook)
        jQuery(document).on('click', '.unlike-button', this.disLike)
    }
    
    showSettingForm(){
        jQuery('.setting-user').toggle();
    }

    likeBook(){
     
        if(!jQuery('.like-button').hasClass('liked')){
            let parameter = {
                _token: jQuery('#ip_token').val(),
                book_id: jQuery(this).attr('data-key'),
                emotion: 'LIKE' 
            }

            jQuery.ajax({
                method:'POST',
                url:'/book/react',
                data: JSON.stringify(parameter),
                contentType: "application/json;charset=utf-8",
                dataType: "json",
                success:function(res){
                    console.log(res)
                    if(jQuery('.unlike-button').hasClass('liked')){
                        jQuery('.like-button').addClass('liked');
                        jQuery('.unlike-button').removeClass('liked');
                        jQuery('#total-like').text(parseInt(jQuery('#total-like').text())+1);
                        jQuery('#total-dislike').text(parseInt(jQuery('#total-dislike').text())-1);
                    }
                    else{
                        jQuery('.like-button').addClass('liked');
                        jQuery('.unlike-button').removeClass('liked');
                        jQuery('#total-like').text(parseInt(jQuery('#total-like').text())+1);
                    }
                   
                }
            })
        }
        else{
            let parameter2 = {
                _token: jQuery('#ip_token').val(),
                book_id: jQuery(this).attr('data-key'),
            }
            jQuery(home.removeReaction(parameter2));
            if(parseInt(jQuery('#total-like').text())>0){
                jQuery('#total-like').text(parseInt(jQuery('#total-like').text())-1);
            }
            jQuery(this).removeClass('liked');
            
        }
   
    }

    disLike(){
        if(!jQuery('.unlike-button').hasClass('liked')){

            let parameter = {
                _token: jQuery('#ip_token').val(),
                book_id: jQuery(this).attr('data-key'),
                emotion: 'DISLIKE' 
            }

            jQuery.ajax({
                method:'POST',
                url:'/book/react',
                data: JSON.stringify(parameter),
                contentType: "application/json;charset=utf-8",
                dataType: "json",
                success:function(res){
                    if(jQuery('.like-button').hasClass('liked')){
                        jQuery('.unlike-button').addClass('liked');
                        jQuery('.like-button').removeClass('liked');
                        jQuery('#total-dislike').text(parseInt(jQuery('#total-dislike').text())+1);
                        jQuery('#total-like').text(parseInt(jQuery('#total-like').text()-1))
                    }
                    else{
                        jQuery('.unlike-button').addClass('liked');
                        jQuery('.like-button').removeClass('liked');
                        jQuery('#total-dislike').text(parseInt(jQuery('#total-dislike').text())+1);
                    }
                    
                }
            })
        }
        else{
            let parameter2 = {
                _token: jQuery('#ip_token').val(),
                book_id: jQuery(this).attr('data-key'),
            }
            jQuery(home.removeReaction(parameter2));
            if(parseInt(jQuery('#total-dislike').text())>0){
                jQuery('#total-dislike').text(parseInt(jQuery('#total-dislike').text())-1);
            }
            jQuery(this).removeClass('liked');
        }
    }

    removeReaction(param){
        jQuery.ajax({
            method:'POST',
            url:'/book/react/remove' ,
            data: JSON.stringify(param),
            contentType: "application/json;charset=utf-8",
            dataType: "json",
            success:function(res){
                console.log(res);
            }
        })
    }

}
var home = new Home();