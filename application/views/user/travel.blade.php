<!DOCTYPE html>
<html lang="zh-CN" style="font-size: 100px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="robots" content="all">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="telephone=no" name="format-detection">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <title>强势文化学习系统-移动版</title>
    <link href="favicon.ico" mce_href="favicon.ico" rel="icon">
    <!-- start 计算页面使用rem的尺寸 必须放在头部 -->
    <script src="../../../common/js/jquery-1.11.3.min.js" name="MTAH5" sid="500376155" cid="500376159"></script>
    <script src="../../../common/js/stats.js" name="MTAH5" sid="500376155" cid="500376159"></script>
    <link rel="stylesheet" href="../../../common/style/pact.css">
    <style>
        li span{
            position: relative;
            float: right;
        }
        input{
            text-align: center;
        }
        button{
            margin: 5px 40px;
            padding:5px 10px;
            border: none;
            background-color: #8CCD0A;
        }
    </style>
</head>
<body>
<section class="wrap">
    <section class="logo"></section>
    <form action="/user/addtraveljson" method="post" >
    <button id="addtravel" type="button">添加</button><button id="travelsave" type="submit" style="display: none">保存</button>
    <br>
    <br>
    <section class="login-wrap input-list">
            <input type="hidden" name="type" value="{{$type}}">
            <ul id="inserttravel" style="display: none">
                <li><label>旅游地点</label><input type="text" name="placename"></li>
                <li><label>旅游时间</label><input type="date" name="plantime"></li>
            </ul>
    </section>
    </form>

    <section class="login-wrap input-list">
        <ul>
            @foreach($travel as $item)
                <li ><label>{{$item['placename']}}</label><span>{{$item['plantime']}}</span></li>
            @endforeach
        </ul>
    </section>

</section>
</body>
<script>
    $("#addtravel").click(function (){
        $("#inserttravel").attr('style','display:block');
        $("#travelsave").attr('style','display:inline');
    })

</script>
</html>