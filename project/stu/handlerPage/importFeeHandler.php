<?php
include "../tools/alertMessage.php";
include "../tools/excelOperation.php";
include "../tools/connDatabase.php";
include "../tools/conf/conf.php";
include "../tools/dataConvert.php";

$uploadFile = $_FILES['myfile'];

//判断是否符合上传条件
if($uploadFile['error'] > 0) {
    if($uploadFile['error'] == 4) {
        alertMessage('请选择上传文件！', '../include/feeInfo.php');
        exit(0);
    }
    alertMessage($uploadFile['error'], '../include/feeInfo.php');
    exit(0);
}

if($uploadFile['type'] != 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
    alertMessage('上传文件格式应为 xlsx', '../include/feeInfo.php');
    exit(0);
}

//上传动作
if(file_exists('../upload/'.$uploadFile['name'])) {
    alertMessage('文件已经存在！', '../include/feeInfo.php');
    exit(0);
} else {
    $uploadFileName = date('YmdHms', time()) . $uploadFile['name'];

    //upload权限问题
    $flag = move_uploaded_file($uploadFile['tmp_name'], '../upload/'.$uploadFileName);
    if(!$flag) {
        alertMessage('文件上传失败！', '../include/feeInfo.php');
        exit(0);
    }
}

//读取excel存入数据库
$excelArr = excelToArray('../upload/'.$uploadFileName);
$dataArr = $excelArr['data'];
$excelHeader = $dataArr[1];

if($excelHeader['A'] != '年级' or $excelHeader['B'] != '学生类型' or $excelHeader['C'] != '应收费用(元)' or $excelHeader['D'] != '费用说明') {
    alertMessage('excel文件不正确，请下载模板文件！', '../include/feeInfo.php');
    exit(0);
}

for($i=2; $i<=count($dataArr); $i++) {
    $gradeNum = gradeInfoToData($dataArr[$i]['A']);
    $stuTypeNum = stutypeInfoToData($dataArr[$i]['B']);
    $receAmount = $dataArr[$i]['C'];
    $comm = $dataArr[$i]['D'];

    $conn = new MysqliProcess(SERVERHOST, USERNAME, PASSWORD, DBNAME);
    $updateSql = "UPDATE fee SET `receviable_amount` = $receAmount, `amount_comment` = '$comm' WHERE `grade_id` = $gradeNum AND `stu_type` = $stuTypeNum";
    $conn->updateData($updateSql);
    $conn->closeDatabase();
}

//页面跳转
alertMessage('费用更新成功！', '../include/feeInfo.php');
