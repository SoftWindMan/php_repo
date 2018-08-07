该文件引用jquery-1.11.3.js库
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>A标签样式</title>
    <style>
        .sel_btn{
            height: 21px;
            line-height: 21px;
            padding: 0 11px;
            background: #02bafa;
            border: 1px #26bbdb solid;
            border-radius: 3px;
            /*color: #fff;*/
            display: inline-block;
            text-decoration: none;
            font-size: 12px;
            outline: none;
        }
        .ch_cls{
            background: #e4e4e4;
        }
    </style>
    <script type="text/javascript" src="./jquery-1.11.3.js"></script>
</head>
<body>
&nbsp;&nbsp;&nbsp;&nbsp;
<a class="sel_btn ch_cls" id="sel_btn1" href="#" onclick="changeSelBtn(1)">全天</a>
<a class="sel_btn" id="sel_btn2" href="#" onclick="changeSelBtn(2)">上午</a>
<a class="sel_btn" id="sel_btn3" href="#" onclick="changeSelBtn(3)">下午</a>
<hr>
<script type="text/javascript">
    function changeSelBtn(index){
        if(index==1){
            $("#sel_btn1").addClass('ch_cls');
            $("#sel_btn2").removeClass('ch_cls');
            $("#sel_btn3").removeClass('ch_cls');
        }else if(index==2){
            $("#sel_btn1").removeClass('ch_cls');
            $("#sel_btn2").addClass('ch_cls');
            $("#sel_btn3").removeClass('ch_cls');
        }else if(index==3){
            $("#sel_btn1").removeClass('ch_cls');
            $("#sel_btn2").removeClass('ch_cls');
            $("#sel_btn3").addClass('ch_cls');
        }

    }
</script>
</body>

</html>


