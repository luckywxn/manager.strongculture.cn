<?php

/**
 * Created by PhpStorm.
 * User: lucky
 * Date: 2017/1/1
 * Time: 22:02
 */
class PrimarySchoolEduController extends Yaf_Controller_Abstract
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
    *语文
    */
    public function primaryschooledulistAction(){
        $request = $this->getRequest();
        $id = $request->getParam('grade', 1);
        switch($id){
            case 1.1:$grade="firstgrade";break;
            case 1.2:$grade="firstgrade";break;
            case 2.1:$grade="secondgrade";break;
            case 2.2:$grade="secondgrade";break;
            case 3.1:$grade="grade3";break;
            case 3.2:$grade="grade3";break;
            case 4.1:$grade="grade4";break;
            case 4.2:$grade="grade4";break;
            case 5.1:$grade="grade5";break;
            case 5.2:$grade="grade5";break;
            case 6.1:$grade="grade6";break;
            case 6.2:$grade="grade6";break;
        }
        $params = array(
            'grade'=>$grade,
            'id'=>$id
        );
        $this->getView()->make('primaryschooledu.primaryschooledulist',$params);
    }

    /*
   *数学
   */
    public function primaryschooledulist2Action(){
        $request = $this->getRequest();
        $id = $request->getParam('grade', 1.1);
        switch($id){
            case 1.3:$grade="firstgrade";break;
            case 1.4:$grade="firstgrade";break;
            case 2.3:$grade="secondgrade";break;
            case 2.4:$grade="secondgrade";break;
            case 3.3:$grade="grade3";break;
            case 3.4:$grade="grade3";break;
            case 4.3:$grade="grade4";break;
            case 4.4:$grade="grade4";break;
            case 5.3:$grade="grade5";break;
            case 5.4:$grade="grade5";break;
            case 6.3:$grade="grade6";break;
            case 6.4:$grade="grade6";break;
        }
        $params = array(
            'grade'=>$grade,
            'id'=>$id
        );
        $this->getView()->make('primaryschooledu.primaryschooledulist2',$params);
    }

}