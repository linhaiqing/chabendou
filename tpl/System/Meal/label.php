<include file="Public:header"/>
		<div class="mainbox">
			<div id="nav" class="mainnav_title">
				<ul>
					<a href="{:U('Meal/label')}">店铺标签列表</a>|
					<a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Meal/label_add')}','添加标签',480,260,true,false,false,addbtn,'add',true);">添加标签</a>
				</ul>
			</div>
			<form name="myqcorm" id="myqcorm" action="" method="post">
				<div class="table-list">
					<table width="100%" cellspacing="0">
						<colgroup>
							<col/>
							<col/>
							<col/>
							<col/>
							<col/>
							<col width="180" align="center"/>
						</colgroup>
						<thead>
							<tr>
								<th>编号</th>
								<th>名称</th>
								<th>图标</th>
								<th class="textcenter">操作</th>
							</tr>
						</thead>
						<tbody>
							<if condition="is_array($labels)">
								<volist name="labels" id="vo">
									<tr>
										<td>{$vo.id}</td>
										<td>{$vo.name}</td>
										<td><img src="{$vo.icon}" style="width:50px;height:50px;"></td>
										<td class="textcenter"><a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Meal/label_edit',array('id'=>$vo['id']))}','编辑广告信息',510,330,true,false,false,editbtn,'add',true);">编辑</a> | <a href="javascript:void(0);" class="delete_row" parameter="id={$vo.id}" url="{:U('Meal/label_del')}">删除</a></td>
									</tr>
								</volist>
							<else/>
								<tr><td class="textcenter red" colspan="4">列表为空！</td></tr>
							</if>
						</tbody>
					</table>
				</div>
			</form>
		</div>
<include file="Public:footer"/>