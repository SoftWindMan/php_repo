<?php

include "../tools/conf/conf.php";
include "../tools/connDatabase.php";
include "../tools/dataConvert.php";

//查询费用表
$conn = new MysqliProcess(SERVERHOST, USERNAME, PASSWORD, DBNAME);
$sql = "select * from fee order by grade_id, stu_type";
$res = $conn->queryData($sql);
$conn->closeDatabase();

//包装成数组
$changeArr = array();
foreach ($res as $row) {
    $arr = array();
    $grade_name = '';
    $stu_type = '';

    $arr['grade_name'] = databaseToGradeInfo($row['grade_id']);
    $arr['stu_type'] = databaseToStutypeInfo($row['stu_type']);
    $arr['receviable_amount'] = $row['receviable_amount'];
    $arr['amount_comment'] = $row['amount_comment'];

    array_push($changeArr, $arr);
}