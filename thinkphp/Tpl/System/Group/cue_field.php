<include file="Public:header"/>
		<div class="mainbox">
			<div id="nav" class="mainnav_title">
				<ul>
					<a href="{:U('Group/cue_field',array('cat_id'=>$now_category['cat_id']))}" class="on">填写项列表</a>|
					<a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Group/cue_field_add',array('cat_id'=>$now_category['cat_id']))}','添加填写项',380,200,true,false,false,addbtn,'add',true);">添加填写项</a>
				</ul>
			</div>
			<form name="myqcorm" id="myqcorm" action="" method="post">
				<div class="table-list">
					<table width="100%" cellspacing="0">
						<colgroup>
							<col/>
							<col/>
							<col/>
							<col width="180" align="center"/>
						</colgroup>
						<thead>
							<tr>
								<th>排序</th>
								<th>名称</th>
								<th>类型</th>
								<th class="textcenter">操作</th>
							</tr>
						</thead>
						<tbody>
							<if condition="is_array($now_category['cue_field'])">
								<volist name="now_category['cue_field']" id="vo">
									<tr>
										<td>{$vo.sort}</td>
										<td>{$vo.name}</td>
										<td><if condition="$vo['type'] eq 1">多行<else/>单行</if></td>
										<td class="textcenter">
											<a  href="javascript:void(0);" onclick="window.top.artiframe('{:U('Group/cue_field_edit',array('cat_id'=>$now_category['cat_id'],'id'=>$key))}','编辑填写项',380,200,true,false,false,editbtn,'add',true);">编辑</a> | 
											<a href="javascript:void(0);" class="delete_row" parameter="cat_id={$now_category.cat_id}&name={$vo.name}" url="{:U('Group/cue_field_del')}">删除</a>
										</td>
									</tr>
								</volist>
							<else/>
								<tr><td class="textcenter red" colspan="6">购买须知预设选项 列表为空！</td></tr>
							</if>
						</tbody>
					</table>
				</div>
			</form>
		</div>
<include file="Public:footer"/>