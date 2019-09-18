<html>
<head>
    <title>全球奶茶网</title>
    <meta name="keywords" content="西餐吧，椰芙，西餐加盟，西餐厅加盟，西餐加盟连锁，西式简餐加盟"/>
    <meta name="description"
          content="“椰芙”【官网】源自新加坡的邻里型西餐厅,现面向全球诚招加盟，多元化的产品包括：西餐，西式简餐，西式快餐，时尚休闲西餐等西餐厅加盟项目。西餐厅加盟咨询热线400-1668-553"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="{$static_path}css/style.css"/>
    <link rel="stylesheet" type="text/css" href="{$static_path}css/style1.css"/>
<link rel="stylesheet" type="text/css" href="{$static_path}css/bootstrap.min.css"/>
</head>

<style>
    * {
        border: 0;
        margin: 0;
        padding: 0;
    }


    .img {
        border: 0;
        vertical-align: middle;
        width:100%;
		
    }

    .img img {
        border: 0;
        vertical-align: middle;
        width: 100%;
    }

    .dt img {
        width: 60%;
        text-align: center;
    }

    .dt1 {
        margin: 40px;
        auto;
        text-align: center;
    }

    ul, ol, li {
        list-style: none;
    }

    .box_swipe {
        overflow: hidden;
        position: relative;
        z-index: 99;
    }
</style>
<script type='text/javascript' src='{$static_path}js/jquery.js?ver=1.11.1'></script>
<script type="text/javascript" src="{$static_path}/js/swipe.js"></script>


<body>

<div class="img">


   <img src="{$static_path}wap6/82.jpg" alt="">
  
<div style="display: none;">
    <script src="https://s13.cnzz.com/z_stat.php?id=1273883163&web_id=1273883163" language="JavaScript"></script>
</div>
<div class="ny_main">
    <div class="ny_about">
        <div class="w16" style="height: 300px; width:100%">
            <div class="panel panel-info">
                <div class="panel-heading" style="height:60px;font-weight:bold; font-size:25px" >
                    在线留言
                </div>
                <div class="panel-body">
                    <form class="myform" action="{:U('comment')}" method="post" id="form1">
                        <div class="row form-group">
                            <div class="col-xs-12">
                            <div class="panel-heading" style="font-weight:bold; font-size:40px" >
                    姓名
                </div>
                                <input style="height:80px; font-size:30px" class="form-control" type="text" name="name" id="name"
                                       value="" placeholder="请输入您的姓名" required="required"/>
                            </div>
                           
                        </div>
                       <div class="row form-group">  
                        <div class="col-xs-12">
                        <div class="panel-heading" style="font-weight:bold; font-size:40px" >
                   手机
                </div>
                                <input style="height:80px;font-size:30px" class="form-control" type="text" name="mobile" id="mobile"
                                       value="" placeholder="请输入您的手机号码" required="required"/>
                            </div>
                            
                        </div>
                        <div class="row form-group ">
                            <div class="col-xs-12">
                            <div class="panel-heading" style="font-weight:bold; font-size:40px" >
                    留言
                </div>
                                <textarea style="height:130px;font-size:30px" class="form-control " name="demand" id="demand"
                                          placeholder="请输入您的留言" required="required" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row form-group ">
                            <div class="col-xs-12">
                                <input class="form-control yanzhenginput"
                                       style="height:60px;width: 250px;padding-left:120px;" type="text" name="verify"
                                       value="" placeholder="请输入验证码" required="required"/><img class="yanzheng"
                                                                                               src="{:U('verify')}"
                                                                                               id="verifyImg"
                                                                                               onclick="fleshVerify('{:U('verify')}')"
                                                                                               title="刷新验证码" alt="刷新验证码"
                                                                                               style="width: 100px; height:60px"/>
                            </div>
                        </div>
                        <div class="row form-group ">
                            <div class="col-xs-12">
                                <button type="button" style="height:80px; font-size:30px;font-weight:bold" class="btn btn-primary form-control">提交留言</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
   
</div>

<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?ea0937658be71b7104bc3e1785d7410d";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })(); </script>
<script type="text/javascript" charset="utf-8" async src="http://lxbjs.baidu.com/lxb.js?sid=11796862"></script>
<script type="text/javascript">
    $(".img").click(function () {
        //get_chat_event('advice');
    });
</script>
<script type="text/javascript">

    function fleshVerify(url) {
        var time = new Date().getTime();
        $('#verifyImg').attr('src', url + "&time=" + time);
    }

    $(function () {
        /* 提示 */
        $('.btn-primary').on('click', function () {
            $.post("{:U('comment')}", $("#form1").serialize(), function (data) {
                if (data['status'] == 0) {
                    alert(data.info);
                } else {
                    alert(data.info);
                    window.location.reload();
                }
            })
        });
        ajaxdata(1);
    });

    function ajaxdata(page) {
        // 这里可以写些验证代码
        $.get("{:U('ajax_comment')}", {page: page}, function (data) {
            if (data.li == '') {
            } else {
                total = data.total; //总记录数
                pageSize = data.pageSize; //每页显示条数
                curPage = Number(page); //当前页
                totalPage = data.totalpage; //总页数
                $(".comment_list").html(data.li);
                getPageBar();
            }
        }, 'json');
    }

    function getPageBar() {
        var pageStr = '';
        //页码大于最大页数
        if (curPage > totalPage) curPage = totalPage;
        //页码小于1
        if (curPage < 1) curPage = 1;
        //如果是最后页
        if (curPage != 1) {
            pageStr += '<a class="num" href="javascript:ajaxdata(' + (curPage - 1) + ')">上一页</a>';
        }


        for (var i = curPage; i <= curPage + 5; i++) {
            if (i > totalPage) {
                continue;
            }
            pageStr += '<a class="num" href="javascript:ajaxdata(' + i + ')">' + i + '</a>';
        }
        if (curPage < totalPage) {
            pageStr += '<a class="num" href="javascript:ajaxdata(' + (curPage + 1) + ')">下一页</a>';
            // pageStr += '<a class="num" href="javascript:ajaxdata('+totalPage+')">'+totalPage+'</a>';
        }


        $(".loadmore").html(pageStr);
    }
</script>
</body>
</html>
