<?php
class controller_login{
    public function list(){
        require INC_PATH."header.php";
        require INC_PATH."menu.html";
        Content::LoadView("login","login");
        include (INC_PATH."footer.php");
    }
    public function show_View(){
        $json = array();
        $json = Content::LoadModel(MODEL_MODEL_LOGIN,"login_model","show_View");
        echo json_encode($json);
    }
    public function register(){
        $email = $_POST['email'];
        $nombre =$_POST['nombre'];
        $contrase = $_POST['contrase'];
        $array =array(); 
        array_push($array , $email);
        array_push($array , $nombre);
        array_push($array ,$contrase);
        $json = array();
        $json = Content::LoadModel(MODEL_MODEL_LOGIN,"login_model","register",$array);
        echo json_encode($json);
    }
    public function login(){
        $email = $_POST['email'];
        $contrase = $_POST['contrase'];
        $array =array(); 
        array_push($array , $email);
        array_push($array ,$contrase);
        $json = array();
        $json = Content::LoadModel(MODEL_MODEL_LOGIN,"login_model","login",$array);
        echo json_encode($json);
    }
    public function menu(){
        $token = $_POST['token'];
        $json = array();
        $json = Content::LoadModel(MODEL_MODEL_LOGIN,"login_model","menu",$token);
        echo json_encode($json);
    }
    public function verify(){
        $tokenVerify = Content::loadModel(MODEL_MODEL_LOGIN,"login_model","tokenVerify");
        $mailClient = $_POST['email'];
        $type = 'alta';
        $message = 'Para activar su cuenta en KIWEAR pulse en el siguiente enlace';
        $mailKiwear = 'KiwearSupport@info.com';
        $info = array();
        array_push($info,$mailClient);
        array_push($info,$type);
        array_push($info,$message);
        array_push($info,$mailKiwear);
        array_push($info,$tokenVerify);
        $json = array();
        $json = Mail::dataMail($info);
        echo json_encode($json);
    }
    public function verify_user(){
        
    }
}