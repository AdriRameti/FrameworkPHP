<?php
   require MODEL_DAO_LOGIN."login_dao.class.singleton.php";
class login_bll{
    private $dao;
    private $db;
    static $_instance;

    private function __construct()
    {
        $this->dao = login_dao::getInstance();
        $this->db = db::getInstance();
    }
    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function show_View(){
        return $this->dao->select_View($this->db);
    }
    public function register($arryArguments){
        return $this->dao->insert_user($this->db,$arryArguments);
    }
    public function login($arryArguments){
        return $this->dao->select_user($this->db,$arryArguments);
    }
}