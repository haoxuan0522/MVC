class manager_product_show_update_list extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
    }
    prepareArgs(){
        this.php_action = 'do_select_action';
    }
    ajax_success(xhttp){
        var ResponseText = xhttp.responseText;
        ResponseText += `<button onclick="(new manager_product_show_update_page('manager_product','show_update_page','show_area_2')).run()">確認</button>`;
        var str = `
                    <table>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>ID</td>
                            <td></td>
                            <td></td>
                            <td>名稱</td>
                            <td>庫存</td>
                            <td>價格</td>
                        </tr>
                    </table>
        `;
        document.getElementById(this.position_id).innerHTML = str + ResponseText;
        this.loadModuleScript(this.module, 'show_update_page');
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}