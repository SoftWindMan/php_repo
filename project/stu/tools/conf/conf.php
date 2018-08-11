<?php

$SERVERHOST = "127.0.0.1";
$USERNAME = "root";
$PASSWORD = "123";
$DBNAME = "student";

$encry_key = "www.jb51.net";
$encry_str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-=+";

$one_grade = "一年级";
$two_grade = "二年级";
$three_grade = "三年级";
$four_grade = "四年级";
$five_grade = "五年级";
$six_grade = "六年级";
$small_grade = "小班";
$middle_grade = "中班";
$big_grade = "大班";

$one_level = "走读";
$two_level = "接送";
$three_level = "日托";
$four_level = "全托";


//加密相关字符串
define("ENCRY_KEY", $encry_key);
define("ENCRY_STR", $encry_str);

//数据库配置
define("SERVERHOST", $SERVERHOST);
define("USERNAME", $USERNAME);
define("PASSWORD", $PASSWORD);
define("DBNAME", $DBNAME);

//年级
define("ONE_GRADE", $one_grade);
define("TWO_GRADE", $two_grade);
define("THREE_GRADE", $three_grade);
define("FOUR_GRADE", $four_grade);
define("FIVE_GRADE", $five_grade);
define("SIX_GRADE", $six_grade);
define("SMALL_GRADE", $small_grade);
define("MIDDLE_GRADE", $middle_grade);
define("BIG_GRADE", $big_grade);

//学生类型
define("ONE_LEVEL", $one_level);
define("TWO_LEVEL", $two_level);
define("THREE_LEVEL", $three_level);
define("FOUR_LEVEL", $four_level);