<?php

/**
 * Created by PhpStorm.
 * User: 129
 * Date: 2017/4/21
 * Time: 17:06
 */
class StudyModel
{
    /**
     * 数据库类实例
     */
    public $dbh = null;

    public $mch = null;

    /**
     * Constructor
     */
    public function __construct($dbh, $mch = null)
    {
        $this->dbh = $dbh;
        $this->mch = $mch;
    }

    public function getStudylist($id){
        $params = array(
            'pageCurrent' => COMMON:: P(),
            'pageSize' => COMMON:: PR(),
        );
        $sql = "SELECT COUNT(*)  FROM `strongculture_system_user_study` WHERE user_sysno = $id AND status = 1 AND isdel = 0";
        $result = $params;
        $result['totalRow'] = $this->dbh->select_one($sql);
        $result['totalPage'] = ceil($result['totalRow'] / $params['pageSize']);
        $this->dbh->set_page_num($params['pageCurrent']);
        $this->dbh->set_page_rows($params['pageSize']);

        $sql = "SELECT * FROM strongculture_system_user_study WHERE user_sysno = $id AND status = 1 AND isdel = 0";
        $result['list'] = $this->dbh->select_page($sql);
        return $result;
    }

    public function getstudyById($id){
        $sql = "SELECT * FROM strongculture_system_user_study WHERE sysno = $id";
        return $this->dbh->select_row($sql);
    }

    public function addstudy($data){
        return $this->dbh->insert('strongculture_system_user_study', $data);
    }

    public function updatestudy($params,$id){
        return $this->dbh->update('strongculture_system_user_study', $params, 'sysno=' . intval($id));
    }

    public function delstudy($id){
        $params = array(
            'isdel'=>1
        );
        return $this->dbh->update('strongculture_system_user_study', $params, 'sysno=' . intval($id));
    }

}