<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>学生列表</title>
    <script type="text/javascript" src="../jquery-1.11.3/jquery-1.11.3.js"></script>
    <style type="text/css">
        .sel_btn{
            margin-right: 6px;
            margin-bottom: 10px;
            width: 60px;
            line-height: 30px;
            padding: 0 11px;
            background: #02bafa;
            border: 1px black solid;
            border-radius: 3px;
            display: inline-block;
            text-decoration: none;
            text-align: center;
            font-size: 12px;
            outline: none;
        }
        .ch_cls{
            background: #e4e4e4;
        }
    </style>
</head>
<h4 align="center"><i>2、学生列表</i></h4>

<div id="gradeList" align="center">
    <a class="sel_btn ch_cls" id="sel_btn1" href="#" onclick="changeSelBtn(1)">小班</a>
    <a class="sel_btn" id="sel_btn2" href="#" onclick="changeSelBtn(2)">中班</a>
    <a class="sel_btn" id="sel_btn3" href="#" onclick="changeSelBtn(3)">大班</a>
    <a class="sel_btn" id="sel_btn4" href="#" onclick="changeSelBtn(4)">一年级</a>
    <a class="sel_btn" id="sel_btn5" href="#" onclick="changeSelBtn(5)">二年级</a>
    <a class="sel_btn" id="sel_btn6" href="#" onclick="changeSelBtn(6)">三年级</a>
    <a class="sel_btn" id="sel_btn7" href="#" onclick="changeSelBtn(7)">四年级</a>
    <a class="sel_btn" id="sel_btn8" href="#" onclick="changeSelBtn(8)">五年级</a>
    <a class="sel_btn" id="sel_btn9" href="#" onclick="changeSelBtn(9)">六年级</a>
</div>

<table align="center" border="1px solid black" cellpadding="5px">
    <tr>
        <th>编号</th>
        <th>学生姓名</th>
        <th>性别</th>
        <th>年龄</th>
        <th>年级</th>
        <th>家庭住址</th>
        <th>身份证号</th>
        <th>联系家属</th>
        <th>联系电话</th>
        <th>操作</th>
    </tr>
    <tr>
        <td>1</td>
        <td>小明</td>
        <td>男</td>
        <td>17</td>
        <td>一年级</td>
        <td>河南省信阳市</td>
        <td>15292319730207863X</td>
        <td>小明父亲 小明母亲</td>
        <td>17718339458</td>
        <td><a href="">编辑</a>&nbsp;<a href="">删除</a></td>
    </tr>
    <tr>
        <td>2</td>
        <td>小陈</td>
        <td>女</td>
        <td>21</td>
        <td>三年级</td>
        <td>河南省许昌市</td>
        <td>430482197203195644</td>
        <td>小陈母亲 小陈姥爷</td>
        <td>17718339782</td>
        <td><a href="">编辑</a>&nbsp;<a href="">删除</a></td>
    </tr>
</table>

