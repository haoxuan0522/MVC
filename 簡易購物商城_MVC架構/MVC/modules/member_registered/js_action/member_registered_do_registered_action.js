class member_registered_do_registered_action extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
    }
    prepareArgs(){
        this.addArgsById('registered_username');
        this.addArgsById('registered_password');
        this.addArgsById('registered_addr');
        this.addArgsById('registered_phone');
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