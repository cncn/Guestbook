<?php

/**
 * 留言板前台
 * Class IndexControl
 */
class IndexControl extends CommonControl
{
    //模型
    private $_db;
    //配置
    private $_conf;

    //构造函数
    public function __init()
    {
        $this->_db = K('guestbook');
    }

    /**
     * 添加留言内容
     */
    public function index()
    {
        $this->display('guestbook.php');
    }

    /**
     * 留言链接验证码
     */
    public function code()
    {
        if (IS_POST) {
            if(Q('code',null,'strtoupper')==session('code')){
                echo 1;exit;
            }
        } else {
            $code = new Code();
            $code->show();
        }
    }

    /**
     * 添加留言
     */
    public function add()
    {
        if (IS_POST) {
            if ($this->_db->add_guestbook()) {
                $this->success('留言成功，管理员审核后会进行显示！', U('index', array('g' => 'Plugin','m' => 'show')));
            } else {
                $this->error($this->_db->error, U('index', array('g' => 'Plugin')));
            }
        }
    }

    /**
    * 显示留言列表
    */
    public function show(){
        $count = $this->_db->where(array('status'=>1))->count();
        $page = new Page($count,10,5,2);
        $messageList = $this->_db->where(array('status'=>1))->order('addtime DESC')->all($page->limit());
        $this->assign('messageList',$messageList);
        $this->assign('page',$page->show());
        $this->display('show.php');
    }
}