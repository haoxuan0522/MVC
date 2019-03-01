class member_order_do_delete_action extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
        var cancel = confirm('確認取消？');
        if(cancel == false){
            this.php = false;
        }
    }
    showResult(xhttp){
        (new member_order_show_order_page('member_order','show_order_page','show_area_2')).run();
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
        var ResponseText = xhttp.responseText;
        if(ResponseText == 0){
            alert('此訂單已出貨，不可取消');
            (new member_order_show_order_page('member_order','show_order_page','show_area_2')).run();
        }
        else if(ResponseText == -1){
            alert('請選擇欲取消的訂單');
            (new member_order_show_order_page('member_order','show_order_page','show_area_2')).run();
        }
        else{
            (new member_order_show_order_page('member_order','show_order_page','show_area_2')).run();
        }
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}