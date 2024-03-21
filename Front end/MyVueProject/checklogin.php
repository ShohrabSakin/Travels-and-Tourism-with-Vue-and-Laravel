<?php

    header( 'Content-Type: text/html; charset=utf-8' );
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    require_once 'AuthModule.php';
    $auth = new AuthModule();
    include("library.php");
    $a=new library();
    $m=$a->db;
    $login = ($_GET['username']);
    $password = ($_GET['password']);

    $q="select * from user where username='{$_GET['username']}' and password='{$_GET['password']}' ";
    $r=$m->query($q);
    if(!$r)
    {
    echo "{success:".mysqli_errno($m).", Query: $q}";
    return;
    }
    while($c=$r->fetch_object())
    {
    $token = $auth->generateToken($login,$password);
    echo "{\"success\":\"$token\",\"role\":\"".$c->position."\"}";
    return;
    }
    echo '{"success":"false"}';

    //  Run the web service by: http://localhost/VUE%20JS/MyVueProject/checklogin.php

?>
