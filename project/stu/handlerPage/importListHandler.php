<?php
include "../tools/alertMessage.php";
include "../tools/excelOperation.php";
include "../tools/connDatabase.php";
include "../tools/conf/conf.php";
include "../tools/dataConvert.php";
include "../tools/encryFun.php";

$uploadFile = $_FILES['myfile'];

//判断是否符合上传条件
if($uploadFile['error'] > 0) {
    if($uploadFile['error'] == 4) {
        alertMessage('请选择上传文件！', '../include/importList.php');
        exit(0);
    }
    alertMessage($uploadFile['error'], '../include/importList.php');
    exit(0);
}

if($uploadFile['type'] != 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
    alertMessage('上传文件格式应为 xlsx', '../include/importList.php');
    exit(0);
}

if(file_exists('../upload/'.$uploadFile['name'])) {
    alertMessage('文件已经存在！', '../include/importList.php');
    exit(0);
} else {
    $uploadFileName = date('Y-m-d-H-m-s', time()) . $uploadFile['name'];

    //upload权限问题
    $flag = move_uploaded_file($uploadFile['tmp_name'], '../upload/'.$uploadFileName);
    if(!$flag) {
        alertMessage('文件上传失败！', '../include/importList.php');
        exit(0);
    }
}

//读取excel数据存入数据库
$excelArr = excelToArray('../upload/'.$uploadFileName);
$dataArr = $excelArr['data'];

for($i=2; $i<=count($dataArr); $i++) {
    $n = $dataArr[$i]['A'];
    $s = sexinfoTodata($dataArr[$i]['B']);
    $ag = $dataArr[$i]['C'];
    $g = gradeInfoToData($dataArr[$i]['D']);
    $ty = stutypeInfoToData($dataArr[$i]['E']);
    $v = $dataArr[$i]['F'];
    $p = $dataArr[$i]['G'];
    $ad = lock_url($dataArr[$i]['H']);

    $c = '';
    if($dataArr[$i]['I'] != '') {
        $c = lock_url($dataArr[$i]['I']);
    }

    $f = $dataArr[$i]['J'];
    $ph = lock_url($dataArr[$i]['K']);
    $fee = $dataArr[$i]['L'];

    $conn = new MysqliProcess(SERVERHOST, USERNAME, PASSWORD, DBNAME);
    $insertStuSql = "INSERT INTO student(`stu_name`, `stu_sex`, `stu_age`, `stu_grade`, `stu_type`, `stu_voidAmount`, `stu_paidAmount`, `stu_address`, `stu_cardId`, `stu_family`, `stu_phone`, `stu_feeText`) VALUES('$n', $s, $ag, $g, $ty, $v, $p, '$ad', '$c', '$f', '$ph', '$fee')";
    $conn->insertData($insertStuSql);
    $conn->closeDatabase();
}

//页面跳转
alertMessage('导入学生信息成功！', '../include/importList.php');