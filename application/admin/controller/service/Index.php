<?php

namespace app\admin\controller\service;

use app\common\controller\Backend;
use think\Db;

/**
 * 微官网_综合服务
 *
 * @icon fa fa-circle-o
 */
class Index extends Backend
{
    
    /**
     * Index模型对象
     * @var \app\admin\model\service\Index
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\service\Index;
        $this->view->assign("statusList", $this->model->getStatusList());
    }
    
    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */
    

    /**
     * 查看
     */
    public function index()
    {
        //当前是否为关联查询
        $this->relationSearch = true;
        //设置过滤方法
        $this->request->filter(['strip_tags', 'trim']);
        if ($this->request->isAjax())
        {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('keyField'))
            {
                return $this->selectpage();
            }
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                    ->with(['category'])
                    ->where($where)
                    ->order($sort, $order)
                    ->count();

            $list = $this->model
                    ->with(['category'])
                    ->where($where)
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();

            foreach ($list as $row) {
                $row->visible(['id','title','image','createtime','status','category_id']);
                $row->visible(['category']);
				$row->getRelation('category')->visible(['id','name']);
            }
            $list = collection($list)->toArray();
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }
    /**
     * 编辑
     */
    public function edit($ids = null)
    {
        $row = $this->model->get($ids);
        if (!$row)
            $this->error(__('No Results were found'));

        $groupList = Db::name('category')
            ->where('type','article')
            ->field('id,name')
            ->select();
        $this->view->assign('groupList',$groupList);
        //halt($groupList);
        //$this->view->assign('groupList', build_select('row[category_id]', \app\admin\model\product\Category::column('id,name'), $row['category_id'], ['class' => 'form-control selectpicker']));
        return parent::edit($ids);
    }
    /**
     * 添加
     */
    public function add()
    {
        $groupList = Db::name('category')
            ->where('type','article')
            ->field('id,name')
            ->select();
        $this->view->assign('groupList',$groupList);
        //$this->view->assign('groupList', build_select('row[category_id]',\app\admin\model\product\Category::column('id,name'), ['class' => 'form-control selectpicker']));
        return parent::add();
    }
}
