<?php
class login_dao{
    static $_instance;
    private function __construct() {
    }
    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function select_View($db){
        $sql = "SELECT * from usuario";
        $stmt =$db->ejecutar($sql);
        return $db->listar($stmt);
    }
    public function insert_user($db,$arryArguments){
        $email = $arryArguments[0];
        $nombre = $arryArguments[1];
        $passw = $arryArguments [2]; 
        $tipo='Cliente';
        $safe_passw = password_hash($passw,PASSWORD_DEFAULT);
        $hashavatar= md5( strtolower( trim( $email ) ) );
        $avatar ="https://www.gravatar.com/avatar/$hashavatar?s=40&d=identicon";

        $sql = "INSERT INTO usuario (correo,contrasenya,avatar,tipo,nombre,verify) VALUES ('$email','$safe_passw','$avatar','$tipo','$nombre','0')";
        return $db->ejecutar($sql);
        // return $db->listar($stmt);
    }
    public function validate_user($db,$arryArguments){
        $email = $arryArguments[0];
        $sql = "SELECT * FROM usuario WHERE correo='$email'";
        $stmt =$db->ejecutar($sql);
        return $db->listar($stmt);
    }
    public function select_user($db,$arryArguments){
        $email = $arryArguments[0];
        $sql = "SELECT * FROM usuario WHERE correo='$email'";
        $stmt =$db->ejecutar($sql);
        return $db->listar($stmt);
    }
    public function select_user_name($db,$usuari){
        $sql ="SELECT nombre,avatar,tipo FROM usuario WHERE nombre LIKE '$usuari%' OR nombre='$usuari'";
        $stmt = $db->ejecutar($sql);
        return $db-> listar($stmt);
    }
    public function insert_tokenVerify($db,$secureToken){
        $sql = "INSERT INTO tokens () VALUES ('$secureToken')";
        return $db->ejecutar($sql);
        // return $db->listar($stmt);
    }
}