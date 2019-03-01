class member_shopcart_do_allclear_action extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
    }
    prepareArgs(){}
    ajax_success(xhttp){
        var ResponseText = xhttp.responseText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}