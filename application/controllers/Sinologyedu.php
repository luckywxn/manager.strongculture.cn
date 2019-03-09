<?php
//header("Content-Type: text/html; charset=gb2312");
/**
 * Created by PhpStorm.
 * User: lucky
 * Date: 2017/2/26
 * Time: 11:15
 */
class SinologyeduController extends Yaf_Controller_Abstract
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
     * 课程汇总表
     */
    public function listAction(){
        $params = array();
        $this->getView()->make('sinologyedu.list',$params);
    }

    /*
     * 四书列表
     */
    public function sishulistAction(){
        $params = array();
        $this->getView()->make('sinologyedu.sishulist',$params);
    }

    /*
     * 五经列表
     */
    public function wujinglistAction(){
        $params = array();
        $this->getView()->make('sinologyedu.wujinglist',$params);
    }

    /*
     *各书详细信息
     */
    public function SinologylistAction()
    {
        header("Content-Type: text/html; charset=gb2312");
        $request = $this->getRequest();
        $subject = $request->getParam('subject', 1);
        $content = @file("upload/Sinology/$subject.txt");

        echo "<div class='bjui-pageHeader ' style='background-color:#c1b096;position:relative; overflow:auto'>";

        if ($content)
            foreach ($content as $item) {
                echo $item . "<br>";
            }

        echo "</div>";
    }

}