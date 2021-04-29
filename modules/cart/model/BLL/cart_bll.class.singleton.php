<?php
   require MODEL_DAO_CART."cart_dao.class.singleton.php";
class cart_bll{
    private $dao;
    private $db;
    static $_instance;

    private function __construct()
    {
        $this->dao = cart_dao::getInstance();
        $this->db = db::getInstance();
    }
    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function showCart($arryArguments){
        return $this->dao->select_showCart($this->db,$arryArguments);
    }
    public function deleteCart($arryArguments){
        return $this->dao->delete_Cart($this->db,$arryArguments);
    }
    public function update_cantity($arryArguments){
        return $this->dao->update_cantity($this->db,$arryArguments);
    }
    public function less_cantity($arryArguments){
        return $this->dao->less_cantity($this->db,$arryArguments);
    }
    public function delete_item($arryArguments){
        return $this->dao->delete_item($this->db,$arryArguments);
    }
    public function insert_item($arryArguments){
        return $this->dao->insert_item($this->db,$arryArguments);
    }
}