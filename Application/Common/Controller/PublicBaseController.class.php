<?php
namespace Common\Controller;

/**
 * 其他通用基类Controller
 */
class PublicBaseController extends BaseController{
    /**
     * 初始化方法
     */
    public function _initialize(){
        parent::_initialize();
        // 分配常用数据
        $assign=array(
            'categorys'=>D('Category')->getAllData(),
            // 'tags'=>D('Tag')->getAllData(),
            );
        $this->assign($assign);

    }




}

