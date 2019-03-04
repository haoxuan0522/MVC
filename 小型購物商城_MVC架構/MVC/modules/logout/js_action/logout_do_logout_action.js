class logout_do_logout_action extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
    }
    prepareArgs(){}
    ajax_success(xhttp){
        alert('登出成功');
        var str = `<iframe onload="(new login_show_login_page('login','show_login_page','content')).run()"></iframe>`;
        document.getElementById(this.position_id).innerHTML = str;
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}