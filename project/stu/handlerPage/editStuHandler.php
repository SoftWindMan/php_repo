<?php
include "../tools/connDatabase.php";
include "../tools/conf/conf.php";
include "../tools/alertMessage.php";
include "../tools/encryFun.php";

$stuId = (int)$_POST['stu_id'];
$name = $_POST['stu_name'];
$sex = (int)$_POST['stu_sex'];
$age = (int)$_POST['stu_age'];
$grade = (int)$_POST['stu_grade'];
$address = lock_url($_POST['stu_address']);
$family = $_POST['stu_family'];
$phone = lock_url($_POST['stu_phone']);
$type = $_POST['stu_type'];
$voidAmount = (float)$_POST['stu_voidAmount'];
$paidAmount = (float)$_POST['stu_paidAmount'];
$feeText = $_POST['stu_feeText'];
$cardId = $_POST['stu_cardId'] == '' ? '' : lock_url($_POST['stu_cardId']);

$upSql = "UPDATE `student` SET `stu_name` = '$name', `stu_sex` = $sex, `stu_age` = $age, `stu_grade` = $grade, `stu_type` = $type, `stu_voidAmount` = $voidAmount, `stu_paidAmount` = $paidAmount, `stu_feeText` = '$feeText', `stu_address` = '$address', `stu_cardId` = '$cardId', `stu_family` = '$family', `stu_phone` = '$phone' WHERE `stu_id` = $stuId";
$conn = new MysqliProcess(SERVERHOST, USERNAME, PASSWORD, DBNAME);
$conn->updateData($upSql);

alertMessage("修改成功！", "../include/studentList.php");
