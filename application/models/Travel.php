<?php

/**
 * Created by PhpStorm.
 * User: 129
 * Date: 2017/4/21
 * Time: 15:28
 */
class TravelModel
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

    public function getTravellist($id,$type){
        $params = array(
            'pageCurrent' => COMMON:: P(),
            'pageSize' => COMMON:: PR(),
        );
        $sql = "SELECT COUNT(*)  FROM `strongculture_system_user_travelplan` WHERE user_sysno = $id AND planstatus = $type AND status = 1 AND isdel = 0";
        $result = $params;
        $result['totalRow'] = $this->dbh->select_one($sql);
        $result['totalPage'] = ceil($result['totalRow'] / $params['pageSize']);
        $this->dbh->set_page_num($params['pageCurrent']);
        $this->dbh->set_page_rows($params['pageSize']);

        $sql = "SELECT * FROM strongculture_system_user_travelplan WHERE user_sysno = $id AND planstatus = $type AND status = 1 AND isdel = 0";
        $result['list'] = $this->dbh->select_page($sql);
        return $result;
    }

    public function getTravellist2($id,$type){
        $sql = "SELECT placename FROM strongculture_system_user_travelplan WHERE user_sysno = $id AND planstatus = $type AND status = 1 AND isdel = 0";
        $result = $this->dbh->select($sql);
        return $result;
    }

    public function gettravelById($id,$type){
        $sql = "SELECT * FROM strongculture_system_user_travelplan WHERE sysno = $id AND planstatus = $type";
        return $this->dbh->select_row($sql);
    }

    public function addtravel($data){
        return $this->dbh->insert('strongculture_system_user_travelplan', $data);
    }

    public function updatetravel($params,$id){
        return $this->dbh->update('strongculture_system_user_travelplan', $params, 'sysno=' . intval($id));
    }

    public function deltravel($id){
        $params = array(
            'isdel'=>1
        );
        return $this->dbh->update('strongculture_system_user_travelplan', $params, 'sysno=' . intval($id));
    }

}