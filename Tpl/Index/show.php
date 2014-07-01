<!DOCTYPE html>
<html><head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>留言列表 - {$hd.config.webname}</title>
	<hdjs/>
<link rel="stylesheet" type="text/css" href="__CONTROL_TPL__/css/guestbook_show.css">	
<link rel="stylesheet" type="text/css" href="__CONTROL_TPL__/css/show_ui.css">
</head>
<body>	
	<div class="frameContentList">
		<div class="listMessage" id="listMessage">
			<list from="$messageList" name="n">
				<div class="listMessageItem">
					<div class="listMessageItemTit current">
						<ul>
							<li class="t">
							<if value="{$n.url eq ''}">
								来自 <?php echo ip::area($n['addip']);?> 的网友 {$n.yhm} 的留言
							<else/>
								来自 <?php echo ip::area($n['addip']);?> 的网友 {$n.yhm} 的留言&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;网址：{$n.url}
							</if>
							 </li>
							<li class="time">{$n.addtime|date:'Y-m-d G:m',@@}</li>
						</ul>
					</div>
					
					<div class="listMessageItemContent">
						<div class="listMessageItemContentQ">								
							<span>{$n.content}</span>
						</div>
						<if value="{$n.flag eq 1}">
						<div class="listMessageItemContentLine"></div>
						<div class="listMessageItemContentA">
							<span id="reply_0">站长回复：{$n.hfcontent}</span>
						</div>	
						</if>					
					</div>
					
				</div>
			</list>
			<div class="page1">
				{$page}
			</div>
		</div>
	</div>
</body>
</html>