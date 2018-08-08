<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>添加学生</title>
    <style type="text/css">

    </style>
</head>
<body>
<h4 align="center"><i>1、添加学生</i></h4>

<div align="center">
    <form action="" method="get" align="left">
        学生姓名: <input type="text" name="stu_name" /><br>

        性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别:
        <input name="stu_sex" type="radio" checked="checked"/>男&nbsp;&nbsp;&nbsp;
        <input name="stu_sex" type="radio" />女<br>

        年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄: <input type="text" name="stu_age" /><br>

        年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;级:
        <select name="stu_grade">
            <option value="small_grade">小班</option>
            <option value="middle_grade">中班</option>
            <option value="big_grade" selected="selected">大班</option>
            <option value="one_grade">一年级</option>
            <option value="two_grade">二年级</option>
            <option value="three_grade">三年级</option>
            <option value="four_grade">四年级</option>
            <option value="five_grade">五年级</option>
            <option value="six_grade">六年级</option>
        </select><br>

        家庭住址: <input type="text" name="stu_address" /><br>
        身份证号: <input type="text" name="stu_cardId" /><br>
        联系家属: <input type="text" name="stu_family" /><br>
        联系电话: <input type="text" name="stu_phone" /><br><br>
        <input type="submit" value="添加" />
    </form>
</div>


</body>
</html>