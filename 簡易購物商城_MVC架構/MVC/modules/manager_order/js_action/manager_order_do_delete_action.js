class manager_order_do_delete_action extends ActionHandler{
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
        var ResponseText = xhttp.responseText;
        if(ResponseText == 0){
            alert('請選擇欲刪除的訂單');
            (new manager_order_show_delete_list('manager_order','show_delete_list','show_area_2')).run();
        }
        else{
            document.getElementById(this.position_id).innerHTML = ResponseText;
        }
    }
    ajax_error(xhttp){
        var ResponseText = xhttp.statusText;
        document.getElementById(this.position_id).innerHTML = ResponseText;
    }
}