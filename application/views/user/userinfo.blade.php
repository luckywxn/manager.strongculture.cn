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
        ul{
            list-style:none;
            margin:0px;
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
    <form action="/User/userEditJson" method="post">
        <input type="hidden" name="id" value="{{$sysno}}">
        <input type="hidden" name="role" value="{{$role}}">
        <section class="login-wrap input-list">
            <span style="display:block;width:100%;text-align: center;"><img src="{{$photourl}}" style="width: 50px;height: 50px"></span>
            <label style="display:block;text-align: center; font-size: 24px">{{$nickname}}</label>
            <input style="display:none;" name="nickname" value="{{$nickname}}">
            <br>
            <ul>
                <li><label>会员id</label><input type="text" name="sysno" value="{{$sysno}}" disabled></li>
                <li><label>账&nbsp;&nbsp;号</label><input type="text" name="username" value="{{$username}}" disabled></li>
                <li><label>姓&nbsp;&nbsp;名</label><input type="text" name="realname" value="{{$realname}}" readonly></li>
                <li><label>会员等级</label><input type="text" name="rolename" value="{{$rolename}}" disabled></li>
                <li><label>性&nbsp;&nbsp;别</label><input type="text" name="sex" value="@if($sex ==0) 男 @else 女 @endif"  readonly></li>
                <li><label>联系电话</label><input type="text" name="telephone" value="{{$telephone}}" readonly></li>
                <li><label>电子邮箱</label><input type="text" name="email" value="{{$email}}" readonly> </li>
                <li><label>出生日期</label><input type="text" name="birthday" value="{{$birthday}}" readonly></li>
                <li><label>民&nbsp;&nbsp;族</label><input type="text" name="nation" value="{{$nation}}" readonly></li>
                <li><label>籍&nbsp;&nbsp;贯</label><input type="text" name="origin" value="{{$origin}}" readonly></li>
                <li><label>婚姻状况</label><input type="text" name="marriage" value="@if($marriage ==0) 未婚 @else 已婚 @endif" readonly></li>
                <li><label>政治面貌</label><input type="text" name="politics" value="{{$politics}}" readonly></li>
                <li><label>学&nbsp;&nbsp;历</label><input type="text" name="education" value="{{$education}}" readonly></li>
                <li><label>专&nbsp;&nbsp;业</label><input type="text" name="major" value="{{$major}}" readonly></li>
                <li><label>毕业院校</label><input type="text" name="university" value="{{$university}}" readonly></li>
                <li><label>联系地址</label><input type="text" name="address" value="{{$address}}" readonly></li>
                <li><label>身份证号</label><input type="text" name="idcard" value="{{$idcard}}" readonly></li>
                <li><label>银行帐号</label><input type="text" name="bankaccount" value="{{$bankaccount}}" readonly></li>
                <li><label>注册时间</label><input type="text" name="created_at" value="{{$created_at}}" readonly></li>
            </ul>
            <button id="edit" type="button">编辑资料</button><button id="save" type="submit" style="display: none">保存</button>
        </section>

    </form>
</section>
<script>
    $("#edit").click(function (){
        $("li input").attr('style','background-color: #fff;');
        $("li input").removeAttr('readonly');
        $("#save").attr("style",'display:inline');
    })
</script>
</body>
</html>