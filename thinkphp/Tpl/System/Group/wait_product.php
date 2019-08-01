<include file="Public:header"/>
		<div class="mainbox">
			<div id="nav" class="mainnav_title">
				<ul>
					<if condition="empty($_GET['mer_id'])">
						<a href="{:U('Group/product')}" class="on">商品列表</a>
					<else/>
						<a href="{:U('Group/product')}">商品列表</a> |
						<a href="{:U('Group/product',array('mer_id'=>$_GET['mer_id']))}" class="on">指定商家的商品列表</a>
					</if>
				</ul>
			</div>
			<table class="search_table" width="100%">
				<tr>
					<td>
						<form action="{:U('Group/product')}" method="get">
							<input type="hidden" name="c" value="Group"/>
							<input type="hidden" name="a" value="product"/>
							<input type="hidden" name="mer_id" value="{$_GET.mer_id}"/>
							筛选: <input type="text" name="keyword" class="input-text" value="{$_GET['keyword']}"/>
							<select name="searchtype">
								<option value="group_id" <if condition="$_GET['searchtype'] eq 'group_id'">selected="selected"</if>>商品编号</option>
								<option value="s_name" <if condition="$_GET['searchtype'] eq 's_name'">selected="selected"</if>>商品名称</option>
								<option value="name" <if condition="$_GET['searchtype'] eq 'name'">selected="selected"</if>>商品标题</option>
							</select>
							<input type="submit" value="查询" class="button"/>
						</form>
					</td>
				</tr>
			</table>
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
							<col/>
							<col/>
							<col/>
							<col width="220" align="center"/>
						</colgroup>
						<thead>
							<tr>
								<th>编号</th>
								<th>名称（悬浮查看商品标题）</th>
								<th>价格</th>
								<th>销售概览</th>
								<th>时间</th>
								<th>数字</th>
								<th>查看二维码</th>
								<th>运行状态</th>
								<th>{$config.group_alias_name}状态</th>
								<th class="textcenter">操作</th>
							</tr>
						</thead>
						<tbody>
							<if condition="is_array($group_list)">
								<volist name="group_list" id="vo">
									<tr>
										<td>{$vo.group_id}</td>
										<td><a href="{$config.site_url}/index.php?g=Group&c=Detail&group_id={$vo.group_id}" target="_blank" title="{$vo.name}">{$vo.s_name}</a></td>
										<td>{$config.group_alias_name}价：￥{$vo.price}元<br/>原价：￥{$vo.old_price}元</td>
										<td>售出：{$vo.sale_count} 份<br/><!--库存： <if condition="$vo['count_num']">{$vo.count_num}<else/>无限制</if><br/>虚拟：{$vo.virtual_num} 人--></td>
										<td>开始时间：{$vo.begin_time|date='Y-m-d H:i:s',###}<br/>结束时间：{$vo.end_time|date='Y-m-d H:i:s',###}<br/>{$config.group_alias_name}券有效期：{$vo.deadline_time|date='Y-m-d H:i:s',###}</td>
										<td>查看数：{$vo.hits}<br/>出售数：{$vo.sale_count}<br/>评论数：{$vo.reply_count}</td>
										<td><a href="javascript:void(0);" onclick="window.top.artiframe('{$config.site_url}/index.php?g=Index&c=Recognition&a=see_qrcode&type=group&id={$vo.group_id}','查看二维码',430,433,true,false,false,null,'merchant_qrcode',true);" class="see_qrcode">查看二维码</a></td>
										<td>
											<if condition="$vo['begin_time'] gt $_SERVER['REQUEST_TIME']">
												未开团
											<elseif condition="$vo['end_time'] lt $_SERVER['REQUEST_TIME']"/>
												已结束
											<else/>
												进行中
											</if>
										</td>
										<td><switch name="vo['status']"><case value="0"><font color="red">关闭</font></case><case value="1"><font color="green">正常</font></case><case value="2"><font color="red">审核中</font></case></switch></td>
										<td class="textcenter"><a href="{:U('Group/order_list',array('group_id'=>$vo['group_id']))}">订单列表</a> | <a href="{:U('Group/reply_list',array('group_id'=>$vo['group_id']))}">评论列表</a> | <a href="{:U('Merchant/merchant_login',array('mer_id'=>$vo['mer_id'],'group_id'=>$vo['group_id']))}">编辑</a></td>
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