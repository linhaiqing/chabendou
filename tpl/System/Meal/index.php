<include file="Public:header"/>
		<div class="mainbox">
			<div id="nav" class="mainnav_title">
				<ul>
					<a href="{:U('Meal/index')}">分类列表</a>|
					<if condition="$category">
					<a href="{:U('Meal/index',array('parentid'=>$category['cat_id']))}" class="on">{$category.cat_name} - 子分类列表</a>|
					</if>
					<a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Meal/cat_add', array('parentid' => $parentid))}','添加分类',480,260,true,false,false,addbtn,'add',true);">添加<if condition="$category">子<else />主</if>分类</a>
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
								<th>排序</th>
								<th>编号</th>
								<th>名称</th>
								<th>短标记(url)</th>
								<if condition="empty($parentid)">
								<th>查看子分类</th>
								</if>
								<th>状态</th>
								<th class="textcenter">操作</th>
							</tr>
						</thead>
						<tbody>
							<if condition="is_array($category_list)">
								<volist name="category_list" id="vo">
									<tr>
										<td>{$vo.cat_sort}</td>
										<td>{$vo.cat_id}</td>
										<td>{$vo.cat_name}</td>
										<td>{$vo.cat_url}</td>
										<if condition="empty($parentid)">
										<td><a href="{:U('Meal/index',array('parentid'=>$vo['cat_id']))}">查看子分类</a></td>
										</if>
										<td><if condition="$vo['cat_status'] eq 1"><font color="green">启用</font><elseif condition="$vo['cat_status'] eq 2"/><font color="red">待审核</font><else/><font color="red">关闭</font></if></td>
										<td class="textcenter"><a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Meal/cat_edit',array('cat_id'=>$vo['cat_id'],'frame_show'=>true))}','查看分类信息',480,260,true,false,false,false,'detail',true);">查看</a> | <a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Meal/cat_edit',array('cat_id'=>$vo['cat_id'], 'parentid'=>$vo['cat_fid']))}','编辑分类信息',480,260,true,false,false,editbtn,'edit',true);">编辑</a> | <a href="javascript:void(0);" class="delete_row" parameter="cat_id={$vo.cat_id}" url="{:U('Meal/cat_del')}">删除</a></td>
									</tr>
								</volist>
							<else/>
								<tr><td class="textcenter red" colspan="6">列表为空！</td></tr>
							</if>
						</tbody>
					</table>
				</div>
			</form>
		</div>
<include file="Public:footer"/>