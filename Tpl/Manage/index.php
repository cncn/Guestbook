<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>留言板</title>
    <hdjs/>
    <css file="__GROUP__/static/css/common.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="__WEB__?g=Plugin&a=Guestbook&c=Manage&m=index" class="action">留言板列表</a></li>
        </ul>
    </div>
    <table class="table2 hd-form">
        <thead>
        <tr>
            <td class="w30">
                <input type="checkbox" id="select_all"/>
            </td>
            <td class="w30">id</td>
            <td class="w50">用户名</td>
            <td class="w100">站长邮箱</td>
            <td class="w300">留言内容</td>
            <td class="w100">留言时间</td>
            <td class="w50">站长QQ</td>
            <td class="w80">网址</td>
            <td class="w50">来源</td>
            <td class="w50">状态</td>
            <td class="w100">操作</td>
        </tr>
        </thead>
        <tbody>
        <list from="$guestbook" name="n">
            <tr>
                <td><input type="checkbox" name="id[]" value="{$n.id}"/></td>
                <td>{$n.id}</td>
                <td>
                    {$n.yhm}
                </td>
                <td>{$n.email}</td>
                <td>
                    {$n.content}
                <td>{$n.addtime|date:'Y-m-d G:m',@@}</td>
                <td>{$n.qq}</td>
                <td>{$n.url}</td>
                <td><?php echo ip::area($n['addip']);?>{$n.addip}</td>
                <td>
                    <if value="{$n.status eq 0}">
                        未审核
                    <else/>
                        已审核
                    </if>
                </td>
                <td>
                    <if value="{$n.status eq 0}">
                        <a href="{|U:'audit_one_sh',array('g'=>'Plugin','id'=>$n['id'])}">审核</a> |
                    <else/>
                        <a href="{|U:'audit_one_fsh',array('g'=>'Plugin','id'=>$n['id'])}">反审核</a> |
                    </if> 
                    <if value="{$n.flag eq 0}">
                        <a href="{|U:'reply',array('g'=>'Plugin','id'=>$n['id'])}">回复</a> |
                    <else/>
                        <a href="{|U:'reply',array('g'=>'Plugin','id'=>$n['id'])}">已回</a> |
                    </if>
                    
                    <a href="{|U:'del_one',array('g'=>'Plugin','id'=>$n['id'])}">删除</a>
                </td>
            </tr>
        </list>
        </tbody>
    </table>
    <div class="page1">
        {$page}
    </div>
</div>
<div class="position-bottom">
    <input type="button" class="hd-cancel" value="全选" onclick="select_all('.table2')"/>
    <input type="button" class="hd-cancel" value="反选" onclick="reverse_select('.table2')"/>
    <input type="button" class="hd-cancel" onclick="del()" value="批量删除"/>
    <input type="button" class="hd-cancel" onclick="audit()" value="批量审核"/>
</div>
<script>
    //全选 or  反选
$(function () {
    //全选
    $("input#select_all").click(function () {
        $("[type='checkbox']").attr("checked", $(this).attr("checked") == "checked");
    })
})

//删除
function del(id) {
    if (id) {
        var data = {'id[]': id};
    } else {
        var data = $("[name*='id']:checked").serialize();
    }
    if (!data) {
        alert("请选择删除的留言内容！");
        return;
    }
    if (confirm("确定要删除选择的留言吗?")) {
        hd_ajax(CONTROL + '&a=Guestbook&m=del&g=Plugin&c=Manage', data);
    }
}

//审核
function audit(id){
    if (id) {
        var data = {'id[]': id};
    } else {
        var data = $("[name*='id']:checked").serialize();
    }
    if (!data) {
        alert("请选择需要审核的留言内容！");
        return;
    }
    if (confirm("确定要审核选择的留言吗?")) {
        hd_ajax(CONTROL + '&a=Guestbook&m=audit&g=Plugin&c=Manage', data);
    }
}
</script>

</body>
</html>