<include file="Public:header"/>
		<div class="mainbox">
			<div id="nav" class="mainnav_title">
				<ul>
						<a href="{:U('Product/index')}" class="on">产品列表</a> |
						<a href="{:U('Product/add')}" >添加产品</a>
				</ul>
			</div>
			
			<form name="myqcorm" id="myqcorm" action="" method="post">
				<div class="table-list">
					<style>
					.table-list td{line-height:22px;padding-top:5px;padding-bottom:5px;}
					</style>
					<table width="100%" cellspacing="0">
						<colgroup>
							<col/><col/><col/><col/><col/><col/><col/><col/><col/><col width="220" align="center"/>
						</colgroup>
						<thead>
							<tr>
								<th>产品名称</th>
								<th>正面图</th>
								<th>反面图</th>
								<th>发布时间</th>
								<th class="textcenter">操作</th>
							</tr>
						</thead>
						<tbody>
							<if condition="is_array($product)">
								<volist name="product" id="vo">
									<tr>
										<td>{$vo.title}</td>
										<td><img src="{$config.site_url}{$vo.front_pic}" style="width:80px;height:80px;" class="view_msg"/></td>
										<td><img src="{$config.site_url}{$vo.reserve_pic}" style="width:80px;height:80px;" class="view_msg"/></td>
										<td>{$vo.addtime}</td>
										<td class="textcenter"> 
										<a href="{$config.site_url}/index.php?c=Index&a=detail&id={$vo.id}" target="_blank">查看产品</a> | 
										<a href="{:U('add',array('id'=>$vo['id']))}">编辑</a> | 
										<a href="javascript:void(0);" class="delete_row" parameter="id={$vo.id}" url="{:U('product_del')}">删除</a></td>
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