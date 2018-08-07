<?php

/*
 * CURL发送请求基本流程
 */
function doCurlSteps($url) {
    // 1、初始化
    $ch = curl_init();

// 2、设置选项
    curl_setopt($ch, CURLOPT_URL, (string)$url);   //指定请求的URL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   //设置为1表示稍后执行的curl_exec函数的返回是URL的返回字符串，而不是把返回字符串定向到标准输出并返回TRUE
    curl_setopt($ch, CURLOPT_HEADER, 0);   //是否返回请求头

// 3、执行并获取html文档内容
//curl_exec() 执行CURL请求，如果没有错误发生，该函数的返回是对应URL返回的数据，以字符串表示满意；如果发生错误，该函数返回 FALSE。需要注意的是，判断输出是否为FALSE用的是全等号，这是为了区分返回空串和出错的情况
    $output = curl_exec($ch);
    if($output === false) {
        echo "Curl error: " . curl_error($ch);
    }

//获取请求输出信息
    $info = curl_getinfo($ch);
    echo $info['url'], $info['http_code'], $info['content_type'];

// 4、释放句柄
    curl_close($ch);
}

/*
 * 封装CURL的调用接口：GET请求方式
 * $data格式：array("username" => "coder", "password" => "12345")
 */
function doCurlGetRequest($url, $data, $timeout = 5) {
    if($url == '' || $timeout <= 0) {
        return false;
    }

    $url = $url . '?' . http_build_query($data);
    $conn = curl_init((string)$url);
    curl_setopt($conn, CURLOPT_HEADER, false);
    curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($conn, CURLOPT_TIMEOUT, (int)$timeout);

    $output = curl_exec($conn);
    if($output === false) {
        echo "Curl error: " . curl_error($conn);
    }
    curl_close($conn);
    return $output;
}

/*
 * 封装CURL的调用接口：POST请求方式
 * $requestString格式： http_build_query($requestData)
 */
function doCurlPostRequest($url, $requestString, $timeout = 5) {
    if($url == '' || $requestString == '' || $timeout <= 0) {
        return false;
    }

    $conn = curl_init((string)$url);
    curl_setopt($conn, CURLOPT_HEADER, false);
    curl_setopt($conn, CURLOPT_POSTFIELDS, $requestString);
    curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($conn, CURLOPT_POST, true);
    curl_setopt($conn, CURLOPT_TIMEOUT, (int)$timeout);

    $output = curl_exec($conn);
    if($output === false) {
        echo "Curl error: " . curl_error($conn);
    }
    curl_close($conn);
    return $output;
}

/*
 * https：GET请求方式
 * 注意：这里的$url已经包含参数了
 */
function curl_get_https($url){
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);  // 从证书中检查SSL加密算法是否存在
    $tmpInfo = curl_exec($curl);     //返回api的json对象
    curl_close($curl);
    return $tmpInfo;    //返回json对象
}

/*
 * https：POST请求方式
 */
function curl_post_https($url,$data){ // 模拟提交数据函数
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
    curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
    $tmpInfo = curl_exec($curl); // 执行操作
    if (curl_errno($curl)) {
        echo 'Errno'.curl_error($curl);//捕抓异常
    }
    curl_close($curl);
    return $tmpInfo; // 返回数据，json格式
}