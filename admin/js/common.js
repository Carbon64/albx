//在common.js中编写一些公用的功能
//登出功能
//声明全局变量保存用户信息
var userInfo = null;

//ajax请求是异步的,服务器并不会立即返回结果,页面就会继续加载和渲染
// 解决方案:将ajax改成同步的,就可以了,在参数中添加async:false
$.ajax({
        url: "api/_checkLogin.php",
        dataType: "json",
        async: false,
        success: function(res) {
            if (res.code == 0) {
                alert("尚未登录");
                location.href = "login.html";
            } else if (res.code == 1) {

                userInfo = res.data[0]

            }
        }
    })
    // 入口函数执行的时机是在页面结构加载完毕之后才会执行
$(function() {
    if (userInfo) {
        $(".profile .avatar").attr("src", userInfo.avatar);
        $(".profile h3").html(userInfo.nickname);
    }


    $("#logout").on("click", function() {
        $.ajax({
            url: "api/_logout.php",
            dataType: "json",
            success: function(res) {
                if (res.code == 1) {
                    alert("登出成功");
                    location.href = "login.html"
                }
            }
        })
    })
})