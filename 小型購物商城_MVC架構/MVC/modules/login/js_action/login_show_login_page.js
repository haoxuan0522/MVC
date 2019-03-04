class login_show_login_page extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
        this.php = false;
    }
    showResult(xhttp){
        var str=`
                <div id="show_area">
    				<div>
    					帳號:<input type="text" placeholder="請輸入帳號" id="username">
    				</div>
    				<br />
    				<div>
    					密碼:<input type="password" placeholder="請輸入密碼" id="password">
    				</div>
    				<br />
    				<div>
    				    <button onclick="(new login_do_login_action('login','do_login_action','show_area')).run()">
                            登入
                        </button>
                    </div>
                    <br />
                    <div>
                        <button onclick="(new member_registered_show_registered_page('member_registered','show_registered_page','show_area_2')).run()">
                            註冊會員
                        </button>
                    </div>
                    <br />
                    <div id="show_area_2"></div>
				</div>
        `;
        document.getElementById(this.position_id).innerHTML = str;
        this.loadModuleScript(this.module, 'do_login_action');
        this.loadModuleScript('member_registered', 'show_registered_page');
    }
}