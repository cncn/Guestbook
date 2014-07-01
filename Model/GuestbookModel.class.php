<?php
/**
 * 留言板
 */
class GuestbookModel extends Model{
	public $table = 'guestbook';

	// 添加留言到数据库
	public function add_guestbook(){
		if ($this->create()) {
			$data = array(
				'yhm'		=> Q('post.yhm',null, array('htmlspecialchars')),
				'email'		=> Q('post.email'),
				'qq'		=> Q('post.qq',null, array('htmlspecialchars')),
				'url'		=> Q('post.url',null, array('htmlspecialchars')),
				'content'	=> Q('post.content',null, array('htmlspecialchars')),
				'addip'		=> ip::getClientIp(),
				'addtime'	=> time(),
				);
            return $this->add($data);
        }
	}

	 /**
     * 删除留言
     */
    public function del_guestbook(){
        return $this->del(Q('id'));
    }


}