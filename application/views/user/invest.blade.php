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
    <script src="../../../common/js/stats.js" name="MTAH5" sid="500376155" cid="500376159"></script>
    <link rel="stylesheet" href="../../../common/style/pact.css">
    <style>
        li{
            font-size: 16px;
        }
        li span{
            position: relative;
            float: right;
        }
    </style>
</head>
<body>
<section class="wrap">
    <section class="logo"></section>
    <section class="login-wrap input-list">
        <ul>
            @foreach($invest as $item)
                <li ><label>{{$item['projectname']}}</label><span>{{$item['firstamount']}}</span></li>
            @endforeach
        </ul>
    </section>

</section>
</body>
</html>