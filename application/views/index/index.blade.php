<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>强势文化学习系统</title>
    <link href="favicon.ico" mce_href="favicon.ico" rel="icon">
    <!-- bootstrap - css -->
    <link href="/static/BJUI/B-JUI/themes/css/bootstrap.css" rel="stylesheet">
    <!-- core - css -->
    <link href="/static/BJUI/B-JUI/themes/css/style.css" rel="stylesheet">
    <link href="/static/BJUI/B-JUI/themes/green/core.css" id="bjui-link-theme" rel="stylesheet">
    <link href="/static/BJUI/B-JUI/themes/css/fontsize.css" id="bjui-link-theme" rel="stylesheet">
    <!-- plug - css -->
    <link href="/static/BJUI/B-JUI/plugins/kindeditor_4.1.11/themes/default/default.css" rel="stylesheet">
    <link href="/static/BJUI/B-JUI/plugins/colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="/static/BJUI/B-JUI/plugins/nice-validator-1.0.7/jquery.validator.css" rel="stylesheet">
    <link href="/static/BJUI/B-JUI/plugins/bootstrapSelect/bootstrap-select.css" rel="stylesheet">
    <link href="/static/BJUI/B-JUI/plugins/webuploader/webuploader.css" rel="stylesheet">
    <link href="/static/BJUI/B-JUI/themes/css/FA/css/font-awesome.min.css" rel="stylesheet">
    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" href="/static/BJUI/assets/ico/apple-touch-icon-precomposed.png">
    <!-- <link rel="shortcut icon" href="/static/BJUI/assets/ico/favicon.png">
    -->
    <!--[if lte IE 7]>
    <link href="/static/BJUI/B-JUI/themes/css/ie7.css" rel="stylesheet">
    <![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lte IE 9]>
    <script src="/static/BJUI/B-JUI/other/html5shiv.min.js"></script>
    <script src="/static/BJUI/B-JUI/other/respond.min.js"></script>
    <![endif]-->
    <!-- jquery -->
    <script src="/static/BJUI/B-JUI/js/jquery-1.11.3.min.js"></script>
    <script src="/static/BJUI/B-JUI/js/jquery.cookie.js"></script>
    <!--[if lte IE 9]>
    <script src="/static/BJUI/B-JUI/other/jquery.iframe-transport.js"></script>
    <![endif]-->
    <!-- B-JUI -->
    <script src="/static/BJUI/B-JUI/js/bjui-all.js"></script>
    <script src="/static/BJUI/B-JUI/js/iconfont.js"></script>
    <!-- plugins -->
    <!-- swfupload for kindeditor -->
    <script src="/static/BJUI/B-JUI/plugins/swfupload/swfupload.js"></script>
    <!-- Webuploader -->
    <script src="/static/BJUI/B-JUI/plugins/webuploader/webuploader.js"></script>
    <!-- kindeditor -->
    <script src="/static/BJUI/B-JUI/plugins/kindeditor_4.1.11/kindeditor-all-min.js"></script>
    <script src="/static/BJUI/B-JUI/plugins/kindeditor_4.1.11/lang/zh-CN.js"></script>
    <!-- colorpicker -->
    <script src="/static/BJUI/B-JUI/plugins/colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- ztree -->
    <script src="/static/BJUI/B-JUI/plugins/ztree/jquery.ztree.all-3.5.js"></script>
    <!-- nice validate -->
    <script src="/static/BJUI/B-JUI/plugins/nice-validator-1.0.7/jquery.validator.js"></script>
    <script src="/static/BJUI/B-JUI/plugins/nice-validator-1.0.7/jquery.validator.themes.js"></script>
    <!-- bootstrap plugins -->
    <script src="/static/BJUI/B-JUI/plugins/bootstrap.min.js"></script>
    <script src="/static/BJUI/B-JUI/plugins/bootstrapSelect/bootstrap-select.min.js"></script>
    <script src="/static/BJUI/B-JUI/plugins/bootstrapSelect/defaults-zh_CN.min.js"></script>
    <!-- icheck -->
    <script src="/static/BJUI/B-JUI/plugins/icheck/icheck.min.js"></script>
    <!-- HighCharts -->
    <script src="/static/BJUI/B-JUI/plugins/highcharts/highcharts.js"></script>
    <script src="/static/BJUI/B-JUI/plugins/highcharts/highcharts-3d.js"></script>
    <script src="/static/BJUI/B-JUI/plugins/highcharts/themes/gray.js"></script>
    <!-- other plugins -->
    <script src="/static/BJUI/B-JUI/plugins/other/jquery.autosize.js"></script>
    <link href="/static/BJUI/B-JUI/plugins/uploadify/css/uploadify.css" rel="stylesheet">
    <script src="/static/BJUI/B-JUI/plugins/uploadify/scripts/jquery.uploadify.min.js"></script>
    <script src="/static/BJUI/B-JUI/plugins/download/jquery.fileDownload.js"></script>
    <script src="/static/BJUI/B-JUI/plugins/printarea/jquery.PrintArea.js"></script>
    <!-- init -->
    <script type="text/javascript">
        $(function() {
            BJUI.init({
                JSPATH       : '/static/BJUI/B-JUI/',         //[可选]框架路径
                PLUGINPATH   : '/static/BJUI/B-JUI/plugins/', //[可选]插件路径
                loginInfo    : {url:'/logintimeout', title:'登录', width:530, height:420}, // 会话超时后弹出登录对话框
                statusCode   : {ok:200, error:300, timeout:301}, //[可选]
                ajaxTimeout  : 300000, //[可选]全局Ajax请求超时时间(毫秒)
                alertTimeout : 3000,  //[可选]信息提示[info/correct]自动关闭延时(毫秒)
                pageInfo     : {total:'totalRow', pageCurrent:'pageCurrent', pageSize:'pageSize', orderField:'orderField', orderDirection:'orderDirection'}, //[可选]分页参数
                keys         : {statusCode:'statusCode', message:'message'}, //[可选]
                ui           : {
                    sidenavWidth     : 220,
                    showSlidebar     : true, //[可选]左侧导航栏锁定/隐藏
                    overwriteHomeTab : false //[可选]当打开一个未定义id的navtab时，是否可以覆盖主navtab(我的主页)
                },
                debug        : true,    // [可选]调试模式 [true|false，默认false]
                theme        : 'green' // 若有Cookie['bjui_theme'],优先选择Cookie['bjui_theme']。皮肤[五种皮肤:default, orange, purple, blue, red, green]
            })
            //时钟
            var today = new Date(), time = today.getTime()
            $('#bjui-date').html(today.formatDate('yyyy/MM/dd'))
            setInterval(function() {
                today = new Date(today.setSeconds(today.getSeconds() + 1))
                $('#bjui-clock').html(today.formatDate('HH:mm:ss'))
            }, 1000);
        })

        /*window.onbeforeunload = function(){
         return "确定要关闭本系统 ?";
         }*/

        //菜单-事件-zTree
        function MainMenuClick(event, treeId, treeNode) {
            if (treeNode.target && treeNode.target == 'dialog' || treeNode.target == 'navtab')
                event.preventDefault()

            if (treeNode.isParent) {
                var zTree = $.fn.zTree.getZTreeObj(treeId)

                zTree.expandNode(treeNode)
                return
            }

            if (treeNode.target && treeNode.target == 'dialog')
                $(event.target).dialog({id:treeNode.targetid, url:treeNode.url, title:treeNode.name})
            else if (treeNode.target && treeNode.target == 'navtab')
                $(event.target).navtab({id:treeNode.targetid, url:treeNode.url, title:treeNode.name, fresh:treeNode.fresh, external:treeNode.external})
        }

        // 满屏开关
        var bjui_index_container = 'container_fluid'

        function bjui_index_exchange() {
            bjui_index_container = bjui_index_container == 'container_fluid' ? 'container' : 'container_fluid'

            $('#bjui-top').find('> div').attr('class', bjui_index_container)
            $('#bjui-navbar').find('> div').attr('class', bjui_index_container)
            $('#bjui-body-box').find('> div').attr('class', bjui_index_container)
        }
    </script>
    <!-- highlight && ZeroClipboard -->
    <link href="/static/BJUI/assets/prettify.css" rel="stylesheet">
    <script src="/static/BJUI/assets/prettify.js"></script>
    <link href="/static/BJUI/assets/ZeroClipboard.css" rel="stylesheet">
    <script src="/static/BJUI/assets/ZeroClipboard.js"></script>
    <style type="text/css">
        html{height:100%}
        body{height:100%;margin:0px;padding:0px}
        #container{height:100%}
    </style>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=B00czeGnfjbEublWHKYG6YkAR2BkLRdf"></script>
