<div class="bjui-pageHeader " style="background-color:#fefefe; border-bottom:none;padding: 0;">
    <form data-toggle="ajaxsearch" data-options="{searchDatagrid:$.CurrentNavtab.find('#supplierlist-table')}">
        <fieldset>
            <legend style="font-weight:normal;">高级搜索</legend>
            <div class="bjui-row col-4">
                <label class="row-label">供应商简称</label>
                <div class="row-input">
                    <input type="text" name="companyabbreviation" value="{{$companyabbreviation or ''}}" placeholder="供应商简称">
                </div>
                <label class="row-label">社会信用代码</label>
                <div class="row-input">
                    <input type="text" name="companycreditcode" value="{{$companycreditcode or ''}}" placeholder="社会信用代码">
                </div>
                <label class="row-label">状态</label>
                <div class="row-input">
                    <select data-toggle="selectpicker" data-width="100%" name="status">
                        <option value="" selected="">不限</option>
                        <option value="1" >启用</option>
                        <option value="2">停用</option>
                    </select>
                </div>
                <div class="row-input">
                    <div class="btn-group">
                        <button type="submit" class="btn-green" data-icon="search">开始搜索</button>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<div class="bjui-pageContent clearfix">
    <table class="table table-bordered" id="supplierlist-table" data-toggle="datagrid" data-options="{
        tableWidth:'99%',
        height: '100%',
        gridTitle : '',
        showToolbar: true,
        toolbarItem: 'add,|,edit,|,del,|,refresh',
        dataUrl: 'supplier/supplierListJson',
        dataType: 'json',
        jsonPrefix: 'obj',
        editMode: {dialog:{width:'600',height:'500',title:'供应商管理',mask:true}},
        editUrl: '/supplier/supplieredit/id/{sysno}',
        delUrl:'/supplier/supplierdeljson',
        delPK:'sysno',
        paging: {pageSize:10},
        showCheckboxcol: false,
        linenumberAll: true,
        filterThead:false,
        showLinenumber:true
    }">
        <thead>
            <tr data-options="{name:'sysno'}">
                <th data-options="{name:'companyname',align:'center'}">供应商名称</th>
                <th  data-options="{name:'companyabbreviation',align:'center'}">供应商简称</th>
                <th  data-options="{name:'companycreditcode',align:'center'}">社会信用代码</th>
                <th  data-options="{name:'companyrepresentative',align:'center'}">法人代表</th>
                <th  data-options="{name:'companyaddress',align:'center'}">供应商地址</th>
                <th data-options="{name:'created_at',align:'center',type:'date',pattern:'yyyy-MM-dd HH:mm'}">创建时间</th>
                <th data-options="{name:'updated_at',align:'center',type:'date',pattern:'yyyy-MM-dd HH:mm'}">修改时间</th>
                <th data-options="{name:'status',align:'center',render:function(value){return value =='1' ? '启用' : '停用'}}">状态</th>
            </tr>
        </thead>
    </table>
</div>