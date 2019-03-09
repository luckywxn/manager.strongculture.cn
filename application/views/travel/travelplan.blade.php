<script src="/static/common/js/custom.js"></script>
<div class="bjui-pageContent">
    <div class="bs-example">
        <form action="{{$action}}" class="datagrid-edit-form" data-toggle="validate" data-data-type="json">
            <input type="hidden" name="id" value="{{$sysno}}">
            <div class="bjui-row col-2">
                <label class="row-label">旅游地</label>
                <div class="row-input required">
                    <input type="text" name="placename" value="{{$placename}}"  data-rule="required;">
                </div>

                <label class="row-label">计划时间</label>
                <div class="row-input required ">
                    <input type="text" name="plantime" value="@if($plantime){{$plantime}}@else{{date('Y-m-d')}}@endif"; data-rule="required;date" data-toggle="datepicker">
                </div>

                <label class="row-label">备注</label>
                <div class="row-input">
                    <textarea name="memo">{{$memo}}</textarea>
                </div>

                <label class="row-label">状态</label>
                <div class="row-input required">
                    <input type="radio" name="status"  data-toggle="icheck" value="1" data-rule="checked" data-label="启用&nbsp;&nbsp;" @if( !$status || $status ==1) checked @endif>
                    <input type="radio" name="status"  data-toggle="icheck" value="2" data-label="停用" @if($status ==2) checked @endif>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="bjui-pageFooter">
    <ul>
        <li><button type="submit" class="btn-green" data-icon="save">保存</button></li>
        <li><button type="button" class="btn-close" data-icon="close">取消</button></li>
    </ul>
</div>
