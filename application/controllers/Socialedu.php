<?php
/**
 * Created by PhpStorm.
 * User: lucky
 * Date: 2016/12/31
 * Time: 22:33
 */
class SocialeduController extends Yaf_Controller_Abstract
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
    *社会教育列表
    */
    public function listAction(){
        $params = array();
        $this->getView()->make('socialedu.list',$params);
    }

    /*
     * 详情
     */
    public function SocialEduListAction(){
        header("Content-Type: text/html; charset=gb2312");
        $request = $this->getRequest();
        $subject = $request->getParam('subject', 1);
        $content = @file("upload/scoialedu/$subject.txt");

        echo "<div class='bjui-pageHeader ' style='background-color:#fff;position:relative; overflow:auto'>";

        if ($content)
            foreach ($content as $item) {
                echo $item . "<br>";
            }

        echo "</div>";
    }

    /*
     * 政治经济学
     */
    public function politicalEcoAction(){
        $params = array();
        $this->getView()->make('socialedu.politicalEco',$params);
    }

    /*
     * 天道
     */
    public function tiandaolistAction(){
        $params = array();
        $this->getView()->make('socialedu.tiandao.tiandaolist',$params);
    }

    /*
     * 卓有成效的管理者
     */
    public function effectivemanagelistAction(){
        $params = array();
        $this->getView()->make('socialedu.effectivemanage.effectivemanagelist',$params);
    }
}