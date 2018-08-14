<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>收费信息</title>
    <script type="text/javascript" src="../tools/jquery-1.11.3/jquery-1.11.3.js"></script>
    <style type="text/css">
        table tr th{
            font-size: 13px;
            background-color: deepskyblue;
        }
        table tr td{
            font-size: 11px;
        }
        input#subbtn{
            margin-top: 5px;
            margin-bottom: 10px;
            width: 90px;
            height: 30px;
            border-radius: 3px;
            background-color: #3bb4f2;
        }
    </style>
</head>
<body>
<h4 align="center"><i>--- 收费信息 ---</i></h4>

<form align="center" enctype="multipart/form-data" action="../handlerPage/importFeeHandler.php" method="post">
    <label>请先下载&nbsp;<i><a href="../excelTemplet/fee.xlsx">excel模板</a></i>&nbsp;&nbsp;编辑后上传文件对列表中记录进行更改，</label>
    <label>请选择你要上传的文件。<input type="file" name="myfile"></label><br>
    <input id="subbtn" type="submit" value="更新费用信息" />
</form>

<table align="center" border="1px" cellpadding="0" cellspacing="0" width="80%">
    <tr>
        <th>年级</th>
        <th>学生类型</th>
        <th>应收费用(元)</th>
        <th>费用说明</th>
    </tr>
    <?php
        include "../handlerPage/feeHandler.php";

        for($i=0; $i<count($changeArr); $i++) {
            $a = $changeArr[$i]['grade_name'];
            $b = $changeArr[$i]['stu_type'];
            $c = $changeArr[$i]['receviable_amount'];
            $d = $changeArr[$i]['amount_comment'];

            switch (floor($i/4) % 2) {
                case 0:
                    echo "<tr><td>$a</td><td>$b</td><td>$c</td><td>$d</td></tr>";
                    break;
                default:
                    echo "<tr bgcolor='#87cefa'><td>$a</td><td>$b</td><td>$c</td><td>$d</td></tr>";
            }
        }
    ?>

</table>

</body>
</html>