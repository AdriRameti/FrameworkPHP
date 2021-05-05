<?php
    require MODEL_BLL_LOGIN."login_bll.class.singleton.php";
class login_model {

    private $bll;
    static $_instance;

    private function __construct(){
        $this->bll = login_bll::getInstance();
    }
    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function show_View($arryArguments){
        return $this->bll->show_View($arryArguments);
    }
    public function register($arryArguments){
        return $this->bll->register($arryArguments);
    }
    public function login($arryArguments){
        return $this->bll->login($arryArguments);
    }
    public function menu($arryArguments){
        return $this->bll->menu($arryArguments);
    }
    public function tokenVerify($arryArguments){
        return $this->bll->tokenVerify($arryArguments);
    }
}