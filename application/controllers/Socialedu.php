<?php
header("Content-Type: text/html; charset=gb2312");
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
     *
     */
    public function SocialEduListAction(){
        $request = $this->getRequest();
        $subject = $request->getParam('subject', 1);
        $content = @file("upload/scoialedu/$subject.txt");

        echo "<div class='bjui-pageHeader ' style='background-color:#fff;height:850px;position:relative; overflow:auto'>";

        if ($content)
            foreach ($content as $item) {
                echo $item . "<br>";
            }

        echo "</div>";
    }

}