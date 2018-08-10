<?php

include "../tools/conf/conf.php";
include "../tools/connDatabase.php";

$conn = new MysqliProcess(SERVERHOST, USERNAME, PASSWORD, DBNAME);
$sql = "select * from fee order by grade_id, stu_type";
$res = $conn->queryData($sql);

$changeArr = array();
foreach ($res as $row) {
    $arr = array();
    $grade_name = '';
    $stu_type = '';

    switch ($row['grade_id']) {
        case 1:
            $grade_name = '一年级';
            break;
        case 2:
            $grade_name = '二年级';
            break;
        case 3:
            $grade_name = '三年级';
            break;
        case 4:
            $grade_name = '四年级';
            break;
        case 5:
            $grade_name = '五年级';
            break;
        case 6:
            $grade_name = '六年级';
            break;
        case 7:
            $grade_name = '小班';
            break;
        case 8:
            $grade_name = '中班';
            break;
        case 9:
            $grade_name = '大班';
            break;
    }

    switch ($row['stu_type']) {
        case 1:
            $stu_type = '走读';
            break;
        case 2:
            $stu_type = '接送';
            break;
        case 3:
            $stu_type = '日托';
            break;
        case 4:
            $stu_type = '全托';
            break;
    }

    $arr['grade_name'] = $grade_name;
    $arr['stu_type'] = $stu_type;
    $arr['receviable_amount'] = $row['receviable_amount'];

    array_push($changeArr, $arr);
}