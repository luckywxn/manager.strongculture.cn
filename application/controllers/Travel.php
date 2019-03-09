<?php

/**
 * Created by PhpStorm.
 * User: 129
 * Date: 2017/4/21
 * Time: 15:26
 */
class TravelController extends Yaf_Controller_Abstract
{
    /**
     * IndexController::init()
     */
    public function init()
    {
        # parent::init();
    }

    /**
     * 旅游历史表
     */
    public function historylistAction()
    {
        $params =  array();
        $this->getView()->make('travel.historylist',$params);
    }

    /**
     * 旅游历史表数据
     */
    public function travelhistorylistJsonAction(){
        $user  = Yaf_Registry::get(SSN_VAR);
        $T = new TravelModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        $list =  $T->getTravellist($user['sysno'],1);
        echo json_encode($list);
    }

    /**
     * 旅游历史表编辑显示页面
     */
    public function travelhistoryeditAction(){
        $request = $this->getRequest();
        $id = $request->getParam('id',0);

        $T = new TravelModel(Yaf_Registry::get('db'),Yaf_Registry::get('mc'));
        if(!$id){
            $action = "/travel/travelhistoryNewJson/";
            $params =  array ();
        } else {
            $action = "/travel/travelhistoryEditJson/";
            $params = $T->gettravelById($id,1);
        }

        $params['id'] = $id;
        $params['action'] =  $action;
        $this->getView()->make('travel.travelhistory',$params);
    }

    /**
     * 旅游历史表新建
     */
    public function travelhistoryNewJsonAction(){
        $user  = Yaf_Registry::get(SSN_VAR);
        $request = $this->getRequest();
        $input = array(
            'user_sysno'=>$user['sysno'],
            'placename'  =>  $request->getPost('placename',''),
            'plantime'       =>  $request->getPost('plantime',''),
            'memo'     =>  $request->getPost('memo',''),
            'planstatus'=>1,
            'created_at'    =>'=NOW()',
            'updated_at'    =>'=NOW()'
        );

        $T = new TravelModel(Yaf_Registry::get('db'),Yaf_Registry::get('mc'));
        if($id = $T->addtravel($input))
        {
            $row = $T->gettravelById($id,1);
            COMMON::result(200,'添加成功',$row);
        }else{

            COMMON::result(300,'添加失败');
        }
    }

    /**
     * 旅游历史表更新
     */
    public function travelhistoryEditJsonAction(){
        $request = $this->getRequest();
        $id = $request->getPost('id',0);
        $input = array(
            'placename'  =>  $request->getPost('placename',''),
            'plantime'       =>  $request->getPost('plantime',''),
            'memo'     =>  $request->getPost('memo',''),
            'updated_at'    =>'=NOW()'
        );
        $T = new TravelModel(Yaf_Registry::get('db'),Yaf_Registry::get('mc'));
        if($T->updatetravel($input,$id))
        {
            $row = $T->gettravelhistoryById($id,1);
            COMMON::result(200,'修改成功',$row);
        }else{
            COMMON::result(300,'修改失败');
        }
    }

    /**
     * 旅游历史表删除
     */
    public function travelhistorydeljsonAction()
    {
        $request = $this->getRequest();
        $id = $request->getPost('sysno',0);
        $T = new TravelModel(Yaf_Registry::get('db'),Yaf_Registry::get('mc'));
        if($T->deltravel($id))
        {
            COMMON::result(200,'删除成功');
        }else{
            COMMON::result(300,'删除失败');
        }
    }


    /**
     * **********************************旅游计划表**********************************************
     */
    public function planlistAction(){
        $params =  array();
        $this->getView()->make('travel.planlist',$params);
    }

    /**
     * 旅游计划表数据
     */
    public function travelplanlistJsonAction(){
        $user  = Yaf_Registry::get(SSN_VAR);
        $T = new TravelModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        $list =  $T->getTravellist($user['sysno'],2);
        echo json_encode($list);
    }

    /**
     * 旅游计划表编辑显示页面
     */
    public function travelplaneditAction(){
        $request = $this->getRequest();
        $id = $request->getParam('id',0);
        $T = new TravelModel(Yaf_Registry::get('db'),Yaf_Registry::get('mc'));
        if(!$id){
            $action = "/travel/travelplanNewJson/";
            $params =  array ();
        } else {
            $action = "/travel/travelplanEditJson/";
            $params = $T->gettravelById($id,2);
        }

        $params['id'] = $id;
        $params['action'] =  $action;
        $this->getView()->make('travel.travelplan',$params);
    }

    /**
     * 旅游计划表新建
     */
    public function travelplanNewJsonAction(){
        $user  = Yaf_Registry::get(SSN_VAR);
        $request = $this->getRequest();
        $input = array(
            'user_sysno'=>$user['sysno'],
            'placename'  =>  $request->getPost('placename',''),
            'plantime'       =>  $request->getPost('plantime',''),
            'memo'     =>  $request->getPost('memo',''),
            'planstatus'=>2,
            'created_at'    =>'=NOW()',
            'updated_at'    =>'=NOW()'
        );

        $T = new TravelModel(Yaf_Registry::get('db'),Yaf_Registry::get('mc'));
        if($id = $T->addtravel($input))
        {
            $row = $T->gettravelById($id,1);
            COMMON::result(200,'添加成功',$row);
        }else{

            COMMON::result(300,'添加失败');
        }
    }

    /**
     * 旅游计划表更新
     */
    public function travelplanEditJsonAction(){
        $request = $this->getRequest();
        $id = $request->getPost('id',0);
        $input = array(
            'placename'  =>  $request->getPost('placename',''),
            'plantime'       =>  $request->getPost('plantime',''),
            'memo'     =>  $request->getPost('memo',''),
            'updated_at'    =>'=NOW()'
        );
        $T = new TravelModel(Yaf_Registry::get('db'),Yaf_Registry::get('mc'));
        if($T->updatetravel($input,$id))
        {
            $row = $T->gettravelById($id,2);
            COMMON::result(200,'修改成功',$row);
        }else{
            COMMON::result(300,'修改失败');
        }
    }

    /**
     * 旅游计划表删除
     */
    public function travelplandeljsonAction()
    {
        $request = $this->getRequest();
        $id = $request->getPost('sysno',0);
        $T = new TravelModel(Yaf_Registry::get('db'),Yaf_Registry::get('mc'));
        if($T->deltravel($id))
        {
            COMMON::result(200,'删除成功');
        }else{
            COMMON::result(300,'删除失败');
        }
    }

}