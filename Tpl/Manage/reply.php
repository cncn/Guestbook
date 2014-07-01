<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>站长回复-{$hd.config.webname}</title>
    <meta name="keywords" content="{$hd.config.keyworkds}">
    <meta name="description" content="{$hd.config.description}">
    <link href="__CONTROL_TPL__/css/style.css" rel="stylesheet" type="text/css">
    <link href="__CONTROL_TPL__/css/about.css" rel="stylesheet" type="text/css">
    <hdjs/>
</head>
<body>
<div id="warpper">
    <!--站长回复-->
    <div id="g-apply" class="g-apply">
        <div class="m-apply-hd"><h3 class="lks-ico tit">站长回复</h3></div>
        <form action="{|U:'add_reply',array('g'=>'Plugin')}" method="post">
            <table class="table1 hd-form">
                <tr>
                    <th class="w100">留言者 </th>
                    <td>
                        {$message.yhm} 
                        <input type="hidden" name="id" value="{$message.id}">
                    </td>
                </tr>
                <tr>
                    <th>电子邮箱 </th>
                    <td>
                        {$message.email}
                    </td>
                </tr>
                <tr>
                    <th>联系QQ</th>
                    <td>
                        {$message.qq}
                    </td>
                </tr>
                <tr>
                    <th>网址</th>
                    <td>
                        {$message.url}
                    </td>
                </tr>
                <tr>
                    <th>留言内容</th>
                    <td>
                        {$message.content}
                    </td>
                </tr>

                <tr>
                    <th>站长回复 <span class="star">*</span></th>
                    <td>
                        <textarea name="hfcontent" class="w500 h150">{$message.hfcontent}</textarea>
                    </td>
                </tr>
                
               
                <tr>
                    <td colspan="2">
                        <input type="submit" value="提交回复" class="hd-success"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="h50"></div>
</div>
</body>
</html>