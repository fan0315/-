define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'integral/setup/index' + location.search,
                    add_url: 'integral/setup/add',
                    edit_url: 'integral/setup/edit',
                    del_url: 'integral/setup/del',
                    multi_url: 'integral/setup/multi',
                    table: 'integral_setup',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                                                {field: 'member_reg', title: __('Member_reg')},
                        {field: 'binding_phone', title: __('Binding_phone')},
                        {field: 'share', title: __('Share')},
                        {field: 'dianzan', title: __('Dianzan')},
                        {field: 'dianzan_num', title: __('Dianzan_num')},
                        {field: 'collection', title: __('Collection')},
                        {field: 'collection_num', title: __('Collection_num')},
                        {field: 'comment', title: __('Comment')},
                        {field: 'comment_num', title: __('Comment_num')},
{checkbox: true},
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