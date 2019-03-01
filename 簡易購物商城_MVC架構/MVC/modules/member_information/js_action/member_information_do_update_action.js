class member_information_do_update_action extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
    }
    prepareArgs(){
        this.addArgsById('information_addr');
        this.addArgsById('information_phone');
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