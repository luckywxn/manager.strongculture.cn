<?php
/**
 * Created by PhpStorm.
 * User: lucky
 * Date: 2017/1/3
 * Time: 21:02
 */
class HighschooleduController  extends Yaf_Controller_Abstract
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
    *高中年级列表
    */
    public function listAction(){
        $params = array();
        $this->getView()->make('highschooledu.list',$params);
    }

    /*
     * 科目汇总表
     */
    public function subjectlistAction(){
        $request = $this->getRequest();
        $grade = $request->getParam('grade', 1);
        $params = array(
            'grade'=>$grade
        );
        $this->getView()->make('highschooledu.subjectlist',$params);
    }

    public function highschoollistAction(){
        header("Content-Type: text/html; charset=gb2312");
        $request = $this->getRequest();
        $id = $request->getParam('grade', 1);
        switch($id){
            case '1.1.1':
            case '1.1.2':
            case '1.1.3':
            case '1.1.4':
            case '1.1.5':
            case '1.1.6':
            case '1.1.7':
            case '1.1.8':
            case '1.1.9':
            case '1.2.1':
            case '1.2.2':
            case '1.2.3':
            case '1.2.4':
            case '1.2.5':
            case '1.2.6':
            case '1.2.7':
            case '1.2.8':
            case '1.2.9':$grade="grade1";break;

            case '2.1.1':
            case '2.1.2':
            case '2.1.3':
            case '2.1.4':
            case '2.1.5':
            case '2.1.6':
            case '2.1.7':
            case '2.1.8':
            case '2.1.9':
            case '2.2.1':
            case '2.2.2':
            case '2.2.3':
            case '2.2.4':
            case '2.2.5':
            case '2.2.6':
            case '2.2.7':
            case '2.2.8':
            case '2.2.9':$grade="grade2";break;

            case '3.1.1':
            case '3.1.2':
            case '3.1.3':
            case '3.1.4':
            case '3.1.5':
            case '3.1.6':
            case '3.1.7':
            case '3.1.8':
            case '3.1.9':
            case '3.2.1':
            case '3.2.2':
            case '3.2.3':
            case '3.2.4':
            case '3.2.5':
            case '3.2.6':
            case '3.2.7':
            case '3.2.8':
            case '3.2.9':$grade="grade3";break;
        }

        $content = file("upload/highschool/$grade/$id.txt");
        $params = array(
            'grade'=>$grade,
            'id'=>$id,
            'content'=>$content
        );

        echo "<div class='bjui-pageHeader ' style='background-color:#fff;position:relative; overflow:auto'>
                <br>
                <p style='text-align:center'><img src='../../../upload/highschool/$grade/$id.jpg'></p>
                <br><br>";

        foreach ($content as $item) {
            echo $item."<br>";
        }

        echo "</div>";

    }


}