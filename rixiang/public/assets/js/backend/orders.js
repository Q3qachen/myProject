define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'orders/index' + location.search,
                    add_url: 'orders/add',
                    edit_url: 'orders/edit',
                    del_url: 'orders/del',
                    multi_url: 'orders/multi',
                    import_url: 'orders/import',
                    table: 'orders',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                fixedColumns: true,
                fixedRightNumber: 1,
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'out_trade_no', title: __('订单号')},
                         {field: 'status', title: __('Status'), searchList: {"-1":__('已取消'),"0":__('未入库'),"1":__('待打包'),"2":__('待付款'),"4":__('已付款'),"3":__('已发货')}, formatter: Table.api.formatter.status},
                        {field: 'ordersn', title: __('接货运单号'), operate: 'LIKE'},
                        // {field: 'user.nickname', title: __('User.nickname'), operate: 'LIKE'},
                        {field: 'userid', title: __('Userid')},
                        // {field: 'name', title: __('收货人信息')},
                        // {field: 'phone', title: __('Phone'), operate: 'LIKE'},
                        // {field: 'address', title: __('Address'), operate: 'LIKE', table: table, class: 'autocontent', formatter: Table.api.formatter.content},
                        {field: 'zipcode', title: __('邮编'), operate: 'LIKE'},
                        {field: 'money', title: __('Money'), operate:'BETWEEN'},
                        {field: 'kimage', title: __('Kimage'), operate: false, events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'cimage', title: __('Cimage'), operate: false, events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'wnumber', title: __('Wnumber'), operate: 'LIKE'},
                        {field: 'weight', title: __('货物重量'), operate: 'LIKE'},
                        {field: 'volume', title: __('包裹体积'), operate: 'LIKE'},
                         {field: 'mables', title: __('耗材金额'), operate: 'LIKE'},
                        {field: 'party', title: __('三方单号'), operate: 'LIKE'},
                        {field: 'notes', title: __('Notes'), operate: 'LIKE'},
                        {field: 'fcode', title: __('申请发货编码'), operate: 'LIKE'},
                        {field: 'stime', title: __('申请时间'), operate: 'LIKE'},
                       
                         
                          {field: 'transact', title: __('微信支付成功唯一标识')},
                        
                        {field: 'time', title: __('Time'), operate:'RANGE', addclass:'datetimerange', autocomplete:false},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });
            
               //订单拆分
            $(".btn-splitting").click(function(){
                var ids = Table.api.selectedids(table);
                if(ids.length<1){
                      layer.alert("至少选择一个订单包裹")
                       return false;
                 }
                layer.confirm('确定将此订单中您勾选的包裹在一起打包吗?', {closeBtn: 0,title: "操作提示",btn: ['是','否'] },
                function(index){
                    layer.close(index);
                        $.post("orders/splitting", {ids:ids},function(response){
                            if(response.code == 1){
                                layer.closeAll('loading');
                                Toastr.success(response.msg)
                                 $(".btn-refresh").trigger('click');
                            }else{
                                layer.closeAll('loading');
                                Toastr.error(response.msg)
                            }
                        }, 'json')
                    },
                    function(index){
                        // window.parent.location.reload(); //刷新页面
                        layer.closeAll('loading');
                    }
                );
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
         edits: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});
