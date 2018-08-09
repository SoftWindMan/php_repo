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
    </style>
    <script type="text/javascript">
        //全选和取消按钮
        function allSelected(flag) {
            var boxes = document.getElementsByTagName('input');
            for(var i=0; i<boxes.length; i++) {
                if(boxes[i].type=='checkbox') {
                    boxes[i].checked = flag;
                }
            }
        }
    </script>
</head>
<h4 align="center"><i>3、导出信息</i></h4>

<div id="gradeList" align="center">
    <form action="" method="get">
        <b>*** 导出哪些班级的学生信息？ ***</b><br/><br/>
        <label><input name="grade" type="checkbox" value="7" />小班 </label>
        <label><input name="grade" type="checkbox" value="8" />中班 </label>
        <label><input name="grade" type="checkbox" value="9" />大班 </label>
        <label><input name="grade" type="checkbox" value="1" />一年级 </label>
        <label><input name="grade" type="checkbox" value="2" />二年级 </label>
        <label><input name="grade" type="checkbox" value="3" />三年级 </label>
        <label><input name="grade" type="checkbox" value="4" />四年级 </label>
        <label><input name="grade" type="checkbox" value="5" />五年级 </label>
        <label><input name="grade" type="checkbox" value="6" />六年级 </label><br/><br/>
        <label><input type="button" value="全选" onclick="allSelected(true)"/></label>
        <label><input type="button" value="取消" onclick="allSelected(false)"/></label><br/><br/>
        <input type="submit" value="导出"/>
    </form>
</div>

</html>