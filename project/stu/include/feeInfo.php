<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>收费信息</title>
    <script type="text/javascript" src="../tools/jquery-1.11.3/jquery-1.11.3.js"></script>
    <style type="text/css">
        table tr th{
            font-size: 13px;
        }
        table tr td{
            font-size: 12px;
        }
        input#subbtn{
            margin-top: 5px;
            margin-bottom: 5px;
            width: 60px;
            height: 30px;
            border-radius: 3px;
            background-color: #3bb4f2;
        }
    </style>
</head>
<body>
<h4 align="center"><i>5、收费信息</i></h4>

<form align="center" enctype="multipart/form-data" action="../handlerPage/importFeeHandler.php" method="post">
    <label>请先下载&nbsp;<i><a href="../excelTemplet/fee.xlsx">excel模板</a></i>&nbsp;&nbsp;编辑后上传文件对列表中记录进行更改，</label>
    <label>请选择你要上传的文件。<input type="file" name="myfile"></label><br>
    <input id="subbtn" type="submit" value="上传文件" />
</form>

<table align="center" border="1px" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th>年级</th>
        <th>学生类型</th>
        <th>应收费用(元)</th>
    </tr>
    <?php
        include "../handlerPage/feeHandler.php";
        for($i=0; $i<count($changeArr); $i++) {
            $a = $changeArr[$i]['grade_name'];
            $b = $changeArr[$i]['stu_type'];
            $c = $changeArr[$i]['receviable_amount'];

            switch (floor($i/4)) {
                case 0:
                    echo "<tr bgcolor='#fffaf0'><td>$a</td><td>$b</td><td>$c</td></tr>";
                    break;
                case 1:
                    echo "<tr bgcolor='#d3d3d3'><td>$a</td><td>$b</td><td>$c</td></tr>";
                    break;
                case 2:
                    echo "<tr bgcolor='#fffaf0'><td>$a</td><td>$b</td><td>$c</td></tr>";
                    break;
                case 4:
                    echo "<tr bgcolor='#d3d3d3'><td>$a</td><td>$b</td><td>$c</td></tr>";
                    break;
                case 5:
                    echo "<tr bgcolor='#fffaf0'><td>$a</td><td>$b</td><td>$c</td></tr>";
                    break;
                case 6:
                    echo "<tr bgcolor='#d3d3d3'><td>$a</td><td>$b</td><td>$c</td></tr>";
                    break;
                case 7:
                    echo "<tr bgcolor='#fffaf0'><td>$a</td><td>$b</td><td>$c</td></tr>";
                    break;
                case 8:
                    echo "<tr bgcolor='#d3d3d3'><td>$a</td><td>$b</td><td>$c</td></tr>";
                    break;
                case 9:
                    echo "<tr bgcolor='#fffaf0'><td>$a</td><td>$b</td><td>$c</td></tr>";
                    break;
            }
        }
    ?>

</table>

</body>
</html>