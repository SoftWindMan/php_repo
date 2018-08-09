<?php
include "../tools/encryFun.php";
include "../conf/conf.php";
include "../tools/connDatabase.php";
include "../tools/alertMessage.php";

//接收post数据
$name = $_POST['stu_name'];
$sex = (int)$_POST['stu_sex'];
$age = (int)$_POST['stu_age'];
$grade = (int)$_POST['stu_grade'];
$address = lock_url($_POST['stu_address']);
$family = $_POST['stu_family'];
$phone = lock_url($_POST['stu_phone']);

$cardId = '';
if($_POST['stu_cardId' != '']) {
    $cardId = lock_url($_POST['stu_cardId']);
}

//向数据库插入数据
$conn = new MysqliProcess(SERVERHOST, USERNAME, PASSWORD, DBNAME);
$insertSql = "INSERT INTO student(stu_name, stu_sex, stu_age, stu_grade, stu_address, stu_cardId, stu_family, stu_phone) VALUES ('$name', $sex, $age, $grade, '$address', '$cardId', '$family', '$phone')";
$conn->insertData($insertSql);

//页面跳转
alertMessage('save success!', '../include/addStudent.php');
