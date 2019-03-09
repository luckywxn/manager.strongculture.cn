<?php

/**
 * Created by PhpStorm.
 * User: 129
 * Date: 2017/4/21
 * Time: 17:19
 */
class InvestController extends Yaf_Controller_Abstract
{
    /**
     * IndexController::init()
     */
    public function init()
    {
        # parent::init();
    }

    /**
     * 投资回报表
     */
    public function listAction()
    {
        $params =  array();
        $this->getView()->make('invest.list',$params);
    }

    /**
     * 投资回报表数据
     */
    public function investlistJsonAction(){
        $I = new InvestModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        $list =  $I->getInvestlist(1);
        echo json_encode($list);
    }

    /**
     * 投资回报表编辑显示页面
     */
    public function investeditAction(){
        $request = $this->getRequest();
        $id = $request->getParam('id',0);

        $I = new InvestModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        if(!$id){
            $action = "/invest/investNewJson/";
            $params =  array ();
        } else {
            $action = "/invest/investEditJson/";
            $params = $I->getinvestById($id);
        }

        $params['id'] = $id;
        $params['action'] =  $action;
        $this->getView()->make('invest.investedit',$params);
    }

    /**
     * 投资回报表新建
     */
    public function investNewJsonAction(){
        $request = $this->getRequest();
        $input = array(
            'user_sysno'=>1,
            'projectname'  =>  $request->getPost('projectname',''),
            'firstamount'       =>  $request->getPost('firstamount',''),
            'firsttime'       =>  $request->getPost('firsttime',''),
            'lastamount'  =>  $request->getPost('lastamount',''),
            'lasttime'       =>  $request->getPost('lasttime',''),
            'memo'     =>  $request->getPost('memo',''),
            'created_at'    =>'=NOW()',
            'updated_at'    =>'=NOW()'
        );

        $I = new InvestModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        if($id = $I->addinvest($input))
        {
            $row = $I->getinvestById($id);
            COMMON::result(200,'添加成功',$row);
        }else{

            COMMON::result(300,'添加失败');
        }
    }

    /**
     * 投资回报表更新
     */
    public function investEditJsonAction(){
        $request = $this->getRequest();
        $id = $request->getPost('id',0);
        $input = array(
            'projectname'  =>  $request->getPost('projectname',''),
            'firstamount'       =>  $request->getPost('firstamount',''),
            'firsttime'       =>  $request->getPost('firsttime',''),
            'lastamount'  =>  $request->getPost('lastamount',''),
            'lasttime'       =>  $request->getPost('lasttime',''),
            'updated_at'    =>'=NOW()'
        );
        $I = new InvestModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        if($I->updateinvest($input,$id))
        {
            $row = $I->getinvestById($id);
            COMMON::result(200,'修改成功',$row);
        }else{
            COMMON::result(300,'修改失败');
        }
    }

    /**
     * 投资回报表删除
     */
    public function investdeljsonAction()
    {
        $request = $this->getRequest();
        $id = $request->getPost('sysno',0);

        $I = new InvestModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        if($I->delinvest($id))
        {
            COMMON::result(200,'删除成功');
        }else{
            COMMON::result(300,'删除失败');
        }
    }

}