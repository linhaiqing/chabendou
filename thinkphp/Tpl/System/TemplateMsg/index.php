<include file="Public:header"/>
		<div class="mainbox">
			<form name="myqcorm" id="myqcorm" action="{:U('TemplateMsg/index')}" method="post" refresh="true">
				<div class="table-list">
					<table width="100%" cellspacing="0">
						<colgroup><col> <col> <col><col>  <col width="180" align="center"> </colgroup>
						<thead>
							<tr>
								<th>模板编号</th>
								<th>模板名</th>
								<th>回复内容</th>
								<th>头部颜色</th>
								<th>文字颜色</th>
								<th>状态</th>
								<th>模板ID</th>
							</tr>
						</thead>
						<tbody>
			                  <volist name="list" id="t">
			                    <tr>
			                      <td><input type="hidden" name="tempkey[]" value="{$t.tempkey}" />{$t.tempkey}</td>
			                      <td><input type="hidden" name="name[]" value="{$t.name}" />{$t.name}</td>
			                      <td><input type="hidden" name="content[]" value="{$t.content}" /><pre>{$t.content}</pre></td>
			                      <td><input type="text" name="topcolor[]" value="{$t.topcolor}" class="px color" style="width: 55px; background:{$t.topcolor}; color: rgb(255, 255, 255);"</td>
			                      <td>
			                        <input type="text" name="textcolor[]" value="{$t.textcolor}" class="px color" style="width: 55px; background:{$t.textcolor}; color: rgb(255, 255, 255);" />
			                      </td>
			                      <td>
			                          <select name="status[]">
			                            <option value="0" <if condition="$t['status'] eq 0">selected</if>>关闭</option>
			                            <option value="1" <if condition="$t['status'] eq 1">selected</if>>开启</option>
			                          <select>
			                      </td>
			                      <td class="norightborder"><input type="text" class="input-text" name="tempid[]" value="{$t.tempid}" /></td>
			                    </tr>
			                  </volist>
			                  <tr>
			                    <td colspan="7" align="center"><input type="submit" name="dosubmit" value="保存" class="button"/></td>
			                  </tr>
						</tbody>
					</table>
				</div>
			</form>
		</div>
<script src="/static/js/cart/jscolor.js" type="text/javascript"></script>
<include file="Public:footer"/>