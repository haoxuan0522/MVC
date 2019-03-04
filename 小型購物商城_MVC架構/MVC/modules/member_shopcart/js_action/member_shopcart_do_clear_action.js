class member_shopcart_do_clear_action extends ActionHandler{
    constructor(module, action, position_id, delete_id){
        super(module, action);
        this.position_id = position_id;
        this.delete_id = delete_id;
    }
    prepareArgs(){
        this.addArgs('delete_id', this.delete_id);
    }
    ajax_success(xhttp){
        (new member_shopcart_show_shopcart_page('member_shopcart','show_shopcart_page','show_area_2')).run();
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}