<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="bjui-pageHeader " style="background-color:red;color: #000;height:550px;position:relative; overflow:auto">
    <br>
    <p style='text-align:center'><img src="upload/middleschool/{{$grade}}/{{$id}}.jpg"></p>
    <br><br>    {{count($content)}}
    <br><br>    @foreach($content as $item) {{count($item) }} <br> @endforeach
</div>