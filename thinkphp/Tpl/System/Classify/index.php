<include file="Public:header"/>
		<div class="mainbox">
			<div id="nav" class="mainnav_title">
				<ul>
					<if condition="empty($now_category)">
						<a href="{:U('Classify/index')}" class="on">分类列表</a>|
						<a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Classify/cat_add',array('fcid'=>$fcid,'pfcid'=>$pfcid))}','添加主分类',580,450,true,false,false,addbtn,'add',true);">添加主分类</a>
					<else/>
						<a href="{:U('Classify/index')}">分类列表</a>|
						<a href="{:U('Classify/index',array('fcid'=>$fcid,'pfcid'=>$pfcid))}" class="on">{$now_category.cat_name} - 子分类列表</a>|
						<a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Classify/cat_add',array('fcid'=>$fcid,'pfcid'=>$pfcid))}','添加子分类',580,450,true,false,false,addbtn,'add',true);">添加子分类</a> | 	<a <if condition="$now_category['subdir'] eq 1"> href="{:U('Classify/index',array('fcid'=>0,'pfcid'=>0))}" <elseif condition="$now_category['subdir'] eq 2"/> href="{:U('Classify/index',array('fcid'=>$now_category['fcid'],'pfcid'=>0))}" </if>>返回上级目录</a>
					</if>
				</ul>
			</div>
			<if condition="!empty($_GET['cat_fid'])">
				<div style="height:30px;line-height:30px;">提示：若主分类下只有一个子分类，网站上子分类不会显示。</div>
			</if>
			<form name="myqcorm" id="myqcorm" action="" method="post">
				<div class="table-list">
					<table width="100%" cellspacing="0">
						<colgroup>
							<col/>
							<col/>
							<col/>
							<col/>
							<if condition="empty($_GET['cat_fid'])">
								<col/>
								<col/>
								<col/>
							</if>
							<col/>
						</colgroup>
						<thead>
							<tr>
								<th>排序</th>
								<th>编号</th>
								<th>名称</th>
								<th>短标记(url)</th>
								<if condition="$now_category['subdir'] lt 2">
								 <th>查看子分类</th>
								 <th>发布信息需填项设置</th>
								 <th>状态</th>
								</if>
								<th class="textcenter">操作</th>
							</tr>
						</thead>
						<tbody>
							<if condition="is_array($category_list)">
								<volist name="category_list" id="vo">
									<tr>
										<td>{$vo.cat_sort}</td>
										<td>{$vo.cid}</td>
										<td><if condition="$vo['is_hot']"><font color="red">{$vo.cat_name}</font><else/>{$vo.cat_name}</if></td>
										<td>{$vo.cat_url}</td>
										<if condition="$now_category['subdir'] lt 2">
											<td><a href="{:U('Classify/index',array('fcid'=>$vo['cid'],'pfcid'=>$vo['fcid']))}">查看子分类</a>
										
										</td>
											<td><a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Classify/cat_field',array('cid'=>$vo['cid']))}','管理商品属性字段',580,420,true,false,false,false,'detail',true);">添加/查看设置</a></td>
										<td><if condition="$vo['cat_status'] eq 1"><font color="green">启用</font><elseif condition="$vo['cat_status'] eq 2"/><font color="red">待审核</font><else/><font color="red">关闭</font></if></td>
										</if>
										<td class="textcenter"><a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Classify/cat_edit',array('cid'=>$vo['cid'],'frame_show'=>true))}','查看分类信息',480,260,true,false,false,false,'detail',true);">查看</a> | <a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Classify/cat_edit',array('cid'=>$vo['cid']))}','编辑分类信息',580,450,true,false,false,editbtn,'add',true);">编辑</a> | <a href="javascript:void(0);" class="delete_row" parameter="cid={$vo.cid}" url="{:U('Classify/cat_del')}">删除</a></td>
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