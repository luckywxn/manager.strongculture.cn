<script src="/static/common/js/custom.js"></script>
<div class="bjui-pageContent">
    <div class="bs-example">
        <form action="{{$action}}" class="datagrid-edit-form" data-toggle="validate" data-data-type="json">
            <input type="hidden" name="id" value="{{$id}}">
            <div class="bjui-row col-1">
                <label class="row-label">供应商名称</label>
                <div class="row-input required">
                    <input type="text" name="companyname" value="{{$companyname}}" data-rule="required">
                </div>
                <label class="row-label">供应商简称</label>
                <div class="row-input">
                    <input type="text" name="companyabbreviation" value="{{$companyabbreviation}}" data-rule='required'>
                </div>
                <label class="row-label">社会信用代码</label>
                <div class="row-input required">
                    <input type="text"  name="companycreditcode" value="{{$companycreditcode}}"  data-rule='required'>
                </div>
                <label class="row-label">法人代表</label>
                <div class="row-input required">
                    <input type="text" name="companyrepresentative" value="{{$companyrepresentative}}"  data-rule='required'>
                </div>
                <label class="row-label">供应商地址</label>
                <div class="row-input">
                    <input type="text" name="companyaddress" value="{{$companyaddress}}">
                </div>
                <label class="row-label">开户银行</label>
                <div class="row-input">
                    <input type="text" name="companybank" value="{{$companybank}}">
                </div>
                <label class="row-label">开户账号</label>
                <div class="row-input">
                    <input type="text" name="companyaccount" value="{{$companyaccount}}"  >
                </div>
                <label class="row-label">支行地址</label>
                <div class="row-input">
                    <input type="text" name="bankaddress" value="{{$bankaddress}}"  >
                </div>
                <label class="row-label">客户电话</label>
                <div class="row-input">
                    <input type="text" name="companytelephone" value="{{$companytelephone}}" >
                </div>
                <label class="row-label">传真</label>
                <div class="row-input">
                    <input type="text" name="companyfax" value="{{$companyfax}}" >
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
        <li><button type="button" class="btn-close" data-icon="close">取消</button></li>
        <li><button type="submit" class="btn-green" data-icon="save">保存</button></li>
    </ul>
</div>