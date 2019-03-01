class manager_product_show_product_page extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
    }
    prepareArgs(){}
    ajax_success(xhttp){
        var ResponseText = xhttp.responseText;
        var str =`
            <div>
    			<button onclick="(new manager_product_show_insert_page('manager_product','show_insert_page','show_area_2')).run()">
                    商品新增
                </button>
                <button onclick="(new manager_product_show_update_list('manager_product','show_update_list','show_area_2')).run()">
                    商品修改
                </button>
                <button onclick="(new manager_product_show_delete_list('manager_product','show_delete_list','show_area_2')).run()">
                    商品刪除
                </button>
                <button onclick="(new manager_product_show_search_page('manager_product','show_search_page','show_area_2')).run()">
                    商品查詢
                </button>
            </div>
            <br />
            <div>
                商品列表
            </div>
            <table>
                <tr>
                    <td>ID</td>
                    <td>名稱</td>
                    <td>庫存</td>
                    <td>價格</td>
                </tr>
            </table>
            `;
        document.getElementById(this.position_id).innerHTML = str + ResponseText;
        this.loadModuleScript(this.module, "show_insert_page");
        this.loadModuleScript(this.module, "show_update_list");
        this.loadModuleScript(this.module, "show_delete_list");
        this.loadModuleScript(this.module, "show_search_page");
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}