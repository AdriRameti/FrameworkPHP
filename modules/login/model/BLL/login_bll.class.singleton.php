<?php
   require MODEL_DAO_LOGIN."login_dao.class.singleton.php";
   require UTILS_PATH."middleware.inc.php";
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
        try{
        $check = $this->dao->validate_user($this->db,$arryArguments);
        }catch(Exception $e){

        }
        if($check){
            $validar = 1;
            echo json_encode($validar);
            exit;
        }else{
            try{
                $insert = $this->dao->insert_user($this->db,$arryArguments);
                // $user = $this->dao->select_user($this->db,$arryArguments);
            }catch(Exception $e){

            }
            if(!$insert){
                echo json_encode("Error al registrar el usuario");
                exit;
            }else{
                try{
                    $user = $this->dao->select_user($this->db,$arryArguments);
                }catch(Exception $e){
    
                }
                if($user){
                    foreach($user as $index => $value){
                        $email = $value['correo'];
                    }
        
                    echo json_encode($email);
                    exit;
                }
            }
        }
        // return $this->dao->insert_user($this->db,$arryArguments);
    }
    public function login($arryArguments){
        try{
            $val = $this->dao->validate_user($this->db,$arryArguments);
        }catch(Exception $e){

        }
        if($val){
            try{
                $rdo = $this->dao->select_user($this->db,$arryArguments);
            }catch(Exception $e){

            }
            if(!$rdo){
                echo json_encode('No hay usuarios');
                exit();
            }else{
                foreach($rdo as $index => $value){
                    $contra = $value['contrasenya'];
                    $nom = $value['nombre'];
                }
                if(password_verify($arryArguments[1],$contra)){
                    $usuario=$nom;
                    $token = encodeT($usuario);
                    echo json_encode($token);
                    exit;
                }else{
                    echo json_encode('Los datos no coinciden');
                }
            }
        }else{
            $validar=1;
            echo json_encode($validar);
            exit();
        }
        // return $this->dao->select_user($this->db,$arryArguments);
    }
    public function menu($arryArguments){
        try{
            $token = $arryArguments;
            $deToken = decodeT($token); 
            $usuari = substr($deToken,41);
            $valName = $this->dao->select_user_name($this->db,$usuari);
        }catch(Exception $e){

        }
        if(!$valName){
            echo json_encode('Error al encotrar la información del usuario');
            exit();
        }else{
            $arry=array();

            foreach ($valName as $value) {
                array_push($arry, $value);
            }

            echo json_encode($arry);
            exit;
        }
    }
    public function tokenVerify($arryArguments){
        $secureToken = Content::generate_Token(20);
        $ins = $this->dao->insert_tokenVerify($db,$secureToken);
        if($ins){
            return $secureToken;
        }

       
    }
}