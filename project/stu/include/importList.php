<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>导入学生信息</title>
    <script type="text/javascript" src="../tools/jquery-1.11.3/jquery-1.11.3.js"></script>
    <style type="text/css">
        input#subbtn{
            margin-top: 10px;
            width: 87px;
            height: 30px;
            border-radius: 3px;
            background-color: #3bb4f2;
        }
    </style>
</head>
<body>
<h4 align="center"><i>--- 导入学生信息 ---</i></h4>

<form align="center" enctype="multipart/form-data" action="../handlerPage/importListHandler.php" method="post">
    <label>请先下载&nbsp;<i><a href="../excelTemplet/stu.xlsx">excel模板</a></i>&nbsp;&nbsp;编辑后上传文件，</label>
    <label>请选择你要上传的文件。<input type="file" name="myfile"></label><br>
    <input id="subbtn" type="submit" value="导入学生信息" />
</form>

</body>
</html>