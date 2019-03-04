class manager_order_do_search_action extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
    }
    prepareArgs(){
        this.addArgsById('order_username');
    }
    ajax_success(xhttp){
        var ResponseText = xhttp.responseText;
        if(ResponseText == 'err'){
            alert('欄位不可為空白');
            (new manager_order_show_search_page('manager_order','show_search_page','show_area_2')).run();
        }
        else if(ResponseText == ''){
            alert('查無訂單');
            (new manager_order_show_search_page('manager_order','show_search_page','show_area_2')).run();
        }
        else{
            var str = `
                        <table>
                            <tr>
                                <td>ID</td>
                                <td>總額</td>
                                <td>買方</td>
                            </tr>
                        </table>
                    `;
            document.getElementById(this.position_id).innerHTML = str + ResponseText;
        }
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}