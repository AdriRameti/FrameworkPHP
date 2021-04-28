<?php
class Content{
    private function __construct(){

    }
    public static function LoadView($namemodule,$view){
        require  MODULES_PATH.$namemodule."/vista/".$view.".html";
    }
    public static function loadError(){
        require INC_PATH."header.html";
        require INC_PATH."menu.html";
        require INC_PATH."404.html";
        require INC_PATH."footer.html";
    }
    public static function LoadModel($model_path,$model_name,$function,$arryArgument='',$arrArgument2 = ''){
        $model =$model_path.$model_name.'.class.singleton.php';
    if (file_exists($model)){
            include_once $model;
            $modelClass = $model_name;
        

        $object = $modelClass::getInstance();
         return call_user_func(array($object,$function),$arryArgument);

    }else {
            throw new Exception();
    }
    //     if (file_exists($model)) {
    //         include_once($model);
    //         $modelClass = $model_name;

    //         $object = $modelClass::getInstance();
    //         if (isset($arrArgument)){
    //             if (isset($arrArgument2)) {
    //                 //return $obj->$function($arrArgument,$arrArgument2);
    //                 return call_user_func(array($object, $function),$arrArgument,$arrArgument2);
    //             }else{
    //             //return $obj->$function($arrArgument);
    //             return call_user_func(array($object, $function),$arrArgument);
    //         }   
            
    //     } else {
    //         throw new Exception();
    //     }
    // }
}
}