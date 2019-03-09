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
    <style type="text/css">
        html{height:100%}
        body{height:100%;margin:0px;padding:0px}
        #container{height:100%}
    </style>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=B00czeGnfjbEublWHKYG6YkAR2BkLRdf"></script>
</head>
<body>
<div id="container"></div>
</body>

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
</html>