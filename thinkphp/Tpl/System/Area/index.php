<include file="Public:header"/>
		<div class="mainbox">
			<div id="nav" class="mainnav_title">
				<ul>
					<a href="{:U('Area/index')}" <if condition="$_GET['type'] eq 1">class="on"</if>>根列表</a>|
					<if condition="$_GET['type'] gt 1"><a href="{:U('Area/index',array('pid'=>$_GET['pid'],'type'=>$_GET['type']))}" class="on">{$now_type_str}列表</a></if>
					<a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Area/add',array('pid'=>$_GET['pid'],'type'=>$_GET['type']))}','添加{$now_type_str}',450,320,true,false,false,addbtn,'add',true);">添加{$now_type_str}</a>
				</ul>
			</div>
			<form name="myqcorm" id="myqcorm" action="" method="post">
				<div class="table-list">
					<table width="100%" cellspacing="0">
						<colgroup>
							<col/>
							<col/>
							<col/>
							<if condition="$_GET['type'] eq 2 || $_GET['type'] eq 4">
								<col/>
							</if>
							<col/>
							<if condition="$_GET['type'] gt 1">
								<col/>
								<if condition="$_GET['type'] lt 4">
									<col/>
								</if>
							</if>
							<if condition="$_GET['type'] lt 4">
								<col/>
							</if>
							<col width="240" align="center"/>
						</colgroup>
						<thead>
							<tr>
								<th>排序</th>
								<th>编号</th>
								<th>名称</th>
								<if condition="$_GET['type'] eq 2 || $_GET['type'] eq 4">
									<th>首字母</th>
								</if>
								<th>状态</th>
								<if condition="$_GET['type'] gt 1">
									<th>网址标识</th>
									<if condition="$_GET['type'] lt 4">
										<th>IP标识</th>
									</if>							
								</if>
								<if condition="$_GET['type'] lt 4">
									<th>进入下级分类</th>	
								</if>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							<if condition="is_array($area_list)">
								<volist name="area_list" id="vo">
									<tr>
										<td>{$vo.area_sort}</td>
										<td>{$vo.area_id}</td>
										<td><if condition="$vo['is_hot']"><font color="red">{$vo.area_name}</font><else/>{$vo.area_name}</if></td>
										<if condition="$_GET['type'] eq 2 || $_GET['type'] eq 4">
											<td>{$vo.first_pinyin}</td>
										</if>
										<td><if condition="$vo['is_open']"><font color="green">显示</font><else/><font color="red">隐藏</font></if></td>
										<if condition="$_GET['type'] gt 1">
											<td>{$vo.area_url}</td>
											<if condition="$_GET['type'] lt 4">
												<td>{$vo.area_ip_desc}</td>
											</if>
										</if>
										<if condition="$_GET['type'] lt 4">
											<td><a href="{:U('Area/index',array('type'=>$_GET['type']+1,'pid'=>$vo['area_id']))}">进入下级</a></td>
										</if>
										<td>
											<a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Area/edit',array('area_id'=>$vo['area_id']))}','编辑{$now_type_str}',450,320,true,false,false,editbtn,'add',true);">编辑</a> | 
											<a href="javascript:void(0);" class="delete_row" parameter="area_id={$vo.area_id}" url="{:U('Area/del')}">删除</a>
											<if condition="$_GET['type'] eq 2">
											 | <a href="{:U('Area/admin', array('area_id' => $vo['area_id']))}">城市管理员</a>
											<elseif condition="$_GET['type'] eq 3" />
											 | <a href="{:U('Area/admin', array('area_id' => $vo['area_id']))}">区域管理员</a>
											</if>
										</td>
									</tr>
								</volist>
							<else/>
								<tr><td class="textcenter red" colspan="8">列表为空！</td></tr>
							</if>
						</tbody>
					</table>
				</div>
			</form>
		</div>
<include file="Public:footer"/>