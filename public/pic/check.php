<?php
require_once __DIR__ . '/common.func.php';
require_once __DIR__ . '/common.inc.php';
require_once '../../vendor/autoload.php';

// 查询最新的那条数据的id，即一共上传的多少文件
$checkSql = 'SELECT id FROM ' . TAB . ' ORDER BY id DESC  limit 1';

$stmt = $pdo->query($checkSql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$lastID = $row['id'];
echo $lastID;

?>
