<?php
    header("Content-Type:application/json;charset=utf-8");
    require "../../public/common.php";
    $name = $_POST['name'];
    $slug = $_POST["slug"];
    $classname = $_POST["classname"];
    $id = $_POST["id"];
    //update table set age = age + 1 where id = 3 or id = 4;
    $sql = "update categories set slug = '{$slug}', name = '{$name}', classname = '{$classname}' where id = {$id}";
    $res = execute($sql);
    echo json_encode($res);
?>