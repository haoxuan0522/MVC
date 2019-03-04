class member_order_show_order_page extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
    }
    prepareArgs(){}
    ajax_success(xhttp){
        var ResponseText = xhttp.responseText;
        if(ResponseText == 0){
            document.getElementById(this.position_id).innerHTML = '無訂單';
        }
        else{
            var str = 
                `<table>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>編號</td>
                        <td></td>
                        <td>總額</td>
                        <td></td>
                        <td>狀態</td>
                    </tr>
                </table>`;
            str += xhttp.responseText;
            str += `
                <br /><div><button onclick="(new member_order_show_order_content_page('member_order','show_order_content_page','show_area_2')).run()">查詢</button></div>
                <br /><div><button onclick="(new member_order_do_delete_action('member_order','do_delete_action','show_area_2')).run()">取消訂單</button></div>
            `;
            document.getElementById(this.position_id).innerHTML = str;
            this.loadModuleScript("member_order", "show_order_content_page");
            this.loadModuleScript("member_order", "do_delete_action");
        }
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}