<script type="text/javascript">
    function changeSelBtn(index){
        if(index==1){
            $("#sel_btn1").addClass('ch_cls');
            $("#sel_btn2").removeClass('ch_cls');
            $("#sel_btn3").removeClass('ch_cls');
            $("#sel_btn4").removeClass('ch_cls');
            $("#sel_btn5").removeClass('ch_cls');
            $("#sel_btn6").removeClass('ch_cls');
            $("#sel_btn7").removeClass('ch_cls');
            $("#sel_btn8").removeClass('ch_cls');
            $("#sel_btn9").removeClass('ch_cls');
        }else if(index==2){
            $("#sel_btn2").addClass('ch_cls');
            $("#sel_btn1").removeClass('ch_cls');
            $("#sel_btn3").removeClass('ch_cls');
            $("#sel_btn4").removeClass('ch_cls');
            $("#sel_btn5").removeClass('ch_cls');
            $("#sel_btn6").removeClass('ch_cls');
            $("#sel_btn7").removeClass('ch_cls');
            $("#sel_btn8").removeClass('ch_cls');
            $("#sel_btn9").removeClass('ch_cls');
        }else if(index==3){
            $("#sel_btn3").addClass('ch_cls');
            $("#sel_btn1").removeClass('ch_cls');
            $("#sel_btn2").removeClass('ch_cls');
            $("#sel_btn4").removeClass('ch_cls');
            $("#sel_btn5").removeClass('ch_cls');
            $("#sel_btn6").removeClass('ch_cls');
            $("#sel_btn7").removeClass('ch_cls');
            $("#sel_btn8").removeClass('ch_cls');
            $("#sel_btn9").removeClass('ch_cls');
        }else if(index==4){
            $("#sel_btn4").addClass('ch_cls');
            $("#sel_btn1").removeClass('ch_cls');
            $("#sel_btn2").removeClass('ch_cls');
            $("#sel_btn3").removeClass('ch_cls');
            $("#sel_btn5").removeClass('ch_cls');
            $("#sel_btn6").removeClass('ch_cls');
            $("#sel_btn7").removeClass('ch_cls');
            $("#sel_btn8").removeClass('ch_cls');
            $("#sel_btn9").removeClass('ch_cls');
        }else if(index==5){
            $("#sel_btn5").addClass('ch_cls');
            $("#sel_btn1").removeClass('ch_cls');
            $("#sel_btn2").removeClass('ch_cls');
            $("#sel_btn3").removeClass('ch_cls');
            $("#sel_btn4").removeClass('ch_cls');
            $("#sel_btn6").removeClass('ch_cls');
            $("#sel_btn7").removeClass('ch_cls');
            $("#sel_btn8").removeClass('ch_cls');
            $("#sel_btn9").removeClass('ch_cls');
        }else if(index==6){
            $("#sel_btn6").addClass('ch_cls');
            $("#sel_btn1").removeClass('ch_cls');
            $("#sel_btn2").removeClass('ch_cls');
            $("#sel_btn3").removeClass('ch_cls');
            $("#sel_btn4").removeClass('ch_cls');
            $("#sel_btn5").removeClass('ch_cls');
            $("#sel_btn7").removeClass('ch_cls');
            $("#sel_btn8").removeClass('ch_cls');
            $("#sel_btn9").removeClass('ch_cls');
        }else if(index==7){
            $("#sel_btn7").addClass('ch_cls');
            $("#sel_btn1").removeClass('ch_cls');
            $("#sel_btn2").removeClass('ch_cls');
            $("#sel_btn3").removeClass('ch_cls');
            $("#sel_btn4").removeClass('ch_cls');
            $("#sel_btn5").removeClass('ch_cls');
            $("#sel_btn6").removeClass('ch_cls');
            $("#sel_btn8").removeClass('ch_cls');
            $("#sel_btn9").removeClass('ch_cls');
        }else if(index==8){
            $("#sel_btn8").addClass('ch_cls');
            $("#sel_btn1").removeClass('ch_cls');
            $("#sel_btn2").removeClass('ch_cls');
            $("#sel_btn3").removeClass('ch_cls');
            $("#sel_btn4").removeClass('ch_cls');
            $("#sel_btn5").removeClass('ch_cls');
            $("#sel_btn6").removeClass('ch_cls');
            $("#sel_btn7").removeClass('ch_cls');
            $("#sel_btn9").removeClass('ch_cls');
        }else if(index==9){
            $("#sel_btn9").addClass('ch_cls');
            $("#sel_btn1").removeClass('ch_cls');
            $("#sel_btn2").removeClass('ch_cls');
            $("#sel_btn3").removeClass('ch_cls');
            $("#sel_btn4").removeClass('ch_cls');
            $("#sel_btn5").removeClass('ch_cls');
            $("#sel_btn6").removeClass('ch_cls');
            $("#sel_btn7").removeClass('ch_cls');
            $("#sel_btn8").removeClass('ch_cls');
        }
    }
</script>

</html>