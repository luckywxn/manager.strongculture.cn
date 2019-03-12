<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2019/3/11
 * Time: 11:59
 */

class SupplierController extends Yaf_Controller_Abstract {

    /**
     * IndexController::init()
     * @return void
     */
    public function init() {
        # parent::init();
        $user  = Yaf_Registry::get(SSN_VAR);
    }

    /**
     * 显示供应商页面
     * @return string
     */
    public function listAction() {
        $params =  array();
        $this->getView()->make('supplier.list',$params);
    }

    /**
     * 查询供应商数据
     */
    public function supplierListJsonAction(){
        $request = $this->getRequest();
        $search = array(
            'pageSize' => COMMON::PR(),
            'pageCurrent' => COMMON::P(),
            'companyabbreviation' => $request->getPost('companyabbreviation',''),
            'companycreditcode' => $request->getPost('companycreditcode',''),
            'status' => $request->getPost('status','')
        );

        $S = new SupplierModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        $params =  $S->searchSupplier($search);
        echo json_encode($params);
    }

    /**
     * 显示供应商编辑页面
     */
    public function suppliereditAction(){
        $request = $this->getRequest();
        $id = $request->getParam('id',0);
        $S = new SupplierModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));

        if(!$id){
            $action = "/supplier/supplierNewJson/";
            $params =  array ();
        } else {
            $action = "/supplier/supplierEditJson/";

            $params = $S->getSupplierById($id);
        }
        $params['id'] =  $id;
        $params['action'] =  $action;

        $this->getView()->make('supplier.edit',$params);
    }

    /**
     * 添加供应商
     */
    public function supplierNewJsonAction(){
        $request = $this->getRequest();
        $S = new SupplierModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        $input = array(
            'companyname'      =>  $request->getPost('companyname',''),
            'companyabbreviation'       =>  $request->getPost('companyabbreviation',''),
            'companycreditcode'      =>  $request->getPost('companycreditcode',''),
            'companyrepresentative'      =>  $request->getPost('companyrepresentative',''),
            'companyaddress'      =>  $request->getPost('companyaddress',''),
            'companybank'      =>  $request->getPost('companybank',''),
            'companyaccount'      =>  $request->getPost('companyaccount',''),
            'bankaddress'      =>  $request->getPost('bankaddress',''),
            'companytelephone'      =>  $request->getPost('companytelephone',''),
            'companyfax'      =>  $request->getPost('companyfax',''),
            'status'        =>  $request->getPost('status','1'),
            'isdel'         =>  $request->getPost('isdel','0'),
            'created_at'	=>'=NOW()'
        );

        if($S->addSupplier($input)){
            COMMON::result(200,'添加成功');
        }else{
            COMMON::result(300,'添加失败');
        }

    }

    /**
     * 编辑供应商
     */
    public function supplierEditJsonAction(){
        $request = $this->getRequest();
        $id = $request->getPost('id',0);
        $S = new SupplierModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        $input = array(
            'companyname'      =>  $request->getPost('companyname',''),
            'companyabbreviation'       =>  $request->getPost('companyabbreviation',''),
            'companycreditcode'      =>  $request->getPost('companycreditcode',''),
            'companyrepresentative'      =>  $request->getPost('companyrepresentative',''),
            'companyaddress'      =>  $request->getPost('companyaddress',''),
            'companybank'      =>  $request->getPost('companybank',''),
            'companyaccount'      =>  $request->getPost('companyaccount',''),
            'bankaddress'      =>  $request->getPost('bankaddress',''),
            'companytelephone'      =>  $request->getPost('companytelephone',''),
            'companyfax'      =>  $request->getPost('companyfax',''),
            'status'        =>  $request->getPost('status','1'),
            'isdel'         =>  $request->getPost('isdel','0'),
            'created_at'	=>'=NOW()',
            'updated_at'	=>'=NOW()'
        );

        if($S->updateSupplier($id,$input)){
            $row = $S->getSupplierById($id);
            COMMON::result(200,'更新成功',$row);
        }else{
            COMMON::result(300,'更新失败');
        }
    }

    /**
     * 删除供应商
     */
    public function supplierdeljsonAction(){
        $request = $this->getRequest();
        $id = $request->getPost('sysno',0);
        $S = new SupplierModel(Yaf_Registry::get("db"),Yaf_Registry::get('mc'));
        $input = array(
            'isdel'         =>  1,
            'updated_at'	=>'=NOW()'
        );
        if($S->updateSupplier($id,$input))
        {
            $row = $S->getSupplierById($id);
            COMMON::result(200,'删除成功',$row);
        }else{
            COMMON::result(300,'删除失败');
        }
    }


}