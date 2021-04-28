<?php
define ('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');
define ('SITE_PATH', 'http://' . $_SERVER['HTTP_HOST'] . '/FrameworkPHP/');
define("SYSTEM_PATH","FrameworkPHP/"); //SYSTEM PATH, PATH RAIZ
define("ROUTER_PATH",SITE_ROOT.SYSTEM_PATH."router/"); //CARPETA ROUTER
define("MODULES_PATH",SITE_ROOT.SYSTEM_PATH."modules/"); //CARPETA MODULES
define("UTILS_PATH",SITE_ROOT.SYSTEM_PATH."utils/"); // CARPETA UTILS 
define("VIEW_PATH",SITE_ROOT.SYSTEM_PATH."view/"); //CARPETA VIEW
define("CSS_PATH",VIEW_PATH."css/"); //CARPETA CSS
define("IMG_PATH",VIEW_PATH."img/"); //CARPETA IMG
define("INC_PATH",VIEW_PATH."inc/"); //CARPETA INC
define("JS_PATH",VIEW_PATH."js/"); //CARPETA JS
define("RESOURCES_PATH",SYSTEM_PATH."resources/"); //CARPETA RESOURCES
define("MODEL_PATH",SYSTEM_PATH."model/"); //CARPETA MODEL
/* CONTACT */
define("CONTROLLER_CONTACT_PATH",MODULES_PATH.'contact/controller/');
define("RECURSOS_CONTACT_PATH",MODULES_PATH.'contact/recursos/');
/* HOME */
define("CONTROLLER_HOME_PATH",MODULES_PATH."home/controller/");
define("MODEL_HOME_PATHS",MODULES_PATH."home/model/");
define("MODEL_BLL_HOME",MODEL_HOME_PATHS."BLL/");
define("MODEL_DAO_HOME",MODEL_HOME_PATHS."DAO/");
define("MODEL_MODEL_HOME",MODEL_HOME_PATHS."MODEL/");
define("VIEW_HOME_PATHS",MODULES_PATH."home/vista/");
/* SHOP */
define("CONTROLLER_SHOP_PATH",MODULES_PATH."shop/controller/");
define("MODEL_SHOP_PATHS",MODULES_PATH."shop/model/");
define("MODEL_BLL_SHOP",MODEL_SHOP_PATHS."BLL/");
define("MODEL_DAO_SHOP",MODEL_SHOP_PATHS."DAO/");
define("MODEL_MODEL_SHOP",MODEL_SHOP_PATHS."MODEL/");
define("VIEW_SHOP_PATHS",MODULES_PATH."SHOP/vista/");


/* FRIENDLY */
define("URL_FRIENDLY_PATH",TRUE);
if($_GET['op']=='get'){
    echo json_encode(URL_FRIENDLY_PATH);
}