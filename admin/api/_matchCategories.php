<?php
    //请求当前接口会返回所有的分类数据
    header("Content-Type:application/json;charset=utf-8");
    require "../../public/common.php";
    $id = $_GET["id"];
    $sql = "select * from categories where id = {$id}";

    $res = query($sql);

    echo json_encode($res);
?>