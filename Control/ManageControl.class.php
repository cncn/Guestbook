<?php

/**
 * 留言板管理
 * Class GuestbookControl
 * @author 乐左网 lefts.cn
 */
class ManageControl extends AuthControl
{
    //模型
    protected $_db;

    /**
     * 构造函数
     */
    public function __init()
    {
        $this->_db = K('Guestbook');
    }

    /**
     * 留言列表
     */
    public function index(){
        $count = $this->_db->count();
        $page = new Page($count,10,5,2);
        $guestbook = $this->_db->order('id ASC')->all($page->limit());
        $this->assign('guestbook',$guestbook);
        $this->assign('page',$page->show());

        $this->display();
    }

    /**
     * 批量审核
     */
    public function audit(){
        $id = Q("id",0,'intval');
        if ($id) {
            if (!is_array($id))
                $id = array($id);
            foreach ($id as $i) {
                $this->_db->where(array('id'=>$i))->save(array('status'=>1));
            }
            $this->success('审核成功!',__HISTORY__);
        }
    }

    /**
     * 单个审核
     */
    public function audit_one_sh(){
        $id = Q('id');
        $this->_db->where(array('id'=>$id))->save(array('status'=>1));
        $this->success('审核成功', __HISTORY__);
    }

    /**
     * 单个反审核
     */
    public function audit_one_fsh(){
        $id = Q('id');
        $this->_db->where(array('id'=>$id))->save(array('status'=>0));
        $this->success('反审核成功', __HISTORY__);
    }

    public function reply(){
        $id = Q("id");
        $message = $this->_db->where(array('id'=>$id))->find();
        $this->assign('message',$message);
        $this->display();
    }
    /**
     * 站长回复留言
     */
    public function add_reply(){
        $id = Q("id");
        $hfcontent = Q("post.hfcontent",null, array('htmlspecialchars'));
        $data = array(
            'hfcontent'   => $hfcontent,
            'hftime' => time(),
            'flag'  => 1,
        );
        
        $this->_db->where(array('id'=>$id))->save($data);
        $this->success('站长回复成功!', U('index', array('g' => 'Plugin','m' => 'index')));
    }

    

    //批量删除留言
    public function del()
    {
        $id = Q("id",0,'intval');
        if ($id) {
            if (!is_array($id))
                $tid = array($id);
            foreach ($id as $i) {
                $this->_db->del(intval($i));
            }
            $this->success('删除成功!',__HISTORY__);
        }
    }

    /**
     * 删除单个留言
     */
    public function del_one()
    {
        if ($this->_db->del_guestbook()) {

            $this->success('删除成功', __HISTORY__);
        }
    }
}