<include file="Public:header"/>
		<div class="mainbox">
			<div id="nav" class="mainnav_title">
				<ul>
					<a href="{:U('Adver/index')}">广告分类列表</a>|
					<a href="{:U('Adver/adver_list',array('cat_id'=>$now_category['cat_id']))}" class="on">{$now_category.cat_name} - 广告列表</a>|
					<a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Adver/adver_add',array('cat_id'=>$now_category['cat_id']))}','添加广告',510,256,true,false,false,addbtn,'add',true);">添加广告</a>
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
							<col width="180" align="center"/>
							<col width="180" align="center"/>
						</colgroup>
						<thead>
							<tr>
								<th>编号</th>
								<th>名称</th>
								<th>链接地址</th>
								<th>图片(以下为强制小图，点击图片查看大图)</th>
								<th class="textcenter">最后操作时间</th>
								<th class="textcenter">操作</th>
							</tr>
						</thead>
						<tbody>
							<if condition="is_array($adver_list)">
								<volist name="adver_list" id="vo">
									<tr>
										<td>{$vo.id}</td>
										<td>{$vo.name}</td>
										<td><a href="{$vo.url}" target="_blank">访问链接</a></td>
										<td>
											<img src="{$config.site_url}/upload/adver/{$vo.pic}" style="width:300px;height:80px;" class="view_msg"/>
										</td>
										<td class="textcenter">{$vo.last_time|date='Y-m-d H:i:s',###}</td>
										<td class="textcenter"><a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Adver/adver_edit',array('id'=>$vo['id'],'frame_show'=>true))}','查看广告信息',480,330,true,false,false,false,'add',true);">查看</a> | <a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Adver/adver_edit',array('id'=>$vo['id']))}','编辑广告信息',510,330,true,false,false,editbtn,'add',true);">编辑</a> | <a href="javascript:void(0);" class="delete_row" parameter="id={$vo.id}" url="{:U('Adver/adver_del')}">删除</a></td>
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