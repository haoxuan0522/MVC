class manager_product_show_insert_page extends ActionHandler{
    constructor(module, action, position_id){
        super(module, action);
        this.position_id = position_id;
        this.php = false;
    }
    showResult(xhttp){
        var str=`
				<div>
					商品名稱:<input type="text" id="product_name">
				</div>
				<br />
				<div>
					商品庫存:<input type="text" id="product_stock">
				</div>
				<br />
				<div>
					商品價格:<input type="text" id="product_price">
				</div>
				<br />
				<div>
                    <button onclick="(new manager_product_do_insert_action('manager_product','do_insert_action','show_area_2')).run()">
                        新增
                    </button>
				</div>
        `;
        document.getElementById(this.position_id).innerHTML = str;
        this.loadModuleScript(this.module, 'do_insert_action');
    }
}