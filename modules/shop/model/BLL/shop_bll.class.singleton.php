<?php
   require MODEL_DAO_SHOP."shop_dao.class.singleton.php";
class shop_bll{
    private $dao;
    private $db;
    static $_instance;

    private function __construct()
    {
        $this->dao = shop_dao::getInstance();
        $this->db = db::getInstance();
    }
    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function show($arryArguments){
        return $this->dao->select_show($this->db,$arryArguments);
    }
    public function countProds($arryArguments){
        return $this->dao->select_countProds($this->db,$arryArguments);
    }
    public function details($arryArguments){
        return $this->dao->select_details($this->db,$arryArguments);
    }
    public function filters($arryArguments){
        return $this->dao->select_filters($this->db,$arryArguments);
    }
    public function search($arryArguments){
        return $this->dao->select_search($this->db,$arryArguments);
    }
    public function showLikes($arryArguments){
        return $this->dao->select_showLikes($this->db,$arryArguments);
    }
    public function favorites($arryArguments){
        return $this->dao->insert_favorites($this->db,$arryArguments);
    }
}