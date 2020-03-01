jQuery(document).ready(function () {
    //
    $.noConflict();
})
class Profile {
    constructor() {
        this.initEvents();
    }

    initEvents(){
        this.clickEvent();
    }

    clickEvent(){
        jQuery(document).on('click', '.followers-tab', this.followerTabClick)
        jQuery(document).on('click', '.followings-tab', this.followingTabClick)
        jQuery(document).on('click', '.likes-tab', this.likeTabClick)
        jQuery(document).on('click', '.button-follow', this.followButtonClick)
    }
    
    followerTabClick(){
        jQuery(this).addClass('active');
        jQuery('.list-followers').show();
        jQuery('.list-liked-book').hide();
        jQuery('.list-following').hide();
        jQuery('.followings-tab').removeClass('active');
        jQuery('.likes-tab').removeClass('active');
    }

    followingTabClick(){
        jQuery(this).addClass('active');
        jQuery('.list-followers').hide();
        jQuery('.list-following').show();
        jQuery('.list-liked-book').hide();
        jQuery('.followers-tab').removeClass('active');
        jQuery('.likes-tab').removeClass('active');
    }

    likeTabClick(){
        jQuery(this).addClass('active');
        jQuery('.list-followers').hide();
        jQuery('.list-following').hide();
        jQuery('.list-liked-book').show();
        jQuery('.followings-tab').removeClass('active');
        jQuery('.followers-tab').removeClass('active');
    }

    followButtonClick(){
        let parameter = {
            _token: jQuery('#ip_token').val(),
            following_id:jQuery('#input-us-id').val(),
        }
        if(jQuery('.button-follow span').hasClass('disappear')){
            jQuery.ajax({
                method:'POST',
                url:'/user/follow',
                data: JSON.stringify(parameter),
                contentType: "application/json;charset=utf-8",
                dataType: "json",
                success:function(res){
                    console.log(res)
                    jQuery('.button-follow span').removeClass('disappear')
                    jQuery('.button-follow span').addClass('appear')
                   
                }
            })
        }
        else{
            jQuery.ajax({
                method:'POST',
                url:'/user/unfollow',
                data:JSON.stringify(parameter),
                contentType: "application/json;charset=utf-8",
                dataType: "json",
                success:function(res){
                    console.log(res)
                    jQuery('.button-follow span').removeClass('appear')
                    jQuery('.button-follow span').addClass('disappear')
                }
            })
        }
        
    }
}
var profile = new Profile();