<include file="Public:header"/>
		<div class="mainbox">
			<div id="nav" class="mainnav_title">
				<ul>
					<a href="{:U('House/village')}" class="on">小区列表</a>
					<a href="javascript:void(0);" onclick="window.top.artiframe('{:U('House/village_add')}','添加小区',520,350,true,false,false,addbtn,'add',true);">添加小区</a>
					<a href="javascript:void(0);" onclick="window.top.artiframe('{:U('House/village_import')}','添加小区',450,150,true,false,false,importbtn,'add',true);">导入小区</a>
					<a href="{:U('Config/index',array('galias'=>'house','header'=>'House/header'))}">社区配置</a>
				</ul>
			</div>
			<!--table class="search_table" width="100%">
				<tr>
					<td>
						<form action="{:U('House/village')}" method="get">
							<input type="hidden" name="c" value="User"/>
							<input type="hidden" name="a" value="village"/>
							筛选: <input type="text" name="keyword" class="input-text" value="{$_GET['keyword']}"/>
							<select name="searchtype">
								<option value="uid" <if condition="$_GET['searchtype'] eq 'uid'">selected="selected"</if>>用户ID</option>
								<option value="nickname" <if condition="$_GET['searchtype'] eq 'nickname'">selected="selected"</if>>昵称</option>
								<option value="phone" <if condition="$_GET['searchtype'] eq 'phone'">selected="selected"</if>>手机号</option>
							</select>
							<input type="submit" value="查询" class="button"/>
						</form>
					</td>
				</tr>
			</table-->
			<form name="myqcorm" id="myqcorm" action="" method="post">
				<div class="table-list">
					<table width="100%" cellspacing="0">
						<colgroup>
							<col/>
							<col/>
							<col/>
							<col/>
							<col/>
							<col/>
							<col/>
							<col width="180" align="center"/>
						</colgroup>
						<thead>
							<tr>
								<th>ID</th>
								<th>小区名称</th>
								<th>物业名称</th>
								<th>物业电话</th>
								<th>最后登录时间</th>
								<th>访问</th>
								<th>账单</th>
								<th class="textcenter">状态</th>
								<th class="textcenter">操作</th>
							</tr>
						</thead>
						<tbody>
							<if condition="is_array($village_list)">
								<volist name="village_list" id="vo">
									<tr>
										<td>{$vo.village_id}</td>
										<td>{$vo.village_name}</td>
										<td>{$vo.property_name}</td>
										<td>{$vo.property_phone}</td>
										<td><if condition="$vo['last_time']">{$vo.last_time|date='Y-m-d H:i:s',###}<else/>从未登录</if></td>
										<td><a href="{:U('House/village_login',array('village_id'=>$vo['village_id']))}" target="_blank">访问</a></td>
										<td><a href="{:U('House/pay_order',array('village_id'=>$vo['village_id']))}">查看账单</a></td>
										<td class="textcenter"><if condition="$vo['status'] eq 1"><font color="green">正常</font><elseif condition="$vo['status'] eq 0"/><font color="red" title="等待小区管理员登录社区后台完善信息">待完善信息</font><else/><font color="red">禁止</font></if></td>
										<td class="textcenter"><a href="javascript:void(0);" onclick="window.top.artiframe('{:U('House/village_edit',array('village_id'=>$vo['village_id']))}','编辑小区信息',520,370,true,false,false,editbtn,'edit',true);">编辑</a></td>
									</tr>
								</volist>
								<tr><td class="textcenter pagebar" colspan="9">{$pagebar}</td></tr>
							<else/>
								<tr><td class="textcenter red" colspan="9">列表为空！</td></tr>
							</if>
						</tbody>
					</table>
				</div>
			</form>
		</div>
<include file="Public:footer"/>