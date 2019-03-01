class member_shopcart_show_shopcart_page extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
    }
    prepareArgs(){}
    ajax_success(xhttp){
        var product = xhttp.responseText;
        var shopcart_content = JSON.parse(product);
        if(shopcart_content['null_id'] == 0){
            document.getElementById(this.position_id).innerHTML = shopcart_content['null'];
        }
        else{
            var str = '';
            var all_price = 0;
            for(var i = shopcart_content['start_count'] ; i <= shopcart_content['end_count'] ; i++){
                if(shopcart_content['product_id'][i]){
                    str += `
                        商品名稱：` + shopcart_content['product_name'][i] + `&nbsp&nbsp&nbsp <button onclick="(new member_shopcart_do_clear_action('member_shopcart','do_clear_action','show_area_2',` + shopcart_content['product_id'][i] + `)).run()">刪除</button><br />
                        價格： ` + shopcart_content['product_price'][i] + `<br />
                        購買數量： ` + shopcart_content['product_count'][i] + `<br />
                        小計： ` + shopcart_content['product_totalprice'][i] + `<br /><br />
                    `;
                    all_price += shopcart_content['product_totalprice'][i];
                }
            }
            var end_count = i-1;
            var button = `<br /><div>總金額：` + all_price + `</div><br />
                         <div><button onclick="(new member_shopcart_do_addorder_action('member_shopcart','do_addorder_action','show_area_2',` + end_count + `,` + all_price + `)).run()">結帳</button></div><br />
                        <div><button onclick="(new member_shopcart_do_allclear_action('member_shopcart','do_allclear_action','show_area_2')).run()">清空購物車</button></div>
                        `;
            document.getElementById(this.position_id).innerHTML = str + button;
            this.loadModuleScript(this.module, 'do_addorder_action');
            this.loadModuleScript(this.module, 'do_allclear_action');
            this.loadModuleScript(this.module, 'do_clear_action');
        }
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}