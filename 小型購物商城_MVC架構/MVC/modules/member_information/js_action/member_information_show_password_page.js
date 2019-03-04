class member_information_show_password_page extends ActionHandler{
    constructor(module, action, position_id, oldpassword){
        super(module, action);
        this.position_id = position_id;
        this.php = false;
        this.oldpassword = oldpassword;
    }
    prepareArgs(){}
    showResult(xhttp){
        var str = `
                <input type="hidden" id="oldpassword" value=` + this.oldpassword + `>
                <div>
					原密碼:<input type="text" placeholder="請輸入原密碼" id="password">
				</div>
				<br />
				<div>
					新密碼:<input type="text" placeholder="請輸入新密碼(至少8碼)" id="newpassword">
				</div>
				<br />
				<div>
					確認新密碼:<input type="text" placeholder="再次輸入新密碼(至少8碼)" id="newpassword_check">
				</div>
				<br />
				<div>
                    <button onclick="(new member_information_do_verification_action('member_information','do_verification_action','show_area_2','password')).run()">修改</button>
                </div>
        `;
        document.getElementById(this.position_id).innerHTML = str;
        this.loadModuleScript(this.module, 'do_password_action');
    }
}