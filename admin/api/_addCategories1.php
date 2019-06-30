<?php
    header("Content-Type:application/json;charset=utf-8");
    require "../../public/common.php";
    $name = $_POST['name'];
    $slug = $_POST["slug"];
    $classname = $_POST["classname"];
    $sql = "insert into categories values(null,"{$slug}","{$name}","{$classname}")";
    $res = execute($sql);
    echo json_encode($res);
?>