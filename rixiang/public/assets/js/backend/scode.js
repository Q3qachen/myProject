define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'orders/indexs',
                    // add_url: 'orders/add',
                    edit_url: 'orders/edits',
                    // del_url: 'orders/del',
                    // multi_url: 'orders/multi',
                    // import_url: 'orders/import',
                    table: 'orders',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                fixedColumns: false,
                showExport: false,
                fixedRightNumber: 1,
                search:false,
                showToggle: false,
                showColumns: false,
                isible: false,
                operate: false,
                commonSearch: false,
                columns: [
                    [
                        {checkbox: true},
                       
                        {field: 'ordersn', title: __('接货运单号')},
                        // {field: 'user.nickname', title: __('User.nickname'), operate: 'LIKE'},
                        {field: 'userid', title: __('用户ID')},
                        // {field: 'name', title: __('收货人信息')},
                        // {field: 'phone', title: __('Phone'), operate: 'LIKE'},
                        // {field: 'address', title: __('Address'), operate: 'LIKE', table: table, class: 'autocontent', formatter: Table.api.formatter.content},
                      
                        {field: 'kimage', title: __('开箱图片'), operate: false, events: Table.api.events.image, formatter: Table.api.formatter.image},
                       
                       
                        {field: 'status', title: __('Status'), searchList: {"-1":__('已取消'),"0":__('未入库'),"1":__('待打包'),"2":__('待付款'),"4":__('已付款'),"3":__('已发货')}, formatter: Table.api.formatter.status},
                        
                        // {field: 'time', title: __('添加时间'), operate:'RANGE', addclass:'datetimerange', autocomplete:false},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
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
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});
