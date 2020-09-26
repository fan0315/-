define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'user/index/index' + location.search,
                    add_url: 'user/index/add',
                    edit_url: 'user/index/edit',
                    del_url: 'user/index/del',
                    multi_url: 'user/index/multi',
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
                        {field: 'username', title: __('Username'),
                            formatter:function (value,row,index) {
                                if(row.is_user == 1){
                                    return value;
                                }else{
                                    return "-";
                                }
                            }
                        },
                        {field: 'mobile', title: __('Mobile'),
                            formatter:function (value,row,index) {
                                if(row.is_user == 1){
                                    return value;
                                }else{
                                    return "-";
                                }
                            }
                        },
                        {field: 'avatar', title: __('Avatar'), events: Table.api.events.image, formatter: Table.api.formatter.image},
                        // {field: 'is_user', title: __('is_user'), formatter: Table.api.formatter.toggle},
                        {field: 'is_user', title: __('Is_user'),
                            formatter:function (value,row,index) {
                                if(value == 1){
                                    return "<span class='btn btn-success'>"+__('Is user')+"</span>";
                                     }else if(value == 0){
                                    return "<span class='btn btn-danger'>"+__('Not\'s user')+"</span>";
                                }else{
                                    return "<span class='btn btn-danger'>"+__('Not\'s user')+"</span>";
                                }
                            }
                         },
                        {field: 'score', title: __('Score')},
                        {field: 'industry', title: __('Industry'),
                            formatter:function (value,row,index) {
                                if(row.is_user == 1){
                                    return value;
                                }else{
                                    return "-";
                                }
                            }
                        },
                        {field: 'address', title: __('Address')},
                        {field: 'operate', title: __('Operate'), table: table,
                            buttons:[
                                {
                                    name: 'detail',
                                    text: __('积分详情'),
                                    title: __('积分详情'),
                                    classname: 'btn btn-xs btn-info btn-dialog',
                                    icon: 'fa fa-list',
                                    url: 'user/index/detail',
                                    callback: function (data) {
                                        Layer.alert("接收到回传数据：" + JSON.stringify(data), {title: "回传数据"});
                                    },
                                    visible: function (row) {
                                        //返回true时按钮显示,返回false隐藏
                                        return true;
                                    }
                                },
                            ],
                            events: Table.api.events.operate, formatter: Table.api.formatter.operate
                        }
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        detail:function(){
            //初始化表格参数配置
            Table.api.init({
                extend:{
                    'detail_url':'user/index/detail'
                }
            });
            var table = $('#table');

            //初始化表格
            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.detail_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {field: 'id', title: __('Id')},
                        {field: 'user_id', title: __('User_id')},
                        {field: 'score', title: __('Score')},
                        {field: 'memo', title: __('memo')},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                  ]
                ]
            });
            //为表格绑定事件
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