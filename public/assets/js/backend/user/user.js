define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'user/user/index' + location.search,
                    add_url: 'user/user/add',
                    edit_url: 'user/user/edit',
                    del_url: 'user/user/del',
                    multi_url: 'user/user/multi',
                    table: 'user',
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
                        {field: 'id', title: __('Id')},
                        {field: 'nickname', title: __('Nickname')},
                        {field: 'username', title: __('Username')},
                        {field: 'mobile', title: __('Mobile'),
                            formatter:function (value,row,index) {
                                return row.is_user;
                            }
                        },
                        {field: 'avatar', title: __('Avatar'), events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'is_user', title: __('is_user'), formatter: Table.api.formatter.toggle},
                        // {field: 'is_user', title: __('Is_user'),
                        //     formatter:function (value,row,index) {
                        //        if(value == 0){
                        //            return "<span class='btn btn-danger'>"+__('Not\'s user')+"</span>";
                        //        }else if(value == 1){
                        //            return "<span class='btn btn-success'>"+__('Is user')+"</span>";
                        //        }
                        //     }
                        // },
                        {field: 'score', title: __('Score')},
                        {field: 'industry', title: __('Industry')},
                        {field: 'address', title: __('Address')},
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
