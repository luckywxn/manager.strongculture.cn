<?php

/**
 * Created by PhpStorm.
 * User: lucky
 * Date: 2017/1/1
 * Time: 22:02
 */
class ShschooleduController extends Yaf_Controller_Abstract
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
    * 阿房宫赋
    */
    public function afanggonglistAction(){
        $params = array();
        $this->getView()->make('shschooledu.shschoolone.afanggonglist',$params);
    }

}