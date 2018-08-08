<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>添加学生</title>
    <script type="text/javascript" src="../jquery-1.11.3/jquery-1.11.3.js"></script>

    <style type="text/css">
        div span{
            margin-left: -120px
        }
        div span#card_id{
            margin-left: -40px
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
        学生姓名: <input id="stu_name" type="text" name="stu_name" />&nbsp;&nbsp;&nbsp;<i>*必填</i><br>

        <span>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别: </span>
        <input name="stu_sex" type="radio" value="男" checked="checked"/>男
        <input name="stu_sex" type="radio" value="女"/>女<br>

        年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄: <input id="stu_age" type="text" name="stu_age" />&nbsp;&nbsp;&nbsp;<i>*必填</i><br>

        <span>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;级: </span>
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

        家庭住址: <input id="stu_address" type="text" name="stu_address" />&nbsp;&nbsp;&nbsp;<i>*必填</i><br>
        <span id="card_id">身份证号: </span><input id="stu_cardId" type="text" name="stu_cardId" /><br>
        联系家属: <input id="stu_family" type="text" name="stu_family" />&nbsp;&nbsp;&nbsp;<i>*必填</i><br>
        联系电话: <input id="stu_phone" type="text" name="stu_phone" />&nbsp;&nbsp;&nbsp;<i>*必填</i><br><br>
        <input id="subBtn" type="submit" value="添加"/>
    </form>
</div>


</body>
</html>