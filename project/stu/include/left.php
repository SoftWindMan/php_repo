<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
    <script type="text/javascript" src="../tools/jquery-1.11.3/jquery-1.11.3.js"></script>
	<style type="text/css">
        ul a{
            margin-top: 5px;
        }
        .sel_btn{
            height: 21px;
            line-height: 21px;
            padding: 0 11px;
            background: #02bafa;
            border: 1px #26bbdb solid;
            border-radius: 3px;
            display: inline-block;
            text-decoration: none;
            font-size: 12px;
            outline: none;
        }
        .ch_cls{
            background: #e4e4e4;
        }
	</style>
</head>
<body>
<ul type="none">
    <li><a class="sel_btn" id="sel_btn1" onclick="changeSelBtn(1)" href="studentList.php" target="main">学生信息列表</a></li>
    <li><a class="sel_btn" id="sel_btn2" onclick="changeSelBtn(2)" href="addStudent.php" target="main">添加学生信息</a></li>
	<li><a class="sel_btn" id="sel_btn3" onclick="changeSelBtn(3)" href="importList.php" target="main">导入学生信息</a></li>
	<li><a class="sel_btn" id="sel_btn4" onclick="changeSelBtn(4)" href="feeInfo.php" target="main">收费信息</a></li>
</ul>

<script type="text/javascript">
    function changeSelBtn(index){
        for (let i=1; i<=4; i++) {
            let idName = "#" + 'sel_btn' + i;
            if (i == index) {
                $(idName).addClass('ch_cls');
            } else {
                $(idName).removeClass('ch_cls');
            }
        }
    }
</script>

</body>
</html>