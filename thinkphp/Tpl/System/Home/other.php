<include file="Public:header"/>
		<div class="mainbox">
			<div id="nav" class="mainnav_title">
				<ul>
					<a href="{:U('Home/other')}" class="on">关键词回复列表</a>|
					<a href="{:U('Home/other_add')}">添加关键词回复</a>
				</ul>
			</div>
			<form name="myqcorm" id="myqcorm" action="" method="post">
				<div class="table-list">
					<table width="100%" cellspacing="0">
						<colgroup><col> <col> <col><col>  <col width="180" align="center"> </colgroup>
						<thead>
							<tr>
								<th>编号</th>
								<th>关键词</th>
								<th>回复标题</th>
								<th>回复内容</th>
								<th>回复图片</th>
								<th>链接（URL）</th>
								<th class="textcenter">操作</th>
							</tr>
						</thead>
						<tbody>
							<if condition="is_array($list)">
								<volist name="list" id="vo">
									<tr>
										<td>{$vo.id}</td>
										<td>{$vo.key}</td>
										<td>{$vo.title}</td>
										<td>{$vo.info}</td>
										<td><img alt="" src="{$vo.pic}" width="50" height="50"></td>
										<td><a href="{$vo.url}" target="_blank" title="{$vo.url}" style="color:blue;">链接预览(鼠标悬浮可显示)</a></td>
										<td class="textcenter">
											<a href="{:U('Home/other_edit',array('id'=>$vo['id']))}">编辑</a> | 
											<a href="javascript:void(0);" class="delete_row" parameter="id={$vo.id}" url="{:U('Home/other_del')}">删除</a>
										</td>
									</tr>
								</volist>
							<else/>
								<tr><td class="textcenter red" colspan="5">列表为空！</td></tr>
							</if>
						</tbody>
					</table>
				</div>
			</form>
		</div>
<script type="text/javascript">
$(document).ready(function(){

});
</script>
<include file="Public:footer"/>