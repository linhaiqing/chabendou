<include file="Public:header"/>
		<div class="mainbox">
			<div id="nav" class="mainnav_title">
				<ul>
					<a href="{:U('Group/product')}">商品列表</a>
					<a href="{:U('Group/reply_list',array('group_id'=>$now_group['group_id']))}" class="on">评论列表</a>
				</ul>
			</div>
			<div style="margin:15px 0;">
				<b>商家ID：</b>{$now_merchant.mer_id}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>商家名称：</b>{$now_merchant.name}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>联系电话：</b>{$now_merchant.phone}<br/><br/>
				<b>{$config.group_alias_name}ID：</b>{$now_group.group_id}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{$config.group_alias_name}名称：</b>{$now_group.s_name}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{$config.group_alias_name}价：</b>￥{$now_group.price|floatval=###}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{$config.group_alias_name}类型：</b>
				<switch name="now_group['tuan_type']">
					<case value="0">{$config.group_alias_name}券</case>
					<case value="1">代金券</case>
					<case value="2">实物</case>
				</switch>
			</div>
			<form name="myqcorm" id="myqcorm" action="" method="post">
				<div class="table-list">
					<style>
					.table-list td{line-height:22px;padding-top:5px;padding-bottom:5px;}
					</style>
					<table width="100%" cellspacing="0">
						<colgroup>
							<col/>
							<col/>
							<col/>
							<col/>
							<col/>
							<col/>
							<col width="100" align="center"/>
						</colgroup>
						<thead>
							<tr>
								<th>评论编号</th>
								<th>用户ID</th>
								<th>查看用户</th>
								<th>订单名称</th>
								<th>评论内容</th>
								<th>时间</th>
								<th>IP</th>
								<th class="textcenter">操作</th>
							</tr>
						</thead>
						<tbody>
							<if condition="is_array($reply_list)">
								<volist name="reply_list" id="vo">
									<tr>
										<td>{$vo.pigcms_id}</td>
										<td>{$vo.uid}</td>
										<td>
											<a href="javascript:void(0);" onclick="window.top.artiframe('{:U('User/edit',array('uid'=>$vo['uid']))}','查看用户信息',680,560,true,false,false,editbtn,'see_user',true);">查看用户信息</a>
										</td>
										<td>{$vo.order_name}</td>
										<td>{$vo.comment|msubstr=###,0,50}</td>
										<td>{$vo['add_time']|date='Y-m-d H:i:s',###}</td>
										<td>{$vo['add_ip']|long2ip=###}</td>
										<td class="textcenter"><a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Group/reply_detail',array('id'=>$vo['pigcms_id']))}','查看评论详情',600,460,true,false,false,false,'reply_detail',true);">查看详情</a> | <a href="javascript:void(0);" class="delete_row" parameter="id={$vo.pigcms_id}" url="{:U('Group/reply_del')}">删除</a></td>
									</tr>
								</volist>
								<tr><td class="textcenter pagebar" colspan="11">{$pagebar}</td></tr>
							<else/>
								<tr><td class="textcenter red" colspan="11">列表为空！</td></tr>
							</if>
						</tbody>
					</table>
				</div>
			</form>
		</div>
<include file="Public:footer"/>