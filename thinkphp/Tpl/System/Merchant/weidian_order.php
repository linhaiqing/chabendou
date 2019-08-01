<include file="Public:header"/>
		<div class="mainbox">
			<div id="nav" class="mainnav_title">
				<ul>
					<a href="{:U('Merchant/index')}">商户列表</a>
					<a href="{:U('Merchant/weidian_order',array('mer_id'=>$mer_id))}" class="on">商家的微店账单</a>
				</ul>
			</div>
			<div style="margin:15px 0;">
				<b>商家ID：</b>{$now_merchant.mer_id}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>商家名称：</b>{$now_merchant.name}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>联系电话：</b>{$now_merchant.phone}<br/><br/>
			</div>
			<table class="search_table" width="100%">
				<tr>
					<td><input type="button" value="确认对账" class="button"></td>
				</tr>
			</table>
			<form name="myqcorm" id="myqcorm" action="" method="post">
				<div class="table-list">
					<style>
					.table-list td{line-height:22px;padding-top:5px;padding-bottom:5px;}
					</style>
					<table width="100%" cellspacing="0">
						<colgroup>
							<col/>
							<col/>
							<col/>
							<col/>
							<col/>
							<col/>
							<col width="100" align="center"/>
						</colgroup>
						<thead>
							<tr>
								<th><input type="checkbox" id="all_select"/></th>
								<th>类型</th>
								<th>订单号</th>
								<th>订单详情</th>
								<th>数量</th>
								<th>金额</th>
								<th>余额支付金额</th>
								<th>在线支付金额</th>
								<th>商户余额支付金额</th>
								<th>优惠券</th>
								<th>下单时间</th>
								<th>支付时间</th>
								<th>支付类型</th>
								<th>对账状态</th>
							</tr>
						</thead>
						<tbody>
								<if condition="$order_list">
									<volist name="order_list" id="vo">
										<tr>
											<td><if condition="$vo['is_pay_bill'] eq 0"><input type="checkbox" value="{$vo.name}_{$vo.order_id}" class="select" data-price="{$vo.price}"/></if></td>
											<td>微店</td>
											<td>{$vo.order_id}</td>
											<td>{$vo.order_name}</td>
											<td>{$vo.total}</td>
											<td>{$vo.order_price}</td>
											<td>{$vo.balance_pay}</td>
											<td>{$vo.payment_money}</td>
											<td>{$vo.merchant_balance}</td>
											<td><if condition="$vo['card_id'] eq 0">未使用<else/>已使用</if></td>
											<td>{$vo.add_time|date="Y-m-d H:i:s",###}</td>
											<td><if condition="$vo['pay_time'] gt 0">{$vo.pay_time|date="Y-m-d H:i:s",###}</if></td>
											<td>{$vo.pay_type_show}</td>
											<td><if condition="$vo['is_pay_bill'] eq 0"><strong style="color: red">未对账</strong><else /><strong style="color: green"><strong type="color:green">已对账</strong></if></td>
										</tr>
									</volist>
									<input type="hidden" id="percent" value="{$percent}" />
									<tr class="even">
										<td colspan="16">
										<if condition="$percent">
										平台的抽成比例：<strong style="color: green">{$percent}%</strong> <br/>
										本页总金额：<strong style="color: green">{$total}</strong>　本页已出账金额：<strong style="color: red">{$finshtotal} * {$percent}%</strong><br/> 
										总金额：<strong style="color: green">{$alltotal+$alltotalfinsh}</strong>　总已出账金额：<strong style="color: red">{$alltotalfinsh} * {$percent}%</strong><br/>
										<strong>本页平台应获取的抽成金额：</strong><strong style="color: green">{$total_percent}</strong><br/>
										<strong>平台应获取的总抽成金额：</strong><strong style="color: red">{$all_total_percent}</strong><br/>
										<else />
											本页总金额：<strong style="color: green">{$total}</strong>　本页已出账金额：<strong style="color: red">{$finshtotal}</strong><br/> 
											总金额：<strong style="color: green">{$alltotal+$alltotalfinsh}</strong>　总已出账金额：<strong style="color: red">{$alltotalfinsh}</strong><br/>
										
										</if>
										<!--本页总金额：<strong style="color: green">{$total}</strong> 本页已出账金额：<strong style="color: red">{$finshtotal}</strong><br/> 总金额：<strong style="color: green">{$alltotal+$alltotalfinsh}</strong> 总已出账金额：<strong style="color: red">{$alltotalfinsh}</strong-->
										</td>
									</tr>
									<tr class="odd">
										<td colspan="14" id="show_count"></td>
									</tr>
									<tr><td class="textcenter pagebar" colspan="14">{$pagebar}</td></tr>	
								<else/>
									<tr class="odd"><td class="textcenter red" colspan="14" >该的店铺暂时还没有订单。</td></tr>
								</if>
						</tbody>
					</table>
				</div>
			</form>
		</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#all_select').click(function(){
		if ($(this).attr('checked')){
			$('.select').attr('checked', true);
		} else {
			$('.select').attr('checked', false);
		}
		total_price();
	});
	$('.select').click(function(){total_price();});
	$('.button').click(function(){
		var strids = '';
		var pre = ''
		$('.select').each(function(){
			if ($(this).attr('checked')) {
				strids += pre + $(this).val();
				pre = ',';
			}
		});
		if (strids.length > 0) {
			$.get("{:U('Merchant/change',array('mer_id'=>$mer_id))}", {strids:strids}, function(data){
				if (data.error_code == 0) {
					location.reload();
				}
			}, 'json');
		}
	});
});

function total_price()
{
	var total = 0;
	$('.select').each(function(){
		if ($(this).attr('checked')) {
			total += parseFloat($(this).attr('data-price'));
		}
	});
	total = Math.round(total * 100)/100;
	var percent = $('#percent').val();
	if (total > 0) {
		$('#show_count').html('账单总计金额：<strong style=\'color:red\'>￥' + total + '</strong>, 平台对改商家的抽成比例是：<strong style=\'color:green\'>' + percent + '%</strong>, 平台应得金额：<strong style=\'color:green\'>￥' + Math.round(total * percent) /100 + '</strong>,商家应得金额:<strong style=\'color:red\'>￥' + Math.round((total - Math.round(total * percent) /100) * 100)/100 + '</strong>');
	} else {
		$('#show_count').html('');
	}
}
</script>
<include file="Public:footer"/>