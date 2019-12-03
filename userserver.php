<?php
    // На стороне сервера вывод echo не работает
    header("Content-Type: text/xml; charset=utf-8");
    header("Cache-Control: no-store, no-cache");
    header("Expires:".date('r'));

    const CONF_NAME = "config.ini";

    include 'SoapUserService.class.php';

    ini_set("soap.wsdl_cache_enabled","0");

    $server = new SoapServer("http://php2.local/user.wsdl");
    $server->setClass('SoapUserService');
    $server->handle();