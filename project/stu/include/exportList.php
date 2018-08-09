<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>导出信息</title>
    <script type="text/javascript" src="../jquery-1.11.3/jquery-1.11.3.js"></script>
    <style type="text/css">
        div form b{
            color: indianred;
        }
        div label{
            margin-right: 10px;
        }
        input#subBtn{
            width: 60px;
            height: 30px;
            border-radius: 3px;
            background-color: #3bb4f2;
        }
        div label a{
            width: 60px;
            height: 20px;
            line-height: 20px;
            font-size: 12px;
            border-radius: 3px;
            display: inline-block;
            text-decoration: none;
            background-color: #3bb4f2;
        }
        .ch_cls{
            background: #e4e4e4;
        }
    </style>
</head>
<h4 align="center"><i>3、导出信息</i></h4>

<div id="gradeList" align="center">
    <b>***  导出哪些班级的学生信息？ ***</b><br/><br/>
    <label><a id="sel_btn1" href="#" onclick="allSelected(1)">全选</a></label>
    <label><a id="sel_btn2" href="#" onclick="allSelected(2)">取消</a></label><br/><br/>
    <form action="" method="get">
        <label><input name="grade" type="checkbox" value="7" />小班 </label>
        <label><input name="grade" type="checkbox" value="8" />中班 </label>
        <label><input name="grade" type="checkbox" value="9" />大班 </label>
        <label><input name="grade" type="checkbox" value="1" />一年级 </label>
        <label><input name="grade" type="checkbox" value="2" />二年级 </label>
        <label><input name="grade" type="checkbox" value="3" />三年级 </label>
        <label><input name="grade" type="checkbox" value="4" />四年级 </label>
        <label><input name="grade" type="checkbox" value="5" />五年级 </label>
        <label><input name="grade" type="checkbox" value="6" />六年级 </label><br/><br/>
        <input id="subBtn" type="submit" value="导出"/>
    </form>
</div>

<script type="text/javascript">
    //全选和取消按钮
    function allSelected(index) {
        if (index == 1) {
            $("#sel_btn1").addClass('ch_cls');
            $("#sel_btn2").removeClass('ch_cls');
            var boxes = document.getElementsByTagName('input');
            for(var i=0; i<boxes.length; i++) {
                if(boxes[i].type=='checkbox') {
                    boxes[i].checked = true;
                }
            }
        } else if (index == 2) {
            $("#sel_btn2").addClass('ch_cls');
            $("#sel_btn1").removeClass('ch_cls');
            var boxes = document.getElementsByTagName('input');
            for(var i=0; i<boxes.length; i++) {
                if(boxes[i].type=='checkbox') {
                    boxes[i].checked = false;
                }
            }
        }
    }
</script>

</html>