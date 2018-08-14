<?php

// 引入phpexcel类(thinkPHP方式，其它框架请自行修改)
include "PHPExcel-1.8/PHPExcel.php";
include "PHPExcel-1.8/PHPExcel/IOFactory.php";

/**
 * 把Excel内容转化成数组
 * @param   string     $file_path 文件地址
 * @param   integer    $sheet     工作表
 */
function excelToArray($file_path, $sheet = 0){
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

/**
 *  批量导出数据
 *  $arr 导出列表数据
 *  $name excel表歌名
 */
function arrayToExcel($arr,$name){
    $objPHPExcel = new PHPExcel();

    /*右键属性所显示的信息*/
    $objPHPExcel->getProperties()->setCreator("zxf")  //作者
    ->setLastModifiedBy("zxf")  //最后一次保存者
    ->setTitle('数据EXCEL导出')  //标题
    ->setSubject('数据EXCEL导出') //主题
    ->setDescription('导出数据')  //描述
    ->setKeywords("excel")   //标记
    ->setCategory("result file");  //类别

    //设置当前的表格
    $objPHPExcel->setActiveSheetIndex(0);

    // 设置表格第一行显示内容和字体颜色
    $objPHPExcel->getActiveSheet()
        ->setCellValue('A1', '学生姓名')
        ->setCellValue('B1', '性别')
        ->setCellValue('C1', '年龄')
        ->setCellValue('D1', '年级')
        ->setCellValue('E1', '学生类型')
        ->setCellValue('F1', '减免金额(元)')
        ->setCellValue('G1', '已付金额(元)')
        ->setCellValue('H1', '所欠金额(元)')
        ->setCellValue('I1', '缴费说明')
        ->setCellValue('J1', '家庭住址')
        ->setCellValue('K1', '身份证号')
        ->setCellValue('L1', '联系家属')
        ->setCellValue('M1', '联系电话')
        ->setCellValue('N1', '编号')
        ->getStyle('A1:M1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);

    //表头字段水平居中
    $objPHPExcel->getActiveSheet()
        ->getStyle('A1:N1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    //表头单元格设置
    $objPHPExcel->getActiveSheet()
        ->getStyle( 'A1:N1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
    $objPHPExcel->getActiveSheet()
        ->getStyle( 'A1:N1')->getFill()->getStartColor()->setARGB('FF00FF00');

    //表头框设置
//    $styleThinBlackBorderOutline = array(
//        'borders' => array (
//            'outline' => array (
//                'style' => PHPExcel_Style_Border::BORDER_THIN,   //设置border样式
//                //'style' => PHPExcel_Style_Border::BORDER_THICK,  另一种样式
//                'color' => array ('argb' => 'FF000000'),          //设置border颜色
//            ),
//        ),
//    );
//    $objPHPExcel->getActiveSheet()->getStyle( 'A1:A1')->applyFromArray($styleThinBlackBorderOutline);

    $key = 1;
    /*以下就是对处理Excel里的数据，横着取数据*/
    foreach($arr as $v){
        $key++;
        $objPHPExcel->getActiveSheet()

            //Excel的第A列，name是你查出数组的键值字段，下面以此类推
            ->setCellValue('A'.$key, $v['stu_name'])
            ->setCellValue('B'.$key, $v['stu_sex'])
            ->setCellValue('C'.$key, $v['stu_age'])
            ->setCellValue('D'.$key, $v['stu_grade'])
            ->setCellValue('E'.$key, $v['stu_type'])
            ->setCellValue('F'.$key, $v['stu_voidAmount'])
            ->setCellValue('G'.$key, $v['stu_paidAmount'])
            ->setCellValue('H'.$key, $v['stu_debtAmount'])
            ->setCellValue('I'.$key, $v['stu_feeText'])
            ->setCellValue('J'.$key, $v['stu_address'])
            ->setCellValue('K'.$key, $v['stu_cardId'])
            ->setCellValue('L'.$key, $v['stu_family'])
            ->setCellValue('M'.$key, $v['stu_phone'])
            ->setCellValue('N'.$key, $v['stu_id']);
    }

    //设置当前的表格
    $objPHPExcel->setActiveSheetIndex(0);
    ob_end_clean();  //清除缓冲区,避免乱码
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //文件类型
    header('Content-Disposition: attachment;filename="'.$name.'.xls"'); //文件名
    header('Cache-Control: max-age=0');
    header('Content-Type: text/html; charset=utf-8'); //编码
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  //excel 2003
    $objWriter->save('php://output');
    exit;

//    // 生成2007excel格式的xlsx文件
//    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//    header('Content-Disposition: attachment;filename="' .$name . '.xlsx"');
//    header('Cache-Control: max-age=0');
//    $objWriter = PHPExcel_IOFactory:: createWriter($objPHPExcel, 'Excel2007');
//    $objWriter->save( 'php://output');
//    exit;
}