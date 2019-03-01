class member_information_show_information_page extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
    }
    prepareArgs(){}
    ajax_success(xhttp){
        var member = xhttp.responseText;
        var member_content = JSON.parse(member);
        var str = "會員帳號：" + member_content['username'] + "<br />";
        str += `
            會員密碼：<button onclick="(new member_information_show_password_page('member_information','show_password_page','show_area_2',` + member_content['oldpassword'] + `)).run()">修改密碼</button><br />
            地址：<input id=information_addr type=text value=` + member_content['addr'] + `><br />
            聯絡電話：<input id=information_phone type=text value=` + member_content['phone'] + `><br />
            <br />
            <div>
                <button onclick="(new member_information_do_verification_action('member_information','do_verification_action','show_area_2','information')).run()">修改</button>
            </div>
        `;
        document.getElementById(this.position_id).innerHTML = str;
        this.loadModuleScript(this.module, 'do_update_action');
        this.loadModuleScript(this.module, 'show_password_page');
        this.loadModuleScript(this.module, 'do_verification_action');
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}