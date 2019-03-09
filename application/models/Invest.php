<?php

/**
 * Created by PhpStorm.
 * User: 129
 * Date: 2017/4/21
 * Time: 17:19
 */
class InvestModel
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

    public function getInvestlist($id){
        $params = array(
            'pageCurrent' => COMMON:: P(),
            'pageSize' => COMMON:: PR(),
        );
        $sql = "SELECT COUNT(*)  FROM `strongculture_system_user_invest` WHERE user_sysno = $id AND status = 1 AND isdel = 0";
        $result = $params;
        $result['totalRow'] = $this->dbh->select_one($sql);
        $result['totalPage'] = ceil($result['totalRow'] / $params['pageSize']);
        $this->dbh->set_page_num($params['pageCurrent']);
        $this->dbh->set_page_rows($params['pageSize']);

        $sql = "SELECT * FROM strongculture_system_user_invest WHERE user_sysno = $id AND status = 1 AND isdel = 0";
        $result['list'] = $this->dbh->select_page($sql);
        return $result;
    }

    public function getinvestById($id){
        $sql = "SELECT * FROM strongculture_system_user_invest WHERE sysno = $id";
        return $this->dbh->select_row($sql);
    }

    public function addinvest($data){
        return $this->dbh->insert('strongculture_system_user_invest', $data);
    }

    public function updateinvest($params,$id){
        return $this->dbh->update('strongculture_system_user_invest', $params, 'sysno=' . intval($id));
    }

    public function delinvest($id){
        $params = array(
            'isdel'=>1
        );
        return $this->dbh->update('strongculture_system_user_invest', $params, 'sysno=' . intval($id));
    }


}