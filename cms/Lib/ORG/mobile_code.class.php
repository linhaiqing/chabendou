<?php
/**
 * app错误码
 *
 */
class mobile_code 
{
	public static function errorTip($code){
		$array = array(
			'10000001' => '系统错误，请稍后重试',
			'10000002' => '数据库获取数据失败',
			//店铺
			'10011001' => '店铺ID不能为空',
			'10011002' => '店铺不存在',
			//支付
			'10021001' => '管理员没有开启任何一种支付方式',
			'10021002' => '支付方式不存在',
			//优惠价
			'10031001' => '优惠卷不存在',
			//账户中心
			'10042001' => '手机号不能为空',
			'10042002' => '密码不能为空',
			'10044003' => '注册失败',
			'10044004' => '设备ID不能为空',
			'10044005' => '手机号已注册',
			'10044006' => '登录失败',
			'10044007' => '短信数据写入失败',
			'10044008' => '验证码不能为空',
			'10044009' => '验证码错误',
			//个人中心
			'10052001' => '该用户不存在',
			'10052002' => '该地址不存在',
			'10052010' => '地址添加失败',
			'10052011' => '地址修改失败',
			//短信通道错误
			'10060001' => '提交失败',
			'10060002' => '非法ip访问',
			'10060003' => '帐号不能为空',
			'10060004' => '密码不能为空',
			'10060005' => '手机号码不能为空',
			'10060006' => '手机号码已被列入黑名单',
			'10060007' => '短信内容不能为空',
			'10060008' => '用户名或密码不正确',
			'10060009' => '账号被冻结',
			'10060010' => '剩余条数不足',
			'10060011' => '访问ip与备案ip不符',
			'10060012' => '手机格式不正确',
			'10060013' => '短信内容含有敏感字符',
			'10060014' => '签名格式不正确',
			'10060015' => '没有提交备案模板',
			'10060016' => '短信内容与模板不匹配',
			'10060017' => '短信内容超出长度限制',
			'10060018' => '您的帐户疑被恶意利用，已被自动冻结，如有疑问请与客服联系。',
			'10060019' => '验证码短信每天只能发五个',
			'10060020' => '同内容短信每天只发4次',

			//订单
			'10100001' => '该订单不存在',
			'10100002' => '店铺ID不能为空',
			'10100003' => '购物车读取错误',
			'10100004' => '用户地址信息有误',
			'10100005' => '支付方式不能为空',
			'10100006' => '商品信息有误',
			'10100007' => '商品信息更新失败',
			'10100008' => '订单不足起送金额',
			'10100009' => '订单添加失败',
			'10100010' => '订单日志写入失败',
			// 商家
			'10061001' => '商家经纬度不能为空',
		);
		return $array[$code];
	}
	

}