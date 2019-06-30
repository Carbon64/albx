<?php
    //请求当前接口会返回分页的评论数据
    header("Content-Type:application/json;charset=utf-8");
    require "../../public/common.php";
    //接收前端发送的页码和页号
    $page = $_GET["page"];
    $pageSize = $_GET["pageSize"];

    //计算偏移量
    $offset = ($page -1 )*$pageSize;

    $sql = "select comments.id,comments.author,comments.created,comments.content,comments.`status`,posts.title,(select count(comments.id) from comments) as count from comments
    left join posts on posts.id = comments.post_id   
    limit $offset,$pageSize";

    $res = query($sql);
    $count = $res["data"][0]["count"];
    $totalPages = ceil($count / $pageSize);
    $res["totalPage"] = $totalPages;

    echo json_encode($res);
?>