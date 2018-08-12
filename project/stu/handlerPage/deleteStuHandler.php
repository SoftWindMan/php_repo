<?php
include "../tools/connDatabase.php";
include "../tools/conf/conf.php";
include "../tools/alertMessage.php";

$stu_id = -1;
if(is_numeric($_GET['stu_id'])) {
    $stu_id = (int)$_GET['stu_id'];
}

$conn = new MysqliProcess(SERVERHOST, USERNAME, PASSWORD, DBNAME);
$deleteSql = "DELETE FROM `student` WHERE `stu_id` = $stu_id";
$conn->deleteData($deleteSql);

alertMessage('删除成功！', '../include/studentList.php');
