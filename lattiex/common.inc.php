<?php

$servername = '112.74.182.94';
$username = 'root';
$password = 'bosssCrabb';
$dbname = 'lattiexroot';

// 创建PDO连接
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('数据库连接失败' . $e->getMessage());
}
// 存储的表
define('TAB', 'uploads');