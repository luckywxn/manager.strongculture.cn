<?php
/**
 * Created by PhpStorm.
 * User: lucky
 * Date: 2016/12/31
 * Time: 22:33
 */
class UniversityeduController extends Yaf_Controller_Abstract
{
    /**
     * IndexController::init()
     *
     * @return void
     */
    public function init()
    {
        # parent::init();
    }

    /*
    *大学城市列表
    */
    public function listAction(){
        $U = new UniversityeduModel(Yaf_Registry::get("db"),Yaf_Registry::get('mc'));
        $city = $U->getcitylist();
        $params['city'] = $city;
        $this->getView()->make('universityedu.list',$params);
    }

    /*
    *各城市大学列表
    */
    public function universitylistAction(){
        $request = $this->getRequest();
        $id = $request->getParam('id',0);
        $U = new UniversityeduModel(Yaf_Registry::get("db"),Yaf_Registry::get('mc'));
        $university = $U->getuniversitybycityid($id);
        $params['university'] = $university;
        $this->getView()->make('universityedu.universitylist',$params);
    }

    public function fudanmrchenlistAction()
    {
        $params = array();
        $this->getView()->make('universityedu.fudanmrchen.fudanmrchenlist', $params);
    }

    public function secondmryanglistAction()
    {
        $params = array();
        $this->getView()->make('universityedu.secondmryang.secondmryanglist', $params);
    }
}