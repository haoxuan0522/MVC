class member_product_do_addcart_action extends ActionHandler{
    constructor(module, action, position_id, addcart_id, start_count, end_count){
        super(module, action);
        this.position_id = position_id;
        this.addcart_id = addcart_id;
        this.start_count = start_count;
        this.end_count = end_count;
    }
    prepareArgs(){
        this.addArgs('start_count', this.start_count);
        this.addArgs('end_count', this.end_count);
        this.addArgs('product_id', this.addcart_id);
        var addcart_count = document.getElementById(this.addcart_id).value;
        this.addArgs('product_count',addcart_count);
    }
    ajax_success(xhttp){
        var ResponseText = xhttp.responseText;
        if(ResponseText == 0){
            alert('購買數量填寫錯誤');
            (new member_product_show_product_page("member_product", "show_product_page", "show_area_2")).run();
        }
        else{
            document.getElementById(this.position_id).innerHTML = ResponseText;
        }
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}