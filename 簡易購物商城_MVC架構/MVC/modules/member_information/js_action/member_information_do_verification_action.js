class member_information_do_verification_action extends ActionHandler{
    constructor(module, action, position_id, judgment){
        super(module, action);
        this.position_id = position_id;
        this.php = false;
        this.judgment = judgment;
    }
    showResult(xhttp){
        if(this.judgment == 'information'){
            var check = 0;
            var information_addr = document.getElementById("information_addr").value;
            var information_phone = document.getElementById("information_phone").value;
            var information_addr_verification = /[\u4e00-\u9fa5]/;
            var information_phone_verification = /09+[-0-9]{8}/;
            if(check == 0){
                if(information_addr == '' || information_phone == ''){
                    alert('所有欄位皆為必填');
                }
                else if(information_addr_verification.test(information_addr) != true || information_addr.length < 9){
                    alert('地址輸入錯誤');
                }
                else if(information_phone_verification.test(information_phone) != true || information_phone.length > 10){
                    alert('聯絡電話輸入錯誤');
                }
                else{
                    check = 1;
                }
            }
            if(check == 1){
                (new member_information_do_update_action("member_information", "do_update_action", "show_area_2")).run();
            }
        }
        if(this.judgment == 'password'){
            var check = 0;
            var oldpassword = document.getElementById("oldpassword").value;
            var password = document.getElementById("password").value;
            var newpassword = document.getElementById("newpassword").value;
            var newpassword_check = document.getElementById("newpassword_check").value;
            if(check == 0){
                if(password == '' || newpassword == '' || newpassword_check == ''){
                    alert('所有欄位皆為必填');
                }
                else if(password != oldpassword){
                    alert('原密碼輸入錯誤');
                }
                else if(newpassword.length < 8){
                    alert('新密碼至少8碼');
                }
                else if(newpassword == 0){
                    alert('新密碼輸入錯誤');
                }
                else if(newpassword != newpassword_check){
                    alert('新密碼與確認新密碼不相同');
                }
                else{
                    check = 1;
                }
            }
            if(check == 1){
                (new member_information_do_password_action("member_information", "do_password_action", "show_area_2")).run();
            }
        }
    }
}