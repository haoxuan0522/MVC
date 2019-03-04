class member_product_show_product_page extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
    }
    prepareArgs(){}
    ajax_success(xhttp){
        var product = xhttp.responseText;
        var product_content = JSON.parse(product);
        var str = '';
        for(var i = 0 ; i < product_content['run_count'] ; i++){
            str += `商品名稱：` + product_content['product_name'][i] + `<br />
                    商品價格：` + product_content['product_price'][i] + `<br />
                    商品庫存：` + product_content['product_stock'][i] + `<br />
                    <div>
    			        購買數量：<input type="number" id="` + product_content['product_id'][i] + `">
		            </div>
		            <br />
                    <div><button onclick="(new member_product_do_addcart_action('member_product','do_addcart_action','show_area_2',` + product_content['product_id'][i] + `,` + product_content['start_count'] + `,` + product_content['end_count'] + `)).run()">加入購物車</button></div><br />
                `;
        }
        document.getElementById(this.position_id).innerHTML = str;
        this.loadModuleScript(this.module, "do_addcart_action");
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}