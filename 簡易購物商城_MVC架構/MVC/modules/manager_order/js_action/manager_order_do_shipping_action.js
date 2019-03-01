class manager_order_do_shipping_action extends ActionHandler{
    constructor(module, action, position_id, order_id){
        super(module, action);
        this.position_id = position_id;
        this.order_id = order_id;
        var shipping = confirm('確認出貨？');
        if(shipping == false){
            this.php = false;
        }
    }
    showResult(xhttp){
        (new manager_order_show_order_page('manager_order','show_order_page','show_area_2')).run();
    }
    prepareArgs(){
        this.addArgs('order_id' , this.order_id);
    }
    ajax_success(xhttp){
        (new manager_order_show_order_page('manager_order','show_order_page','show_area_2')).run();
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}