</head>
<body>
    <!--[if lte IE 7]>
    <div id="errorie">
        <div>
            您还在使用老掉牙的IE，正常使用系统前请升级您的浏览器到 IE8以上版本
            <a target="_blank" href="http://windows.microsoft.com/zh-cn/internet-explorer/ie-8-worldwide-languages">点击升级</a>
            &nbsp;&nbsp;强烈建议您更改换浏览器：
            <a href="http://down.tech.sina.com.cn/content/40975.html" target="_blank">谷歌 Chrome</a>
        </div>
    </div>
    <![endif]-->
    <div id="bjui-top" class="bjui-header">
        <div class="container_fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapsenavbar" data-target="#bjui-top-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <nav class="collapse navbar-collapse" id="bjui-top-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="datetime">
                        <a>
                            <span id="bjui-date">0000/00/00</span>
                            <span id="bjui-clock">00:00:00</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">账号：{{ $user['username'] }}</a>
                    </li>
                    @if($role)
                    <li>
                    <a href="#">级别：{{ $role }}</a>
                    @endif
                </li>
                <li>
                    <a href="/index/changepassword" data-toggle="dialog" data-id="sys_user_changepass" data-mask="true" data-width="400" data-height="300">修改密码</a>
                </li>
                <li>
                    <a href="/index/logout" style="font-weight:bold;">
                        &nbsp; <i class="fa fa-power-off"></i>
                        注销登录
                    </a>
                </li>
        <li>
            <a href="javascript:;" onclick="bjui_index_exchange()" title="横向收缩/充满屏幕">
                <i class="fa fa-exchange"></i>
            </a>
        </li>
    </ul>
