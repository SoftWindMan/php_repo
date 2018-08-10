<?php
include "../tools/alertMessage.php";
include "../tools/excelOperation.php";

$uploadFile = $_FILES['myfile'];

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

if(file_exists('../upload/'.$uploadFile['name'])) {
    alertMessage('文件已经存在！', '../include/feeInfo.php');
    exit(0);
} else {

    //upload权限问题
    $flag = move_uploaded_file($uploadFile['tmp_name'], '../upload/'.$uploadFile['name']);
    if($flag) {
        alertMessage('文件上传成功！', '../include/feeInfo.php');
    } else {
        alertMessage('文件上传失败！', '../include/feeInfo.php');
    }
}

$excelArr = excelToArray('../upload/'.$uploadFile['name']);