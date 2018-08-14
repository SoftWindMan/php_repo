
<?php
    $stuGradeNum = empty($_POST['stuGrade']) ? '0' : $_POST['stuGrade'];
    $stuTypeNum = empty($_POST['stuType']) ? '0' : $_POST['stuType'];
    $isDebtNum = empty($_POST['isDebt']) ? '0' : $_POST['isDebt'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>学生信息列表</title>
    <script type="text/javascript" src="../tools/jquery-1.11.3/jquery-1.11.3.js"></script>
    <style type="text/css">
        table tr th{
            font-size: 13px;
            background-color: deepskyblue;
        }
        table tr td{
            font-size: 12px;
        }
        div form span{
            font-size: 13px;
        }
        div form label{
            margin-left: 10px;
        }
        input.subBtn{
            margin-top: 10px;
            margin-bottom: 10px;
            width: 60px;
            height: 30px;
            border-radius: 3px;
            background-color: #3bb4f2;
        }
        div form select{
            width: 75px;
        }
    </style>
    <script type="text/javascript">
        function editFun(stu_id) {
            window.location.href = 'editStudent.php?stu_id=' + stu_id;
        }
        function deleteFun(stu_id) {
            let deleteConfirm = confirm("确认要删除该学生吗？");
            if(deleteConfirm) {
                window.location.href = '../handlerPage/deleteStuHandler.php?stu_id=' + stu_id;
            } else {
                window.location.href = '../include/studentList.php';
            }
        }
    </script>
</head>
<h4 align="center"><i>--- 学生信息列表 ---</i></h4>

<div id="listDiv" align="center">
    <form action="studentList.php" method="post">
        <label><span>学生姓名: </span><input type="text" name="stuName" value="<?php echo $_POST['stuName'];?>"/></label>

        <label><span>年级: </span>
            <select name="stuGrade">
                <option value="0" <?php if($stuGradeNum =='0') echo'selected="selected"';?>>请选择</option>
                <option value="7" <?php if($stuGradeNum =='7') echo'selected="selected"';?>>小班</option>
                <option value="8" <?php if($stuGradeNum =='8') echo'selected="selected"';?>>中班</option>
                <option value="9" <?php if($stuGradeNum =='9') echo'selected="selected"';?>>大班</option>
                <option value="1" <?php if($stuGradeNum =='1') echo'selected="selected"';?>>一年级</option>
                <option value="2" <?php if($stuGradeNum =='2') echo'selected="selected"';?>>二年级</option>
                <option value="3" <?php if($stuGradeNum =='3') echo'selected="selected"';?>>三年级</option>
                <option value="4" <?php if($stuGradeNum =='4') echo'selected="selected"';?>>四年级</option>
                <option value="5" <?php if($stuGradeNum =='5') echo'selected="selected"';?>>五年级</option>
                <option value="6" <?php if($stuGradeNum =='6') echo'selected="selected"';?>>六年级</option>
            </select></label>

        <label><span>学生类型: </span>
            <select name="stuType">
                <option value="0" <?php if($stuTypeNum =='0') echo'selected="selected"';?>>请选择</option>
                <option value="1" <?php if($stuTypeNum =='1') echo'selected="selected"';?>>走读</option>
                <option value="2" <?php if($stuTypeNum =='2') echo'selected="selected"';?>>接送</option>
                <option value="3" <?php if($stuTypeNum =='3') echo'selected="selected"';?>>日托</option>
                <option value="4" <?php if($stuTypeNum =='4') echo'selected="selected"';?>>全托</option>
            </select></label>

        <label><span>是否欠费: </span>
            <select name="isDebt">
                <option value="0" <?php if($isDebtNum =='0') echo'selected="selected"';?> >请选择</option>
                <option value="1" <?php if($isDebtNum =='1') echo'selected="selected"';?>>否</option>
                <option value="2" <?php if($isDebtNum =='2') echo'selected="selected"';?>>是</option>
            </select></label><br>

        <input class="subBtn" type="submit" value="查询" name="query" />
        <input class="subBtn" type="submit" value="导出" name="export" />
    </form>
</div>

<table align="center" border="1px" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th>编号</th>
        <th>学生姓名</th>
        <th>性别</th>
        <th>年龄</th>
        <th>年级</th>
        <th>学生类型</th>
        <th>减免金额(元)</th>
        <th>已付金额(元)</th>
        <th>所欠费用(元)</th>
        <th>缴费说明</th>
        <th>家庭住址</th>
        <th>身份证号</th>
        <th>联系家属</th>
        <th>联系电话</th>
        <th>操作</th>
    </tr>
    <?php
        include "../tools/connDatabase.php";
        include "../tools/conf/conf.php";
        include "../tools/dataConvert.php";
        include "../tools/encryFun.php";
        include "../tools/excelOperation.php";

        if(empty($_POST['stuName'] or empty($_POST['stuGrade'])) or empty($_POST['stuType']) or empty($_POST['isDebt'])) {
            $stuName = $_POST['stuName'];
            $stuGrade = (int)$_POST['stuGrade'];
            $stuType = (int)$_POST['stuType'];
            $isDebt = (int)$_POST['isDebt'];
        }

        $stuNameSql = '1=1';
        $stuGradeSql = '1=1';
        $stuTypeSql = '1=1';
        $isDebtSql = '1=1';
        if($stuName != '') {
            $stuNameSql = "t.`stu_name` LIKE '%{$stuName}%'";
        }
        if($stuGrade != 0) {
            $stuGradeSql = "f.`grade_id` = $stuGrade";
        }
        if($stuType != 0) {
            $stuTypeSql = "f.`stu_type` = $stuType";
        }
        if($isDebt == 2) {
            $isDebtSql = "(f.`receviable_amount` - t.`stu_voidAmount` - t.`stu_paidAmount`) > 0";
        }elseif ($isDebt == 1){
            $isDebtSql = "(f.`receviable_amount` - t.`stu_voidAmount` - t.`stu_paidAmount`) <= 0";
        }

        $querySql = "SELECT t.`stu_id`, t.`stu_name`, t.`stu_sex`, t.`stu_age`, t.`stu_grade`, t.`stu_type`, t.`stu_voidAmount`, t.`stu_paidAmount`, (f.`receviable_amount` - t.`stu_voidAmount` - t.`stu_paidAmount`) 'debtAmount', t.`stu_feeText`, t.`stu_address`, t.`stu_cardId`, t.`stu_family`, t.`stu_phone` FROM `student` t LEFT JOIN `fee` f ON f.`grade_id` = t.`stu_grade` AND t.`stu_type` = f.`stu_type` WHERE " . $stuNameSql . " AND " . $stuGradeSql . " AND " . $stuTypeSql . " AND " . $isDebtSql . " ORDER BY t.`stu_id` DESC";
        $conn = new MysqliProcess(SERVERHOST, USERNAME, PASSWORD, DBNAME);
        $queryRes = $conn->queryData($querySql);

        $excelArr = array();
        foreach ($queryRes as $row) {
            $arr = array();
            $arr['stu_id'] = (int)$row['stu_id'];
            $arr['stu_name'] = $row['stu_name'];
            $arr['stu_sex'] = dataToSexInfo((int)$row['stu_sex']);
            $arr['stu_age'] = (int)$row['stu_age'];
            $arr['stu_grade'] = databaseToGradeInfo($row['stu_grade']);
            $arr['stu_type'] = databaseToStutypeInfo($row['stu_type']);
            $arr['stu_voidAmount'] = (float)$row['stu_voidAmount'];
            $arr['stu_paidAmount'] = (float)$row['stu_paidAmount'];
            $arr['stu_debtAmount'] = (float)$row['debtAmount'];
            $arr['stu_feeText'] = $row['stu_feeText'];
            $arr['stu_address'] = unlock_url($row['stu_address']);
            $arr['stu_cardId'] = unlock_url($row['stu_cardId']);
            $arr['stu_family'] = $row['stu_family'];
            $arr['stu_phone'] = unlock_url($row['stu_phone']);
            array_push($excelArr, $arr);
        }

        if(!empty($_POST['export'])){
            $fileName = '学生信息表_' . date('YmdHms', time());
            arrayToExcel($excelArr, $fileName);
        }

        foreach ($excelArr as $row) {
            $a = $row['stu_id'];
            $b = $row['stu_name'];
            $c = $row['stu_sex'];
            $d = $row['stu_age'];
            $e = $row['stu_grade'];
            $f = $row['stu_type'];
            $g = $row['stu_voidAmount'];
            $h = $row['stu_paidAmount'];
            $i = $row['stu_debtAmount'];
            $j = $row['stu_feeText'];
            $k = $row['stu_address'];
            $l = $row['stu_cardId'];
            $m = $row['stu_family'];
            $n = $row['stu_phone'];
            echo "<tr><td>$a</td><td>$b</td><td>$c</td><td>$d</td><td>$e</td><td>$f</td><td>$g</td><td>$h</td><td>$i</td><td>$j</td><td>$k</td><td>$l</td><td>$m</td><td>$n</td><td><a href='#' onclick='editFun($a)'>编辑</a>&nbsp;<a href='#' onclick='deleteFun($a)'>删除</a></td></tr>";
        }

    ?>
</table>

</html>