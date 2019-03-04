class member_shopcart_do_addorder_action extends ActionHandler{
    constructor(module, action, position_id, end_count, all_price){
        super(module, action);
        this.position_id = position_id;
        this.end_count = end_count;
        this.all_price = all_price;
    }
    prepareArgs(){
        this.addArgs('end_count',this.end_count);
        this.addArgs('all_price',this.all_price);
    }
    ajax_success(xhttp){
        var ResponseText = xhttp.responseText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}