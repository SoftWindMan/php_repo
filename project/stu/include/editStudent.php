<?php
    include "../tools/connDatabase.php";
    include "../tools/conf/conf.php";
    include "../tools/encryFun.php";

    $stuId = -1;
    if(is_numeric($_GET['stu_id'])) {
        $stuId = (int)$_GET['stu_id'];
    }

    $conn = new MysqliProcess(SERVERHOST, USERNAME, PASSWORD, DBNAME);
    $sql = "SELECT `stu_name`, `stu_sex`, `stu_age`, `stu_grade`, `stu_type`, `stu_voidAmount`, `stu_paidAmount`, `stu_feeText`, `stu_address`, `stu_cardId`, `stu_family`, `stu_phone` FROM `student` WHERE `stu_id` = $stuId";
    $stuRes = $conn->queryData($sql)[0];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>编辑学生信息</title>
    <script type="text/javascript" src="../tools/jquery-1.11.3/jquery-1.11.3.js"></script>

    <style type="text/css">
        div{
            margin-left: 430px;
        }
        div form select.widthBottom{
            width: 75px;
        }
        div input#subBtn{
            background-color: #3bb4f2;
            border: 1px solid black;
            width: 60px;
            height: 30px;
            margin-left: 90px;
        }
        div i{
            color: red;
            font-size: 11px;
        }
        div i.sexInfo{
            color: black;
            font-size: 13px;
        }
        div form textarea{
            width: 210px;
            height: 90px;
        }
        div form label#feetextLable{
            display: inline-block;
            vertical-align: top;
        }
        div form label{
            font-size: 13px;
            font-style: italic;
        }
        div form input{
            margin-bottom: 5px;
        }
        div form select{
            margin-bottom: 5px;
        }
    </style>
    <script type="text/javascript">
        function checkStuInfo() {
            let stu_name = $('#stu_name').val();
            let stu_age = Number($('#stu_age').val());
            let stu_address =$('#stu_address').val();
            let stu_family = $('#stu_family').val();
            let stu_phone = $('#stu_phone').val();

            if(stu_name == '') {
                alert('学生姓名不能为空！');
                return false;
            } else {
                if(stu_age<=0 || stu_age>=100) {
                    alert('学生年龄不能为空且必须在0~100！');
                    return false;
                } else {
                    if(stu_address == '') {
                        alert('住址不能为空！');
                        return false;
                    } else {
                        if(stu_family == '') {
                            alert('联系家属不能为空！');
                            return false;
                        } else {
                            if(stu_phone == '') {
                                alert('联系电话不能为空！');
                                return false;
                            } else {
                                return true;
                            }
                        }
                    }
                }
            }
        }
    </script>
</head>
<body>
<h4 align="center"><i>--- 编辑学生信息 ---</i></h4>

<div>
    <form id="addStuForm" action="../handlerPage/editStuHandler.php" method="post" onsubmit="return checkStuInfo()">
        <input type="text" name="stu_id" hidden="hidden" value="<?php echo $stuId; ?>">

        <label>学生姓名: </label><input id="stu_name" type="text" name="stu_name" value="<?php echo $stuRes['stu_name']; ?>" />&nbsp;<i>*必填</i><br>

        <label>学生性别: </label>
        <input name="stu_sex" type="radio" value="1" <?php if($stuRes['stu_sex'] == '1') echo'checked="checked"';?>/><i class="sexInfo">男</i>&nbsp;&nbsp;
        <input name="stu_sex" type="radio" value="0" <?php if($stuRes['stu_sex'] == '0') echo'checked="checked"';?>/><i class="sexInfo">女</i><br>

        <label>学生年龄: </label><input id="stu_age" type="text" name="stu_age" value="<?php echo $stuRes['stu_age'];?>" />&nbsp;<i>*必填</i><br>

        <label>学生年级: </label>
        <select class="widthBottom" name="stu_grade">
            <option value="7" <?php if($stuRes['stu_grade'] =='7') echo'selected="selected"';?>>小班</option>
            <option value="8" <?php if($stuRes['stu_grade'] =='8') echo'selected="selected"';?>>中班</option>
            <option value="9" <?php if($stuRes['stu_grade'] =='9') echo'selected="selected"';?>>大班</option>
            <option value="1" <?php if($stuRes['stu_grade'] =='1') echo'selected="selected"';?>>一年级</option>
            <option value="2" <?php if($stuRes['stu_grade'] =='2') echo'selected="selected"';?>>二年级</option>
            <option value="3" <?php if($stuRes['stu_grade'] =='3') echo'selected="selected"';?>>三年级</option>
            <option value="4" <?php if($stuRes['stu_grade'] =='4') echo'selected="selected"';?>>四年级</option>
            <option value="5" <?php if($stuRes['stu_grade'] =='5') echo'selected="selected"';?>>五年级</option>
            <option value="6" <?php if($stuRes['stu_grade'] =='6') echo'selected="selected"';?>>六年级</option>
        </select><br>

        <label>学生类型: </label>
        <select class="widthBottom" name="stu_type">
            <option value="1" <?php if($stuRes['stu_type'] =='1') echo'selected="selected"';?>>走读</option>
            <option value="2" <?php if($stuRes['stu_type'] =='2') echo'selected="selected"';?>>接送</option>
            <option value="3" <?php if($stuRes['stu_type'] =='3') echo'selected="selected"';?>>日托</option>
            <option value="4" <?php if($stuRes['stu_type'] =='4') echo'selected="selected"';?>>全托</option>
        </select><br>

        <label>减免金额: </label><input type="text" name="stu_voidAmount" value="<?php echo $stuRes['stu_voidAmount'];?>"/>元<br>
        <label>已付金额: </label><input type="text" name="stu_paidAmount" value="<?php echo $stuRes['stu_paidAmount'];?>"/>元<br>

        <label>家庭住址: </label><input type="text" name="stu_address" value="<?php echo unlock_url($stuRes['stu_address']);?>"/>&nbsp;<i>*必填</i><br>
        <label>身份证号: </label><input type="text" name="stu_cardId" value="<?php echo unlock_url($stuRes['stu_cardId']);?>"/><br>
        <label>联系家属: </label><input type="text" name="stu_family" value="<?php echo $stuRes['stu_family'];?>"/>&nbsp;<i>*必填（最多可填写三个联系人）</i><br>
        <label>联系电话: </label><input type="text" name="stu_phone" value="<?php echo unlock_url($stuRes['stu_phone']);?>"/>&nbsp;<i>*必填（最多可填写三个电话）</i><br>
        <label id="feetextLable">缴费备注: </label>&nbsp;<textarea name="stu_feeText"><?php echo $stuRes['stu_feeText'];?></textarea><br><br>

        <input id="subBtn" type="submit" value="保存"/>
    </form>
</div>

</body>
</html>