<?php
    header("Content-Type:application/json;charset=utf-8");
    require "../../public/common.php";
    $id = $_GET["id"];
    $sql = "delete from categories where id = {$id}";
    $res = execute($sql);
    echo json_encode($res);

?>