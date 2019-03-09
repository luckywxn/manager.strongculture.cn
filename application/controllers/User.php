<?php
/**
 * 用户信息
 * User: Administrator
 * Date: 2016/11/15 0015
 * Time: 17:09
 */


class UserController extends Yaf_Controller_Abstract
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

    /**
     * 用户中心
     */
    public function usercenterAction()
    {
        $params = array();
        $this->getView()->make('user.usercenter',$params);
    }

    /***
     * 个人资料
     */
    public function usereditAction()
    {
        $user = Yaf_Registry::get(SSN_VAR);
        $U = new UserModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        $A = new AttachmentModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        $user = $U ->getUserById($user['sysno']);
        $user['role'] = $U->getRoleByUserId($user['sysno']);
        $attach = $A->getAttachByMAS('user','userphoto',$user['sysno']);
        $user['photourl'] = $attach[0]['path'].'/'.$attach[0]['name'];
        $this->getView()->make('user.userinfo',$user);
    }

    /*
     * 旅游地图
     */
    public function travelmapAction(){
        $params = array();
        $S = new SystemModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        $T = new TravelModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        $params['user']  = Yaf_Registry::get(SSN_VAR);
        $params['navtab']  =  $S->getPrivilegeListByPidUid($params['user']['sysno'],0);

        $params['role'] = $S->getRoleByUserId($params['user']['sysno']);
        $travelplans =  $T->getTravellist2($params['user']['sysno'],2);
        $travelhistorys =  $T->getTravellist2($params['user']['sysno'],1);
        foreach($travelplans as $item){
            $params['travelplan'][] = $item['placename'];
        }
        foreach($travelhistorys as $item){
            $params['travelhistory'][] = $item['placename'];
        }

        $this->getView()->make('user.travelmap',$params);
    }

    /***
     * 添加新用户的操作
     */
    public function userNewJsonAction()
    {
        $request = $this->getRequest();
        $privileges = $request->getPost('role','');
        $U = new UserModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        $password = $request->getPost('userpwd','');
        $hash = password_hash($password, 1, ['cost' => 10]);

        $input = array(
            'username'      =>  $request->getPost('username',''),
            'userpwd'       =>  $hash,
            'employee_sysno'=>  $request->getPost('employee_sysno',''),
            'realname'      =>  $request->getPost('realname',''),
            'status'        =>  $request->getPost('status','1'),
            'isdel'         =>  $request->getPost('isdel','0'),
            'created_at'	=>'=NOW()',
            'updated_at'	=>'=NOW()'
        );

        switch ($id = $U->addUser($input,$privileges)) {
            case 'existence':
                COMMON::result(300,'账号已存在');
                break;
            case false:
                COMMON::result(300,'添加失败');
                break;                          
            default:
                $row = $U->getUserById($id);
                COMMON::result(200,'添加成功',$row);
                break;
        }

    }

    /**
     * 编辑用户
     */
    public function userEditJsonAction()
    {
        $request = $this->getRequest();
        $id = $request->getPost('id',0);
        $privileges = $request->getPost('role',"");
        if(!is_array($privileges)){
            $privileges = array(
                'role_sysno' =>$request->getPost('role',"")
            );
        }
        $U = new UserModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        $password = $request->getPost('userpwd','');
        $sex = $request->getPost('sex','');
        $marriage = $request->getPost('marriage','');
        $sex = ($sex=='男'?0:1);
        $marriage = ($marriage == '未婚'?0:1);
        if($password == '')
        {
            $input = array(
                'nickname'    =>  $request->getPost('nickname',''),
                'realname'      =>  $request->getPost('realname',''),
                'sex' => $sex,
                'telephone' => $request->getPost('telephone',''),
                'email' => $request->getPost('email',''),
                'birthday' => $request->getPost('birthday',''),
                'nation' => $request->getPost('nation',''),
                'origin' => $request->getPost('origin',''),
                'marriage' => $marriage,
                'politics' => $request->getPost('politics',''),
                'education' => $request->getPost('education',''),
                'major' => $request->getPost('major',''),
                'university' => $request->getPost('university',''),
                'address' => $request->getPost('address',''),
                'idcard' => $request->getPost('idcard',''),
                'bankaccount' => $request->getPost('bankaccount',''),
                'memo' => $request->getPost('memo',''),
                'status'        =>  $request->getPost('status','1'),
                'isdel'         =>  $request->getPost('isdel','0'),
                'updated_at'	=>'=NOW()'
            );
        }else{
            $hash = password_hash($password, 1, ['cost' => 10]);
            $input = array(
                'username'      =>  $request->getPost('username',''),
                'userpwd'       =>  $hash,
                'realname'      =>  $request->getPost('realname',''),
                'status'        =>  $request->getPost('status','1'),
                'isdel'         =>  $request->getPost('isdel','0'),
                'updated_at'	=>'=NOW()'
            );
        }

        if($U->updateUser($id,$input,$privileges)){
            $row = $U->getUserById($id);
            echo "<script>alert('更新成功');</script>";
            header("Location: /user/useredit");
            //COMMON::result(200,'更新成功',$row);
        }else{
            echo "<script>alert('更新成功');</script>";
            //COMMON::result(300,'更新失败');
        }
    }

    public function passwordEditJsonAction()
    {
        $request = $this->getRequest();
        $id = $request->getPost('id',0);
        if(!$id)
        {
            COMMON::result(300,'参数错误');
            return;
        }
        $privileges = "";
        $U = new UserModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));

        $oldpassword = $request->getPost('olduserpwd','');
        $newpassword = $request->getPost('newuserpwd','');

        $row = $U->getUserById($id);

        if(password_verify($oldpassword, $row['userpwd']))
        {
            
        }
        else
        {
            COMMON::result(300,'旧密码错误');
            return;
        }

        if(!$newpassword)
        {
            COMMON::result(300,'密码不能为空',$row);
            return;
        }
        $hash = password_hash($newpassword, 1, ['cost' => 10]);
        $input = array(
            'userpwd'       =>  $hash,
            'updated_at'    =>'=NOW()'
        );

        if($U->updateUser($id,$input,$privileges)){
            COMMON::result(200,'更新成功');
        }else{
            COMMON::result(300,'更新失败');
        }
    }

    public function travelhistoryAction(){
        $request = $this->getRequest();
        $params['type']=$request->getparam('type');
        $user = Yaf_Registry::get(SSN_VAR);
        $T = new TravelModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        $travelhistory = $T->getTravellist($user['sysno'],1);
        $params['travel'] = $travelhistory['list'];
        $this->getView()->make('user.travel',$params);
    }

    public function travelplanAction(){
        $request = $this->getRequest();
        $params['type']=$request->getparam('type');
        $user = Yaf_Registry::get(SSN_VAR);
        $T = new TravelModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        $travelplan = $T->getTravellist($user['sysno'],2);
        $params['travel'] = $travelplan['list'];
        $this->getView()->make('user.travel',$params);
    }

    public function addtraveljsonAction(){
        $user  = Yaf_Registry::get(SSN_VAR);
        $request = $this->getRequest();
        $input = array(
            'user_sysno'=>$user['sysno'],
            'placename'  =>  $request->getPost('placename',''),
            'plantime'       =>  $request->getPost('plantime',''),
            'memo'     =>  $request->getPost('memo',''),
            'planstatus'=> $request->getPost('type',''),
            'created_at'    =>'=NOW()',
            'updated_at'    =>'=NOW()'
        );

        $url = "";
        if($input['type']==1){
            $url = "Location: /user/travelhistory/type/1";
        }else{
            $url = "Location: /user/travelplan/type/2";
        }

        $T = new TravelModel(Yaf_Registry::get('db'),Yaf_Registry::get('mc'));
        if($id = $T->addtravel($input)){
            echo "<script>alert('更新成功');</script>";
            header($url);
        }else{
            echo "<script>alert('更新成功');</script>";
        }
    }

    public function studyAction(){
        $user = Yaf_Registry::get(SSN_VAR);
        $S = new StudyModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        $study = $S->getStudylist($user['sysno']);
        $params['study'] = $study['list'];
        $this->getView()->make('user.study',$params);
    }

    public function investAction(){
        $user = Yaf_Registry::get(SSN_VAR);
        $I = new InvestModel(Yaf_Registry :: get("db"), Yaf_Registry :: get('mc'));
        $invest = $I->getInvestlist($user['sysno']);
        $params['invest'] = $invest['list'];
        $this->getView()->make('user.invest',$params);
    }

}