</nav>
</div>
</div>
<header class="navbar bjui-header" id="bjui-navbar">
<div class="container_fluid">
<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" id="bjui-navbar-collapsebtn" data-toggle="collapsenavbar" data-target="#bjui-navbar-collapse" aria-expanded="false">
        <i class="fa fa-angle-double-right"></i>
    </button>
    <a class="navbar-brand" href="/">
        <img src="/static/images/logogreen.png" height="52"></a>
</div>
<nav class="collapse navbar-collapse" id="bjui-navbar-collapse">
    <ul class="nav navbar-nav navbar-right" id="bjui-hnav-navbar">
        @foreach($navtab  as $key => $tab)
        <li @if($key == 0) class="active" @endif>
            <a href="/navtab/{{$tab['sysno']}}" data-toggle="sidenav" data-id-key="targetid">
                @if($tab['parentsysnoicon'] != '')
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="{{$tab['parentsysnoicon']}}"></use>
                </svg>
                @endif
                            {{$tab['privilegename']}}
            </a>
        </li>
        @endforeach
    </ul>
</nav>
</div>
</header>
<div id="bjui-body-box">
<div class="container_fluid" id="bjui-body">
<div id="bjui-sidenav-col">
    <div id="bjui-sidenav">
        <div id="bjui-sidenav-arrow" data-toggle="tooltip" data-placement="left" data-title="隐藏左侧菜单">
            <i class="fa fa-long-arrow-left"></i>
        </div>
        <div id="bjui-sidenav-box"></div>
    </div>
