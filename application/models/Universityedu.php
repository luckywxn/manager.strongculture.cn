<?php

/**
 * Created by PhpStorm.
 * User: 129
 * Date: 2017/4/21
 * Time: 10:34
 */
class UniversityeduModel
{
    /**
     * 数据库类实例
     *
     * @var object
     */
    public $dbh = null;

    public $mch = null;

    /**
     * Constructor
     *
     * @param   object  $dbh
     * @return  void
     */
    public function __construct($dbh, $mch = null) {
        $this->dbh = $dbh;
        $this->mch = $mch;
    }

    public function getcitylist(){
        $sql = "SELECT * FROM strongculture_university_city WHERE status = 1 AND isdel = 0";
        return $this->dbh->select($sql);
    }

    public function getuniversitybycityid($id){
        $sql = "SELECT * FROM strongculture_universityedu WHERE city_sysno = $id AND status = 1 AND isdel = 0";
        return $this->dbh->select($sql);
    }

}