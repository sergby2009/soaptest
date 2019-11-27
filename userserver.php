<?php
    header("Content-Type: text/xml; charset=utf-8");
    header("Cache-Control: no-store, no-cache");
    header("Expires:".date('r'));

    const CONF_NAME = "config.ini";

    function __autoload($class_name){
        include $class_name . '.class.php';
    }

    ini_set("soap.wsdl_cache_enabled","0");

    $server = new SoapServer("http://{$_SERVER['HTTP_HOST']}/user.php");
    $server->setClass('SoapUserService');
    $server->handle();