</div>
<div id="bjui-navtab" class="tabsPage">
    <div id="bjui-sidenav-btn" data-toggle="tooltip" data-title="显示左侧菜单" data-placement="right">
        <i class="fa fa-bars"></i>
    </div>
    <div class="tabsPageHeader">
        <div class="tabsPageHeaderContent">
            <ul class="navtab-tab nav nav-tabs">
                <li>
                    <a href="javascript:;">
                        <span>
                            <!-- <i class="fa fa-home"></i>
                        --> #maintab#
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="tabsLeft">
            <i class="fa fa-angle-double-left"></i>
        </div>
        <div class="tabsRight">
            <i class="fa fa-angle-double-right"></i>
        </div>
        <div class="tabsMore">
            <i class="fa fa-angle-double-down"></i>
        </div>
    </div>
    <ul class="tabsMoreList">
        <li>
            <a href="javascript:;">#maintab#</a>
        </li>
    </ul>
    <div class="navtab-panel tabsPageContent">
        <div class="navtabPage unitBox">
            {{--<div class="bjui-pageContent">--}}
                {{--<img src="upload/5489536.jpg" width="500">&nbsp;&nbsp;<img src="upload/timg.jpg" width="500">--}}
            {{--</div>--}}
            <div class="bjui-pageContent">
                <div id="container"></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/static/BJUI/B-JUI/other/ie10-viewport-bug-workaround.js"></script>

<script type="text/javascript">

    var map = new BMap.Map("container");          // 创建地图实例
    var centerpoint = new BMap.Point(102.386103,45.040329);  // 112.182089,31.102821创建点坐标103.506039,36.908364
    //编写自定义函数，创建去过的地方的标注
    function addMarker(point){
        // 创建图标对象
        var myIcon = new BMap.Icon("../../../upload/小红旗.png",new BMap.Size(23, 30),{anchor: new BMap.Size(2, 28)});
        // 创建标注对象并添加到地图
        var marker = new BMap.Marker(point,{icon:myIcon});
        map.addOverlay(marker);
    }

    //编写自定义函数，创建计划要去的地方的标注
    function addMarker2(point){
        // 创建图标对象
        var myIcon = new BMap.Icon("../../../upload/小绿旗.png ", new BMap.Size(23, 30),{anchor: new BMap.Size(2, 28)});
        // 创建标注对象并添加到地图
        var marker = new BMap.Marker(point,{icon:myIcon});
        map.addOverlay(marker);
    }
    // 创建地址解析器实例
    var myGeo = new BMap.Geocoder();
    // 将去过的地方的地址解析结果显示在地图上，并调整地图视野
    @if(!empty($travelhistory))
    @foreach($travelhistory as $item)
    myGeo.getPoint('{{$item}}', function(point){
        if (point) {
            addMarker(point);
        }
    }, '{{$item}}'.substring(0, 3));
    @endforeach
    @endif

    //将计划要去的地方的地址解析结果显示在地图上，并调整地图视野
    @if(!empty($travelplan))
    @foreach($travelplan as $item)
    myGeo.getPoint('{{$item}}', function(point){
        if (point) {
            addMarker2(point);
        }
    }, '{{$item}}'.substring(0, 3));
    @endforeach
    @endif

    map.addEventListener("click", function(e){
        // 根据坐标得到地址描述
        myGeo.getLocation(e.point, function(result){
            if (result){
                BJUI.alertmsg('info',result.address);
            }
        });
    });

    map.centerAndZoom(centerpoint, 6);                 // 初始化地图，设置中心点坐标和地图级别
    map.enableScrollWheelZoom();
    map.addControl(new BMap.ScaleControl());
    map.addControl(new BMap.NavigationControl());
    map.addControl(new BMap.OverviewMapControl());
    map.addControl(new BMap.MapTypeControl());
</script>
</body>
<script src="/static/BJUI/B-JUI/js/highlight.min.js"></script>
<script src="/static/BJUI/B-JUI/js/jquery-ui.js"></script>
<script src="/static/BJUI/B-JUI/js/raindrops.js"></script>

</html>