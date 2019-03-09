<?php

/**
 * Created by PhpStorm.
 * User: 129
 * Date: 2017/4/21
 * Time: 17:04
 */
class StudyController extends Yaf_Controller_Abstract
{
    /**
     * IndexController::init()
     */
    public function init()
    {
        # parent::init();
    }

    /**
     * 学习成绩表
     */
    public function listAction()
    {
        $params =  array();
        $this->getView()->make('study.list',$params);
    }

    /**
     * 学习成绩表数据
     */
    public function studylistJsonAction(){
        $S = new StudyModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        $list =  $S->getStudylist(1);
        echo json_encode($list);
    }

    /**
     * 学习表编辑显示页面
     */
    public function studyeditAction(){
        $request = $this->getRequest();
        $id = $request->getParam('id',0);

        $S = new StudyModel(Yaf_Registry::get('db'),Yaf_Registry::get('mc'));
        if(!$id){
            $action = "/study/studyNewJson/";
            $params =  array ();
        } else {
            $action = "/study/studyEditJson/";
            $params = $S->getstudyById($id);
        }

        $params['id'] = $id;
        $params['action'] =  $action;
        $this->getView()->make('study.studyedit',$params);
    }

    /**
     * 学习表新建
     */
    public function studyNewJsonAction(){
        $request = $this->getRequest();
        $input = array(
            'user_sysno'=>1,
            'grade'  =>  $request->getPost('grade',''),
            'subject'       =>  $request->getPost('subject',''),
            'score'       =>  $request->getPost('score',''),
            'memo'     =>  $request->getPost('memo',''),
            'created_at'    =>'=NOW()',
            'updated_at'    =>'=NOW()'
        );

        $S = new StudyModel(Yaf_Registry::get('db'),Yaf_Registry::get('mc'));
        if($id = $S->addstudy($input))
        {
            $row = $S->getstudyById($id);
            COMMON::result(200,'添加成功',$row);
        }else{

            COMMON::result(300,'添加失败');
        }
    }

    /**
     * 学习表更新
     */
    public function studyEditJsonAction(){
        $request = $this->getRequest();
        $id = $request->getPost('id',0);
        $input = array(
            'grade'  =>  $request->getPost('grade',''),
            'subject'       =>  $request->getPost('subject',''),
            'score'       =>  $request->getPost('score',''),
            'memo'     =>  $request->getPost('memo',''),
            'updated_at'    =>'=NOW()'
        );
        $S = new StudyModel(Yaf_Registry::get('db'),Yaf_Registry::get('mc'));
        if($S->updatestudy($input,$id))
        {
            $row = $S->getstudyById($id);
            COMMON::result(200,'修改成功',$row);
        }else{
            COMMON::result(300,'修改失败');
        }
    }

    /**
     * 学习表删除
     */
    public function studydeljsonAction()
    {
        $request = $this->getRequest();
        $id = $request->getPost('sysno',0);

        $S = new StudyModel(Yaf_Registry::get('db'),Yaf_Registry::get('mc'));
        if($S->delstudy($id))
        {
            COMMON::result(200,'删除成功');
        }else{
            COMMON::result(300,'删除失败');
        }
    }

}