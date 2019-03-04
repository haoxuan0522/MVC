class member_order_show_order_content_page extends ActionHandler{
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
        this.addArgs('order_id', value);
    }
    ajax_success(xhttp){
        var order = xhttp.responseText;
        var order_content = JSON.parse(order);
        if(order_content['content'] == 0){
            alert('請選擇欲觀看的訂單');
            (new member_order_show_order_page('member_order','show_order_page','show_area_2')).run();
        }
        var str = '';
        for(var i = 0 ; i < order_content['run_count'] ; i++){
            str += `
                    商品名稱：` + order_content['product_name'][i] + `<br />
                    購買數量：` + order_content['product_count'][i] + `<br />
                    價格：` + order_content['product_price'][i] + `<br />
                    小計：` + order_content['product_totalprice'][i] + `<br /><br />
            `;
        }
        str += `總額：` + order_content['all_price'];
        document.getElementById(this.position_id).innerHTML = str;
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}