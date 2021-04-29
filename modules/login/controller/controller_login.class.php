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
}