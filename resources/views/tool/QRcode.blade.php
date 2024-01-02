<?php
?>

    <!DOCTYPE html >
<html lang="zh-Hans">

<head>
    <meta http - equiv="Content-Type" content="text/html; charset=gbk">
    <meta name="viewport" content="width=750,user-scalable=no">
    <meta name="applicable-device" content="pc,mobile"/>
    <title>短链接生成_二维码生成</title>
    <meta name="description"
          content="翻斗花园为您提供：,短网址程序,短网址服务,短网址转换,短网址api接口,批量生成短链接,短网址生成,压缩所有网址包括图片、flash、mp3、rar等所有互联网地址，专业的网址缩短网站！。"/>
    <meta name="keywords" content="网址缩短,缩短网址,网址压缩,短链接,短域名,短网址,短网址生成"/>
    <link rel="icon" href="http://lattiex.com/assets/images/favicon.ico">
    <link type="text/css" rel="stylesheet" href="https://ha.huatu.com/iceui/ui/ui.css">
    <script src="https://ha.huatu.com/iceui/ice.min.js" charset="utf-8"></script>
    <script src="https://ha.huatu.com/iceui/ui/ui.js" charset="utf-8"></script>


</head>
<style>
    .container {
        display: flex;
        width: 100%;
    }

    .left {
        flex: 1;
        padding: 20px;
    }

    .right {
        flex: 1;
    }

    iframe {
        width: 100%;
        height: 100vh;
        border: none;
    }


</style>
<body>

<div class="container">
    <div class="left">
        <fieldset>
            <legend class="bg-red"> 短链接生成系统</legend>
            <div class="group-input">
                <input type="text" placeholder="长链接" id="url">
                <div class="group-label btn" onclick="get_shortlink()"> 生成</div>
            </div>
        </fieldset>
        <legend class="bg-blue"> 生成结果:短链接如下</legend>
        <div class="group-input">
            <p class="red" id="result"></p>

        </div>
        <!--使用img元素来展示图片 -->
        <!--<img src = "" id = "img" alt = "短链对应二维码" title = "" />-->
    </div>
    <div class="right">
        <iframe src="http://www.tool.lattiex.com/QR-Card/#/" frameborder="0"></iframe>
    </div>
</div>

<script src="{{URL::asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script>
    // alert('只因你太美~~')

    function get_shortlink() {
        var url = ice('#url').val()
        $.ajax({
            url: 'https://ur0.top/api/getShortUrl/',
            type: 'post',
            data: {
                act: 'get_short_url',
                url: url
            },
            dataType: 'json',
            success: function (res) {
                $('#result').text(res.data)
                // res.data就是生成后的短链接
                // var shortUrl = res.data
                // create_qrcode(shortUrl);
            }
        });
    }

    // function create_qrcode(shortUrl) {
    //     var uurl = 'https://api.qrserver.com/v1/create-qr-code/?data=' + shortUrl;
    //     var url = shortUrl;
    //     $.ajax({
    //         url: 'https://ha.huatu.com/api/pic/toBase64/',
    //         type: 'post',
    //         dataType: 'image',
    //         data: {
    //             url: url
    //         },
    //         success: function (res) {
    //             // alert(res.data)
    //             // $('#img').attr('src', uurl);
    //         },
    //         error: function (xhr, status, error) {
    //             // $('#img').attr('src', uurl);
    //             // alert(error)
    //         }
    //     })
    // }

</script>

</body>

</html>


