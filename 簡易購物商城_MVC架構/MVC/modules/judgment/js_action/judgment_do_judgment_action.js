class judgment_do_judgment_action extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
        this.loadModuleScript('login', 'do_login_action');
        this.loadModuleScript('login', 'show_login_page');
    }
    prepareArgs(){}
    ajax_success(xhttp){
        var judgment = xhttp.responseText;
        var judgment_content = JSON.parse(judgment);
        if(judgment_content['judgment'] == 1){
            var str = `
                    <input type=hidden id=username value=` + judgment_content['username'] + `>
                    <input type=hidden id=password value=` + judgment_content['password'] + `>
                `;
            document.getElementById(this.position_id).innerHTML = str;
            (new login_do_login_action('login','do_login_action','content')).run();
        }
        else{
            (new login_show_login_page('login','show_login_page','content')).run();
        }
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}