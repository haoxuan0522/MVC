class member_registered_show_registered_page extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
        this.php = false;
    }
    showResult(xhttp){
        var str=`
				<div>
					帳號:<input type="text" placeholder="請輸入帳號" id="registered_username">
				</div>
				<br />
				<div>
					密碼:<input type="password" placeholder="請輸入密碼(至少8碼)" id="registered_password">
				</div>
				<br />
				<div>
					確認密碼:<input type="password" placeholder="再次輸入密碼(至少8碼)" id="registered_password_check">
				</div>
				<br />
				<div>
					地址:<input type="text" placeholder="請輸入地址" id="registered_addr">
				</div>
				<br />
				<div>
					聯絡電話:<input type="text" placeholder="請輸入連絡電話" id="registered_phone">
				</div>
				<br />
				<div>
                    <button onclick="(new member_registered_do_verification_action('member_registered','do_verification_action','show_area_2')).run()">
                        註冊
                    </button>
				</div>
        `;
        document.getElementById(this.position_id).innerHTML = str;
        this.loadModuleScript(this.module, 'do_verification_action');
        this.loadModuleScript(this.module, "do_registered_action");
    }
}