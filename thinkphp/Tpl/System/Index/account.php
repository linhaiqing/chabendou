<include file="Public:header"/>
		<div class="mainbox">
			<div id="nav" class="mainnav_title">
				<ul>
					<a href="{:U('Index/account')}" class="on">账号列表</a>|
					<a href="javascript:void(0);"  onclick="window.top.artiframe('{:U('Index/admin',array('area_id'=>$_GET['area_id']))}','添加管理账号',450,320,true,false,false,addbtn,'add',true);">添加管理员</a>
				</ul>
			</div>
			<form name="myqcorm" id="myqcorm" action="" method="post">
				<div class="table-list">
					<table width="100%" cellspacing="0">
						<colgroup><col> <col> <col> <col><col><col><col><col><col width="240" align="center"> </colgroup>
						<thead>
							<tr>
								<th>编号</th>
								<th>帐号</th>
								<th>姓名</th>
								<th>电话</th>
								<th>Email</th>
								<th>QQ</th>
								<th>最后登录时间</th>
								<th class="textcenter">登陆次数</th>
								<th class="textcenter">状态</th>
								<th class="textcenter">操作</th>
							</tr>
						</thead>
						<tbody>
							<if condition="is_array($admins)">
								<volist name="admins" id="vo">
									<tr>
										<td>{$vo.id}</td>
										<td>{$vo.account}</td>
										<td>{$vo.realname}</td>
										<td>{$vo.phone}</td>
										<td>{$vo.email}</td>
										<td>{$vo.qq}</td>
										<td><if condition="$vo['last_time']">{$vo.last_time|date='Y-m-d H:i:s',###}<else/>无</if></td>
										<td class="textcenter">{$vo.login_count}</td>
										<td class="textcenter"><if condition="$vo['status'] eq 1"><span style="color:green">正常</span><else /><span style="color:red">关闭</span></if></td>
										<td class="textcenter">
										<a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Index/admin',array('id'=>$vo['id']))}','编辑管理账号信息',450,320,true,false,false,editbtn,'edit',true);">编辑</a> | 
										<a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Index/menu',array('admin_id'=>$vo['id']))}','分配权限',800,500,true,false,false,editbtn,'edit',true);">分配权限</a>
										</td>
									</tr>
								</volist>
								<tr><td class="textcenter pagebar" colspan="10">{$pagebar}</td></tr>
							<else/>
								<tr><td class="textcenter red" colspan="10">列表为空！</td></tr>
							</if>
						</tbody>
					</table>
				</div>
			</form>
		</div>
<include file="Public:footer"/>