<?php
header("Content-Type: text/html; charset=gb2312");
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
     *国学详情
     */
    public function SinologylistAction()
    {
        $request = $this->getRequest();
        $subject = $request->getParam('subject', 1);
        $content = @file("upload/Sinology/$subject.txt");

        echo "<div class='bjui-pageHeader ' style='background-color:#fff;height:850px;position:relative; overflow:auto'>";

        if ($content)
            foreach ($content as $item) {
                echo $item . "<br>";
            }

        echo "</div>";
    }

}