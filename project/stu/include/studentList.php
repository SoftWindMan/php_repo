<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>学生列表</title>
    <script type="text/javascript" src="../tools/jquery-1.11.3/jquery-1.11.3.js"></script>
    <style type="text/css">
        table tr th{
            font-size: 13px;
        }
        table tr td{
            font-size: 12px;
        }
        label{
            margin-right: 10px;
        }
        input#subBtn{
            margin-top: 10px;
            margin-bottom: 10px;
            width: 60px;
            height: 30px;
            border-radius: 3px;
            background-color: #3bb4f2;
        }
    </style>
</head>
<h4 align="center"><i>2、学生列表</i></h4>

<div>
    <form action="" method="post" align="center">
        <label>学生姓名: <input type="text" name="stu_name" /></label>

        <label>
            年级: <select name="stu_grade">
                <option value="7" selected="selected">小班</option>
                <option value="8">中班</option>
                <option value="9">大班</option>
                <option value="1">一年级</option>
                <option value="2">二年级</option>
                <option value="3">三年级</option>
                <option value="4">四年级</option>
                <option value="5">五年级</option>
                <option value="6">六年级</option>
            </select>
        </label>

        <label>学生类型:<select name="stu_grade">
                <option value="1" selected="selected">走读</option>
                <option value="2">接送</option>
                <option value="3">日托</option>
                <option value="4">全托</option>
            </select>
        </label>

        <label>是否欠费:<select name="fee">
                <option value="0" selected="selected">否</option>
                <option value="1">是</option>
            </select><br>
        </label>

        <input id="subBtn" type="submit" value="查询"/>
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
        <td>走读</td>
        <td>100</td>
        <td>500</td>
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
        <td>全托</td>
        <td>0</td>
        <td>900</td>
        <td>河南省许昌市</td>
        <td>430482197203195644</td>
        <td>小陈母亲 小陈姥爷</td>
        <td>17718339782</td>
        <td><a href="">编辑</a>&nbsp;<a href="">删除</a></td>
    </tr>
</table>

</html>