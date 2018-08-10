<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>添加学生</title>
    <script type="text/javascript" src="../tools/jquery-1.11.3/jquery-1.11.3.js"></script>

    <style type="text/css">
        div span.leftMove{
            margin-left: -112px;
        }
        div span#card_id{
            margin-left: -32px;
        }
        div span#family{
            margin-left: 285px;
        }
        div span#phone{
            margin-left: 275px;
        }
        div input#subBtn{
            background-color: #3bb4f2;
            border: 1px solid black;
            width: 60px;
            height: 30px;
        }
        div i{
            color: red;
            font-size: 11px;
        }
        div input#stu_family, input#stu_phone{
            width: 300px;
        }
        div span.some{
            margin-left: 270px;
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
<h4 align="center"><i>1、添加学生</i></h4>

<div>
    <form id="addStuForm" action="../handlerPage/addAction.php" method="post" align="center" onsubmit="return checkStuInfo()">
        学生姓名: <input id="stu_name" type="text" name="stu_name" />&nbsp;<i>*必填</i><br>

        <span class="leftMove">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别: </span>
        <input name="stu_sex" type="radio" value="1" checked="checked"/>男
        <input name="stu_sex" type="radio" value="0"/>女<br>

        <span>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄: </span><input id="stu_age" type="text" name="stu_age" />&nbsp;<i>*必填</i><br>

        <span class="leftMove">年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;级: </span>
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

        家庭住址: <input id="stu_address" type="text" name="stu_address" />&nbsp;<i>*必填</i><br>
        <span id="card_id">身份证号: </span><input id="stu_cardId" type="text" name="stu_cardId" /><br>
        <span id="family">联系家属: </span><input id="stu_family" type="text" name="stu_family" />&nbsp;<i>*必填（最多可填写三个联系人）</i><br>
        <span id="phone">联系电话: </span><input id="stu_phone" type="text" name="stu_phone" />&nbsp;<i>*必填（最多可填写三个电话）</i><br><br>
        <input id="subBtn" type="submit" value="添加"/>
    </form>
</div>

</body>
</html>