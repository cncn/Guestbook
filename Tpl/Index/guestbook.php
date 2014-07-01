<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>留言板-{$hd.config.webname}</title>
    <meta name="keywords" content="{$hd.config.keyworkds}">
    <meta name="description" content="{$hd.config.description}">
    <link href="__CONTROL_TPL__/css/style.css" rel="stylesheet" type="text/css">
    <link href="__CONTROL_TPL__/css/about.css" rel="stylesheet" type="text/css">
    <hdjs/>
    <js file="__CONTROL_TPL__/js/guestbook.js"/>
</head>
<body>
<div id="warpper">
    <!--留言板-->
    <div id="g-apply" class="g-apply">
        <div class="m-apply-hd"><h3 class="lks-ico tit">留言板</h3></div>
        <form action="{|U:'add',array('g'=>'Plugin')}" method="post" enctype="multipart/form-data">
            <table class="table1 hd-form">
                <tr>
                    <th class="w100">你的姓名 <span class="star">*</span></th>
                    <td>
                        <input type="text" name='yhm' class="w300"/>
                    </td>
                </tr>
                <tr>
                    <th>电子邮箱 <span class="star">*</span></th>
                    <td>
                        <input type="text" name='email' class="w300"/>
                    </td>
                </tr>
                <tr>
                    <th>联系QQ</th>
                    <td>
                        <input type="text" name='qq' class="w300"/>
                    </td>
                </tr>
                <tr>
                    <th>网址</th>
                    <td>
                        <input type="text" name='url' class="w300" value="http://"/>
                    </td>
                </tr>
                <tr>
                    <th>留言内容 <span class="star">*</span></th>
                    <td>
                        <textarea name="content" class="w500 h150"></textarea>
                    </td>
                </tr>

                
                <tr>
                    <th>验证码</th>
                    <td>
                        <input type="text" name="code"/>
                        <img style="cursor:pointer" src="{|U:code,array('g'=>'Plugin')}" alt="验证码"
                             onclick="update_code()" id="code"/> <a href="javascript:update_code();">看不清，换一张</a>
                        <span id="hd_code"></span>
                    </td>
                </tr>
               
                <tr>
                    <td colspan="2">
                        <input type="submit" value="提交留言" class="hd-success"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="h50"></div>
</div>
</body>
</html>