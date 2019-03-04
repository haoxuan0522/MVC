class manager_order_show_search_page extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
        this.php = false;
    }
    prepareArgs(){}
    showResult(xhttp){
        var str=`
				<div>
					搜尋訂單名稱:<input type="text" id="order_username">
				</div>
				<br />
				<div>
                    <button onclick="(new manager_order_do_search_action('manager_order','do_search_action','show_area_2')).run()">
                        搜尋
                    </button>
				</div>
        `;
        document.getElementById(this.position_id).innerHTML = str;
        this.loadModuleScript(this.module, 'do_search_action');
    }
}