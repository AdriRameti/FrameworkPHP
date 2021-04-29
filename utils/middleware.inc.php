<?php
// $path=$_SERVER['DOCUMENT_ROOT'] ."/Ejercicios_PHP";
// include ($path .'/modelo/util/JWT.php');
function encodeT($usuario){
    include_once ('JWT.php');
    $header = '{"typ":"JWT", "alg":"HS256"}';
    $secret = 'maytheforcebewithyou';

    $payload = '"iat":'.time().',"exp":'.time() + (60*60).',"name":'.$usuario.'';
    $JWT = new JWT;
    $token = $JWT->encode($header, $payload, $secret); 
    return $token;
}
function decodeT($token){
    include_once ('JWT.php');
    $secret = 'maytheforcebewithyou';
    $JWT = new JWT;
    // $json = $JWT->decode('"eyJ0eXAiOiJKV1QiLCAiYWxnIjoiSFMyNTYifQ.ImlhdCI6MTYxNjUxNTI5MywiZXhwIjoxNjE2NTE4ODkzLCJuYW1lIjpQZXBlIExvcGV6IExvcGV6.0mrT2yIGvq3lL-bfTEs0EomEyTy5kkAOlV1wcvpW2qQ"' , $secret);
    // var_dump($token);
    // die();
    $json = $JWT->decode($token , $secret);
    return $json;
}
