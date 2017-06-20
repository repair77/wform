<?php
namespace Common\Controller;

/**
 * 后台基类Controller
 */
class AdminBaseController extends BaseController{
    /**
     * 初始化方法
     */
    public function _initialize(){
        parent::_initialize();
        if(session('admin')!='is_login'){
            redirect(U('Admin/Login/login'));
        }
    }


}

