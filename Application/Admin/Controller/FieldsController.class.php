<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
/**
 * 字段管理
 */
class FieldsController extends AdminBaseController{
    // 定义数据表
    private $db;
    
    // 构造函数 实例化FieldsModel
    public function __construct(){
        parent::__construct();
        $this->db=D('Fields');
    }

    // 字段首页
    public function index(){
        $data=$this->db->getAllData();
        $this->assign('data',$data);
        $this->display();
    }

    // 添加字段
    public function add(){
        if(IS_POST){
            if($this->db->addData()){
                $this->success('字段添加成功');
            }else{
                $this->error($this->db->getError());
            }
        }else{
            $this->display();
        }
    }

    // 修改字段
    public function edit(){
        if(IS_POST){
            if($this->db->editData()){
                $this->success('修改成功');
            }else{
                $this->error($this->db->getError());
            }           
        }else{
            $tid=I('get.tid',0,'intval');
            $data=$this->db->getDataByTid($tid);
            // p($data);
            $this->assign('data',$data);
            $this->display();
        }
    }
    
    // 删除字段
    public function delete(){
        if($this->db->deleteData()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

}




