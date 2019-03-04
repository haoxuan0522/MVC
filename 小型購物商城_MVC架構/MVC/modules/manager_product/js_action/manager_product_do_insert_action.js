class manager_product_do_insert_action extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
    }
    prepareArgs(){
        this.addArgsById('product_name');
        this.addArgsById('product_stock');
        this.addArgsById('product_price');
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