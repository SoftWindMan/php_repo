<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>添加学生信息</title>
    <script type="text/javascript" src="../tools/jquery-1.11.3/jquery-1.11.3.js"></script>

    <style type="text/css">
        div{
            margin-left: 430px;
        }
        div form select#type_id{
            width: 65px;
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
            font-size: 13px;
            color: black;
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
<h4 align="center"><i>--- 添加学生信息 ---</i></h4>

<div>
    <form id="addStuForm" action="../handlerPage/addAction.php" method="post" onsubmit="return checkStuInfo()">
        <label>学生姓名: </label><input id="stu_name" type="text" name="stu_name" />&nbsp;<i>*必填</i><br>

        <label>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别: </label>
        <input name="stu_sex" type="radio" value="1" checked="checked"/><i class="sexInfo">男</i>&nbsp;&nbsp;
        <input name="stu_sex" type="radio" value="0"/><i class="sexInfo">女</i><br>

        <label>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄: </label><input id="stu_age" type="text" name="stu_age" />&nbsp;<i>*必填</i><br>

        <label>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;级: </label>
        <select name="stu_grade">
            <option value="7" selected="selected">小班</option>
            <option value="8">中班</option>
            <option value="9">大班</option>
            <option value="1">一年级</option>
            <option value="2">二年级</option>
            <option value="3">三年级</option>
            <option value="4">四年级</option>
            <option value="5">五年级</option>
            <option value="6">六年级</option>
        </select><br>

        <label>学生类型:  </label>
        <select id="type_id" name="stu_type">
            <option value="1" selected="selected">走读</option>
            <option value="2">接送</option>
            <option value="3">日托</option>
            <option value="4">全托</option>
        </select><br>

        <label>减免金额: </label><input type="text" name="stu_voidAmount" />元<br>
        <label>已付金额: </label><input type="text" name="stu_paidAmount" />元<br>

        <label>家庭住址: </label><input type="text" name="stu_address" />&nbsp;<i>*必填</i><br>
        <label>身份证号: </label><input type="text" name="stu_cardId" /><br>
        <label>联系家属: </label><input type="text" name="stu_family" />&nbsp;<i>*必填（最多可填写三个联系人）</i><br>
        <label>联系电话: </label><input type="text" name="stu_phone" />&nbsp;<i>*必填（最多可填写三个电话）</i><br>
        <label id="feetextLable">缴费备注: </label> <textarea name="stu_feeText"></textarea>&nbsp;<br><br>
        <input id="subBtn" type="submit" value="添加"/>
    </form>
</div>

</body>
</html>