class manager_product_show_update_page extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
    }
    prepareArgs(){
        var radio = document.getElementsByName('id');
        var value = '';
        for(var i = 0 ; i < radio.length ; i++){
            if(radio[i].checked){
                value = radio[i].value;
                break;
            }  
        }
        this.addArgs('product_id', value);
    }
    ajax_success(xhttp){
        var product = xhttp.responseText;
        var product_content = JSON.parse(product);
        if(product_content['update'] == 0){
            alert('請選擇欲修改的商品');
            (new manager_product_show_update_list('manager_product','show_update_list','show_area_2')).run();
        }
        else{
            var str = "<input type='hidden' id='product_id' value='" + product_content['product_id'] + "'>";
                str += "<div>商品名稱:<input type='text' id='product_name' value='" + product_content['product_name'] + "'></div><br />";
    			str += "<div>商品庫存:<input type='text' id='product_stock' value='" + product_content['product_stock'] + "'></div><br />";
    			str += "<div>商品價格:<input type='text' id='product_price' value='" + product_content['product_price'] + "'></div><br />";	
    			str += `<button onclick="(new manager_product_do_update_action('manager_product','do_update_action','show_area_2')).run()">
                            修改
                        </button>`;
            document.getElementById(this.position_id).innerHTML = str;
            this.loadModuleScript(this.module, 'do_update_action');
        }
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}