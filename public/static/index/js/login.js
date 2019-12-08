$(function(){
    $.ajax({
        type:"GET",
        url:login_url,
        dataType:"json",
        success:function(data){
            if(data.error == 0){
                var html="<span>您好 &nbsp;<a href='#'>"+data.username+"</a></span><span>，欢迎来到&nbsp;<a alt='首页' title='首页' href='index.php'>童攀课堂</a></span><span>[<a href='"+logout_url+"'>退出</a>]</span><div class='scrollBody' id='scrollBody'></div>";
                $("#ECS_MEMBERZONE").html(html);
            }else{
                var html="<a href='#' class='link-login red'>请登录</a><a href='#' class='link-regist'>免费注册</a><div class='scrollBody' id='scrollBody'></div>";
                $("#ECS_MEMBERZONE").html(html);
            }
        }
    });
    cartGoodsNum();
});

function cartGoodsNum(){
    $.ajax({
        type:"POST",
        url:cart_goods_num,
        dataType:"json",
        success:function(data){
            $("#cart_goods_num").text(data.cart_goods_num);
        }
    });
}