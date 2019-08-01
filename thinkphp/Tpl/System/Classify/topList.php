<include file="Public:header"/>
<style type="text/css">
.drag_orders {
    background-color: #e7e7e7;
    cursor: move;
    height: 30px;
    line-height: 30px;
    text-align: center;
}
</style>
		<div class="mainbox">
			<div id="nav" class="mainnav_title">
				<ul>
					<a href="#" class="on">信息置顶列表</a>
				</ul>
			</div>
			<table class="search_table" width="100%">
				<tr>
					<td>
						<form action="/admin.php?g=System&c=Classify&a=topList" method="get">
						<input type="hidden" value="Classify" name="c"></input>
						<input type="hidden" value="topList" name="a"></input>

							分类列表：
							<select name="cid" style="width:200px;" onchange="getSubdir(this.value);">
							<option value="">请选择！</option>
							<if condition="!empty($subdir1)">
							<volist name="subdir1" id="vo">
							<option value="{$vo['cid']}"  <if condition="$vo['cid'] eq $cid">selected="selected"</if>>{$vo['cat_name']}</option>
							</volist>
							<else/>
							<option value="">无</option>
							</if>
							</select>
							<span id="erjisubdir" style="margin:0px 15px;">
							<if condition="!empty($subdir2Arr)">
							<select name="subdir2" style="width:200px;" id="subdir2">
							<volist name="subdir2Arr" id="v2o">
							<option value="{$v2o['cid']}" <if condition="$v2o['cid'] eq $subdir2cid">selected="selected"</if>>{$v2o['cat_name']}</option>
							</volist>
							</select>
							<else/>
							<select name="subdir2" style="width:200px; display: none;" id="subdir2">
							</select>
							</if>
							</span>
							<input type="submit" value="查询" class="button"/>
						</form>
					</td>
				</tr>
			</table>

			
			<!--<table class="search_table" width="100%">
				<tr>
					<td>
					</td>
				</tr>
			</table>-->
			<form name="myqcorm" id="myqcorm" action="" method="post">
				<div class="table-list">
					<table width="100%" cellspacing="0">
						<colgroup>
							<col/>
							<col/>
							<col/>
							<col/>
						</colgroup>
						<thead>
							<tr>
								<th>ID</th>
								<th style="text-align: center;">拖动排序</th>
								<th>一级分类</th>
								<th>二级分类</th>
								<th>标题</th>
								<th style="width:220px;">置顶到期时间</th>
								<th style="width:220px;text-align: center;">状态</th>
								<th class="textcenter">操作</th>
							</tr>
						</thead>
						<tbody id="drag_table">
							<if condition="!empty($listdatas)">
								<volist name="listdatas" id="vo">
									<tr class="drag_line" id="toplist_{$vo.id}" action-id="{$vo.id}">
									   <td>{$vo.id}</td>
									    <td><div class="drag_orders" action-id="{$vo.id}">拖动排序</div></td>
										<td>{$ClassifyArr[$vo['fcid']]}</td>
										<td>{$ClassifyArr[$vo['cid']]}</td>
										<td><if condition="!empty($title)"> {$vo['title']|str_replace=$title,'<b style="color: red;">'.$title.'</b>',###}<else/>{$vo.title}</if></td>
										<td>{$vo.endtoptime|date='Y-m-d H:i:s',###}</td>
										<td class="red">已审核/已置顶&nbsp;&nbsp;<input type="button" value="取消置顶" style="" class="button" onclick="CancelTop({$vo.id})"></td>
										<td class="textcenter"><a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Classify/infodetail',array('vid'=>$vo['id']))}','查看信息详情',680,560,true,false,false,closebtn,'edit',true);">查看详细</a>&nbsp; | <a href="javascript:void(0);" onclick="window.top.artiframe('{:U('Classify/attrSet',array('vid'=>$vo['id']))}','设置操作',550,350,true,false,false,confirmbtn,'add',true);">设置操作</a>&nbsp; | &nbsp;<a href="javascript:void(0);" onclick="toDelItem({$vo.id});">删除</a></td>
									</tr>
								</volist>
								<!--<tr><td class="textcenter pagebar" colspan="9"></td></tr>-->
							<else/>
								<tr><td class="textcenter red" colspan="8">列表为空！请选择分类列表查询！</td></tr>
							</if>
						</tbody>
					</table>
				</div>
			</form>
		</div>
<script type="text/javascript">
var Cid="{$subdir2cid}";
var fCid="{$cid}";
</script>
<script type="text/javascript" src="{$static_public}js/DragList.js"></script>
<script type="text/javascript">

$("#drag_table").DragList({
	dgLine:'drag_line',
	dgButton:'drag_orders',
	id:'action-id',
	linePre:'toplist_',
	JSONUrl:"{:U('Classify/topsort',array('cid'=>$subdir2cid,'fcid'=>$cid))}",
	maskLoadIcon:''
});

/***删除***/
function toDelItem(id){
    if(confirm('您确定删除此项吗？')){
    $.post("{:U('Classify/delItem')}",{vid:id},function(data){
	  data=parseInt(data);
	  if(!data){
          window.location.reload();
	   }
     },'JSON');
   }else{
     return false;
   }
}
/***取消置顶***/
function CancelTop(vid){
   if(confirm('您确定要取消置顶吗？')){
       $.post("{:U('Classify/CancelTop')}",{vid:vid},function(data){
	    if(!data){
		  alert('取消成功！');
          window.location.reload();
	     }
	   },'JSON');
   }   
}

function getSubdir(cid){
	cid=parseInt(cid);
	if(cid>0){
  $.post("{:U('Classify/get2Subdir')}",{cid:cid},function(data){
     if(data){
		 var shtml='';
	    $.each(data,function(kk,vv){
		    shtml+='<option value="'+vv.cid+'">'+vv.cat_name+'</option>';
		});
		$('#subdir2').html(shtml).show();
	 }
  },'JSON');
	}else{
	  $('#subdir2').html('').hide();
	}
}
</script>
<include file="Public:footer"/>