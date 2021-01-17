jQuery(document).ready(function () {
    //
    $.noConflict();
})
class Base {
    constructor() {
        this.initEvents();
    }

    initEvents(){
        this.clickEvent();
    }

    clickEvent(){
        // jQuery('.fa-bell').click(function () { 
        //     jQuery('.list-notify').toggle();
        //  });
        jQuery(document).on('click', '.fa-trash-alt', this.showDialogDelete)
    }

    loadNotifyDetail(){
        // jQuery.ajax({
        //     method: 'GET',
        //     url: "/home/notify/detail",
        // }).done(function (res) {
        //     console.log(res)
        // }).fail(function(e){
        //     console.log(e)
        // })
    }
    showDialogDelete(){
        
    }
}
var home = new Home();