class member_registered_do_verification_action extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
        this.php = false;
    }
    showResult(xhttp){
        var check = 0;
        var registered_username = document.getElementById("registered_username").value;
        var registered_password = document.getElementById("registered_password").value;
        var registered_password_check = document.getElementById("registered_password_check").value;
        var registered_addr = document.getElementById("registered_addr").value;
        var registered_phone = document.getElementById("registered_phone").value;
        var registered_username_verification = /[a-zA-Z]{4,10}/;
        var registered_addr_verification = /[\u4e00-\u9fa5]/;
        var registered_phone_verification = /09+[-0-9]{8}/;
        if(check == 0){
            if(registered_username == '' || registered_password == '' || registered_password_check == '' || registered_addr == '' || registered_phone == ''){
                alert('所有欄位皆為必填');
            }
            else if(registered_username_verification.test(registered_username) != true){
                alert('帳號為英文４～１０碼的組合');
            }
            else if(registered_password.length < 8){
                alert('密碼至少8碼');
            }
            else if(registered_password == 0){
                alert('密碼輸入錯誤');
            }
            else if(registered_password_check != registered_password){
                alert('密碼與確認密碼不相同');
            }
            else if(registered_addr_verification.test(registered_addr) != true || registered_addr.length < 9){
                alert('地址輸入錯誤');
            }
            else if(registered_phone_verification.test(registered_phone) != true || registered_phone.length > 10){
                alert('聯絡電話輸入錯誤');
            }
            else{
                check = 1;
            }
        }
        if(check == 1){
            (new member_registered_do_registered_action("member_registered", "do_registered_action", "show_area_2")).run();
        }
    }
}