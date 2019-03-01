class login_do_login_action extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
    }
    prepareArgs(){
        this.addArgsById('username');
        this.addArgsById('password');
    }
    ajax_success(xhttp){
        var login = xhttp.responseText;
        var login_content = JSON.parse(login);
        if(login_content['permissions_check'] == 1){
            var str =`
                <div>Username：` + login_content['username'] + `  ` + `<button onclick="(new logout_do_logout_action('logout','do_logout_action','content')).run()">登出</button></div><br />
                <div>
        			<button onclick="(new manager_product_show_product_page('manager_product','show_product_page','show_area_2')).run()">
                        商品管理
                    </button>
                    <button onclick="(new manager_order_show_order_page('manager_order','show_order_page','show_area_2')).run()">
                        訂單管理
                    </button>
                </div>
                <br />
                <div id="show_area_2"></div>
            `;
            document.getElementById(this.position_id).innerHTML = str;
            this.loadModuleScript("manager_product", "show_product_page");
            this.loadModuleScript("manager_order", "show_order_page");
            this.loadModuleScript("logout", "do_logout_action");
        }
        else if(login_content['permissions_check'] == 0){
            var str =`
                <div>Username：` + login_content['username'] + `  ` + `<button onclick="(new logout_do_logout_action('logout','do_logout_action','content')).run()">登出</button></div><br />
                <div>
                    <button onclick="(new member_information_show_information_page('member_information','show_information_page','show_area_2')).run()">
                        會員基本資料
                    </button>
                    <button onclick="(new member_product_show_product_page('member_product','show_product_page','show_area_2')).run()">
                        商品列表
                    </button>
                    <button onclick="(new member_shopcart_show_shopcart_page('member_shopcart','show_shopcart_page','show_area_2')).run()">
                        購物車
                    </button>
                    <button onclick="(new member_order_show_order_page('member_order','show_order_page','show_area_2')).run()">
                        訂單
                    </button>
                </div>
                <br />
                <div id="show_area_2"></div>
            `;
            document.getElementById(this.position_id).innerHTML = str;
            this.loadModuleScript("member_product", "show_product_page");
            this.loadModuleScript("member_information", "show_information_page");
            this.loadModuleScript("member_shopcart", "show_shopcart_page");
            this.loadModuleScript("member_order", "show_order_page");
            this.loadModuleScript("logout", "do_logout_action");
        }
        else{
            alert('帳號或密碼錯誤');
            (new login_show_login_page('login','show_login_page','content')).run();
        }
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}