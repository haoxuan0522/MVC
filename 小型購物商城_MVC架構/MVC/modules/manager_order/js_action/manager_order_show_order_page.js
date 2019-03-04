class manager_order_show_order_page extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
    }
    prepareArgs(){}
    ajax_success(xhttp){
        var order = xhttp.responseText;
        var order_content = JSON.parse(order);
        if(order_content['order_id'] == null){
            document.getElementById(this.position_id).innerHTML = '無訂單';
        }
        else{
            var str = ` <div>
                            <button onclick="(new manager_order_show_delete_list('manager_order','show_delete_list','show_area_2')).run()">
                                刪除訂單
                            </button>
                            <button onclick="(new manager_order_show_search_page('manager_order','show_search_page','show_area_2')).run()">
                                查詢訂單
                            </button>
                        </div>
                        <br />
                        <table>
                            <tr>
                                <td>ID</td>
                                <td></td>
                                <td></td>
                                <td>買方</td>
                                <td></td>
                                <td>總額</td>
                                <td></td>
                                <td>狀態</td>
                            </tr>
                        </table>
                    `;
            var str_order = '';
            for(var i = 0 ; i < order_content['run_count'] ; i++){
                if(order_content['order_status'][i] == 0){
                    order_content['content'][i] += `&nbsp&nbsp&nbsp<button onclick="(new manager_order_do_shipping_action('manager_order','do_shipping_action','show_area_2',` + order_content['order_id'][i] + `)).run()">出貨</button><br />`;
                }
                str_order += order_content['content'][i];
            }
            document.getElementById(this.position_id).innerHTML = str + str_order;
            this.loadModuleScript(this.module, "show_delete_list");
            this.loadModuleScript(this.module, "show_search_page");
            this.loadModuleScript(this.module, "do_shipping_action");
        }
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}