class member_information_do_password_action extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
    }
    prepareArgs(){
        this.addArgsById('newpassword');
    }
    ajax_success(xhttp){
        var str = xhttp.responseText;
        document.getElementById(this.position_id).innerHTML = str;
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}