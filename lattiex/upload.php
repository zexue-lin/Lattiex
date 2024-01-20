<?php
require_once __DIR__ . '/common.func.php';
// require_once __DIR__ . '/common.inc.php';
require_once '../vendor/autoload.php';


$servername = '127.0.0.1';
$username = 'root';
$password = 'root';
$dbname = 'laravel-voyager';

// 创建PDO连接
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('数据库连接失败' . $e->getMessage());
}
// 存储的表
define('TAB', 'uploads');

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["submit"])) {

    $temp = explode(".", $_FILES["file"]["name"]);
    $uploadType = end($temp); //文件类型

    $uploadName = $_FILES['file']['name']; //文件名

    // 以字节（bytes）为单位,除以1024就是kb
    $fileSizeKB = $_FILES['file']['size'] / 1024;
    $fileSizeKB = number_format($fileSizeKB, 2, '.', '');
    $fileSize = $fileSizeKB . 'KB';

    if ($fileSizeKB > 1024) {
        $fileSize = $fileSizeKB / 1024;
        $fileSize = number_format($fileSize, 2, '.', '') . 'MB';
    }

    $baseUrl = 'http://www.pic.lattiex.com';
    // 允许上传的文件类型
    $allowDocType = array('txt', 'doc', 'xls', 'ppt', 'wps', 'docx', 'xlsx', 'pptx', 'pdf', 'rar', 'zip', '7z', 'jpg', 'png', 'gif', 'bmp', 'jpeg');
    $allowImgType = array('jpg', 'png', 'gif', 'bmp', 'jpeg');

    // 两个#是定界符，表示正则的开始和结束
    // 中括号里面的是回车符、换行符、反斜杠这些，{1,} -> 别是匹配前面的字符至少一次
    $uploadName = trim(preg_replace("#[ \r\n\t\*\%\\\/\?><\|\":]{1,}#", '', $uploadName));

    if (!in_array($uploadType, $allowDocType)) {
        echo("你所上传的{$uploadType}不在许可列表内!");
        exit();
    }
    if (in_array($uploadType, $allowImgType)) {
        $activePath = '/uploads/img';
    } else {
        $activePath = '/uploads';
    }
    $Time = date('Y-m-d H:i:s', time()); //当前时间
    $nowTime = $uploadName = trim(preg_replace("#[ \r\n\t\*\%\\\/\?><\|\-\":]{1,}#", '', $Time));

    // 拼接处理上传的文件名
    $fileName = $nowTime . '-' . mt_rand(111, 9999) . '.' . $uploadType;
    $ymd = date('Y/md');


    $fileName = $ymd . '/' . $fileName;
    $fullfileName = $baseUrl . $activePath . '/' . $fileName;
    $fileUrl = $activePath . '/' . $fileName; //构建完整的文件URL。
    echo $_SERVER['HTTP_HOST'] . '</br>';

    // 连接ftp`
    // try {
    //     $ftp = new \FtpClient\FtpClient();
    //     $ftp->connect('112.74.182.94');
    //     $ftp->login('piclatttiexftp', 'piclatttiexFTP');
    // } catch (\FtpClient\FtpException $e) {
    //     echo 'FTP连接失败，错误信息：' . $e->getMessage();
    // }
    //
    //
    // if (!is_dir($baseUrl . $activePath . "/$ymd")) {
    //     // Mkdir($baseUrl . $activePath . "/$mdir", 0755,true);
    //     $ftp->Mkdir($activePath . "/$ymd", true);
    //
    // }
    // //php会自动把上传的文件保存到一个临时目录
    // $ftp->put($fileUrl, $_FILES["file"]["tmp_name"]);

    // $ftp->close();
    // // 关闭ftp连接

    // echo '文件路径：' . $baseUrl . $fileUrl;
    // 保存图片导目录
    // move_uploaded_file($temFile, $fullfileName) or die("上传文件到 $fullfileName 失败！"); //将上传的文件移到目标位置。

    // 插入数据库
    // $insertSql = "INSERT INTO " . TAB . "(filename,url,mediatype,filesize,uptime) VALUES ('$fileName','$fileUrl','$uploadType','$fileSize','$Time')";

    // $dd = $pdo->exec($insertSql);
    // $fid = $pdo->lastInsertId();
    // echo '已经上传：' . $fid . '个文件';

} else {
    echo '出误了,没有上传任何文件!';
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="http://www.lattiex.com/assets/images/favicon.ico">
    <title>文件上传结果页</title>
    <style>
        body {
            /*width: 100%;*/
            /*height: 100%;*/
            --s: 200px; /* control the size */
            --c1: #1d1d1d;
            --c2: #4e4f51;
            --c3: #3c3c3c;

            background: repeating-conic-gradient(
                from 30deg,
                #0000 0 120deg,
                var(--c3) 0 180deg
            ) calc(0.5 * var(--s)) calc(0.5 * var(--s) * 0.577),
            repeating-conic-gradient(
                from 30deg,
                var(--c1) 0 60deg,
                var(--c2) 0 120deg,
                var(--c3) 0 180deg
            );
            background-size: var(--s) calc(var(--s) * 0.577);
        }


        .card {
            width: 45rem;
            background: #FFFFFF;
            /*box-shadow: 0px 187px 75px rgba(0, 0, 0, 0.01), 0px 105px 63px rgba(0, 0, 0, 0.05), 0px 47px 47px rgba(0, 0, 0, 0.09), 0px 12px 26px rgba(0, 0, 0, 0.1), 0px 0px 0px rgba(0, 0, 0, 0.1);*/
        }

        .title {
            width: 10%;
            height: 40px;
            position: relative;
            display: flex;
            align-items: center;
            padding-left: 10px;
            border-bottom: 1px solid #efeff3;
            font-weight: 700;
            font-size: 14px;
            color: #63656b;
        }

        /* coupons */
        .coupons {
            border-radius: 7px;
        }

        .coupons form {
            display: grid;
            /*grid-template-columns: 1fr 80px;*/
            gap: 5px;
            padding: 10px;
        }

        .input_field {
            width: 75%;
            height: 36px;
            padding: 0 0 0 12px;
            border-radius: 5px;
            outline: none;
            border: 1px solid #e5e5e5;
            filter: drop-shadow(0px 1px 0px #efefef) drop-shadow(0px 1px 0.5px rgba(239, 239, 239, 0.5));
            transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
        }

        .input_field:focus {
            border: 1px solid transparent;
            box-shadow: 0px 0px 0px 2px #242424;
            background-color: transparent;
        }

        .coupons form button {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 10px 18px;
            gap: 10px;
            width: 10%;
            height: 36px;
            background: linear-gradient(180deg, #4480FF 0%, #115DFC 50%, #0550ED 100%);
            box-shadow: 0px 0.5px 0.5px #EFEFEF, 0px 1px 0.5px rgba(239, 239, 239, 0.5);
            border-radius: 5px;
            border: 0;
            font-style: normal;
            font-weight: 600;
            font-size: 12px;
            line-height: 15px;
            color: #ffffff;
            margin-left: 1rem;
        }

        /*  main  */
        .main {
            display: flex;
            justify-content: center;
            padding-top: 8rem;
        }

        .mess {
            display: flex;
            align-items: center;
            flex-direction: row
        }
    </style>

</head>
<body>
<div class="container">
    <div class="main">
        <div class="card coupons">
            <form class="form">
                <div class="mess">
                    <label class="title">文件目录:</label>

                    <input type="text" value="<?php echo $fileUrl; ?>"
                           class="input_field">
                </div>
                <div class="mess">
                    <label class="title">上传时间:</label>

                    <input type="text" value="<?php echo $Time; ?>"
                           class="input_field">
                </div>
                <div class="mess">
                    <label class="title">文件大小:</label>

                    <input type="text" value="<?php echo $fileSize; ?>"
                           class="input_field">
                </div>
                <div class="mess">
                    <label class="title">文件链接:</label>

                    <input type="text" value="<?php echo $fullfileName; ?>"
                           class="input_field" id="filefileName">

                    <button type="button" onclick="handleCopy()">复制</button>
                </div>
            </form>
        </div>
    </div>

</div>
<script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
<script>
    // 原生的document.execCommand('copy')方法，移动和pc都可以用
    // 点击复制，选择要复制的区域，执行复制，例如复制邀请码的实现
    function handleCopy() {
        // 复制方法1
        // let urlValue = $('#filefileName').val();
        let urlValue = $('#filefileName');
        urlValue.focus(); // 将焦点设置到要复制的区域
        urlValue.select(); // 选中要复制区域的文本内容
        if (document.execCommand('copy')) {
            document.execCommand('copy'); // 两次复制 为了兼容性
        }
        urlValue.blur(); // 将焦点移出

        alert('复制成功');

        // 复制方法2
        // let urlValue = $('#filefileName').val();
        //
        // // 创建一个临时的textarea元素
        // let tempTextArea = document.createElement('textarea');
        // tempTextArea.value = urlValue;
        //
        // // 将textarea元素追加到body中
        // document.body.appendChild(tempTextArea);
        //
        // // 选中textarea中的文本
        // tempTextArea.select();
        //
        // // 执行复制命令
        // document.execCommand('copy');
        //
        // // 移除临时textarea元素
        // document.body.removeChild(tempTextArea);
        //
        // // 提示用户复制成功
        // alert('复制成功');
    }
</script>
</body>
</html>
