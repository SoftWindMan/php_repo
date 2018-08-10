<?php

/**
 * 把Excel内容转化成数组
 * @param   string     $file_path 文件地址
 * @param   integer    $sheet     工作表
 * @author liuyupeng [chenyu9205@163.com]
 * @version 2017-04-19T19:01:22+0800
 */
function excelToArray($file_path, $sheet = 0){
    // 引入phpexcel类(thinkPHP方式，其它框架请自行修改)
    include "PHPExcel-1.8/PHPExcel.php";
    include "PHPExcel-1.8/PHPExcel/IOFactory.php";

    $r = ["status" => 1, "info" => "文件检测成功"];
    if(empty($file_path) || !file_exists($file_path)){
        $r = ["status" => 0, "info" => "Excel 读取错误"];
    }

    if($r["status"]){
        $PHPReader = new \PHPExcel_Reader_Excel2007();        // 建立reader对象

        if(!$PHPReader->canRead($file_path)){
            $PHPReader = new \PHPExcel_Reader_Excel5();
            if(!$PHPReader->canRead($file_path)){
                $r = ["status" => 0, "info" => "Excel 读取错误"];
            }
        }
    }

    if($r["status"]){
        $PHPExcel = $PHPReader->load($file_path);           // 建立excel对象
        $currentSheet = $PHPExcel->getSheet($sheet);        // 读取excel文件中的指定工作表

        $allColumn = $currentSheet->getHighestColumn();       // 取得最大的列号
        $allRow = $currentSheet->getHighestRow();             // 取得一共有多少行

        $dataExcel = array();
        // 循环读取每个单元格的内容。注意行从1开始，列从A开始
        for($rowIndex = 1; $rowIndex <= $allRow; $rowIndex ++){
            for($colIndex = "A"; $colIndex <= $allColumn; $colIndex ++){
                $location = $colIndex.$rowIndex;
                $cell = $currentSheet->getCell($location)->getValue();
                if($cell instanceof PHPExcel_RichText){ // 富文本转换字符串
                    $cell = $cell->__toString();
                }
                $dataExcel[$rowIndex][$colIndex] = $cell;
            }
        }

        $r = ["status" => 1, "info" => "文件内容获取成功"];
        $r["data"] = $dataExcel;
        $r["allRow"] = $allRow;
        $r["allColumn"] = $allColumn;
    }
    return $r;
}

print_r(excelToArray('../example/example.xlsx'));